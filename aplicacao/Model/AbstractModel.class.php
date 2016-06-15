<?php

namespace Model;

use Configuracoes\Conexao;

abstract class AbstractModel
{
    protected $conexao;
    
    public function __construct() 
    {
        $this->conexao = Conexao::instanciar();
    }
    
    public function __toString() 
    {
        return $this->tabela;
    }
    
    public function __call($atributo, $parametro)
    {
        $prefixo = substr($atributo,0,3);
        
        #nome do metodo chamado
        $atributo = strtolower(substr($atributo,3));

        if(!array_key_exists($atributo, $this->atributos)){
            throw new \Exception("A propriedade chamada nao existe");
        }
        
        switch($prefixo)
        {
            case 'set':
                $this->atributos[$atributo] = $parametro[0]; break;
            case 'get':
                return $this->atributos[$atributo]; break;
            default:
                throw new \Exception("Metodo invalido");
        }
    }
    
    public function cadastro()
    {
        if($_POST){
            if($_FILES['imagem']['name']){
                $_POST['imagem'] =  $this->uploadImagem($_FILES['imagem']['name'], $_FILES['imagem']['tmp_name']); 
            }    

            $_POST['id_idioma'] = $_SESSION['admin']['idioma'];

            if($this->salvar($_POST)){
                return array(
                  'msg' => 'Dados salvos',
                  'alert' => 'alert-success'  
                );
            }
        }
    }
    
    public function editar()
    {
        if($_POST){

            if($_FILES['imagem']['name']){
                $_POST['imagem'] =  $this->uploadImagem($_FILES['imagem']['name'], $_FILES['imagem']['tmp_name']); 
            }
            
            $_POST['id_idioma'] = $_SESSION['admin']['idioma'];
            
            $_POST['id'] = $_GET['id'];
            
            if($this->salvar($_POST)){
                header("Location:admin.php?modulo={$_GET['modulo']}&acao=listagem");
            }
        }
        return $this->ver("id={$_GET['id']}");
    }
    
    public function gerenciar()
    {
        return $this->listar();
    }

    public function exibir()
    {
        #filtro p/ o GET
        return $this->ver("id={$_GET['id']}");
    }
    
    public function ver($onde)
    {
        return $this->conexao->getOne($this, $onde);
    }
    
    public function listar($onde=null, $limit=null,$ordem=null)
    {   
        $lingua = $_SESSION['user']['id_idioma'];

        return  $this->conexao->getAll($this,"deleted = 0 AND ativo = 1 AND id_idioma = $lingua", $limit,$ordem);
    }

    public function listagem()
    {   
        $lingua = $_SESSION['admin']['idioma'];

        return  $this->conexao->getAll($this,"deleted = 0 AND id_idioma = $lingua");
    }

    public function listaMais()
    {
        $lingua = $_SESSION['user']['id_idioma'];
        $start = $_POST['start'];
        $limit = $_POST['limit'];
        header('Content-Type: application/json');
        $result = $this->conexao->getAll($this,"deleted = 0 AND id_idioma = $lingua AND ativo = 1",$limit,"id",$start);
        $data = array();
        $i = 0;
        foreach($result as $v){
            $data[$i]['_id'] = $v->id;
            $data[$i]['titulo'] = $v->titulo;
            $data[$i]['sub_titulo'] = $v->sub_titulo;
            $data[$i]['imagem'] = $v->imagem;
            $data[$i]['data_noticia'] = $v->data_noticia;
            $i++;
        }

        print json_encode($data);
        exit();
    }

    public function salvar(array $post)
    {
        $this->atributos = $post;
        
        if(empty($this->atributos['id'])){
            return $this->conexao->gravar($this);
        }else{
            return $this->conexao->alterar($this);
        }
    }
    
    public function deletar($onde=null)
    {
       if($this->conexao->ocultar($this,$_GET['id']))
            return array(
                  'msg' => 'Dados excluidos',
                  'alert' => 'alert-success'  
                );
    }   
    
    public function getAtributos()
    {
        return $this->atributos;
    }
    
    public function logar()
    {
        if($_POST){
           if($this->conexao->getOne($this, $_POST)){
               $_SESSION['user']['admin'] = "valido";
               $_SESSION['admin']['idioma'] = $_POST['idioma'];
               header('Location:admin.php?modulo=Noticias&acao=listagem');
           }else{
                echo "<script>alert('Erro ao logar, tente novamente mais tarde');</script>";
                session_destroy();
           } 
        } 
    }

    public function uploadImagem($imagem, $temporario)
    {
        $caminho = __DIR__."/../../public/img/";
        $tamanho = getimagesize($temporario);
        $formatos = array('jpg','jpeg','gif','png');
        
        $nomeFoto = explode('.', $imagem);
        $nome = md5($nomeFoto[0]);
        $ext = strtolower(end($nomeFoto));

        $fotoNova = $nome.'.'.$ext;

        if(in_array($ext, $formatos)){
            if(move_uploaded_file($temporario, $caminho.$fotoNova)){
                return $fotoNova;
            }else{
                exit('Ocorreu um erro ao salvar a imagem');
            }
        }else{
           exit('Insira uma imagem');
        }    
    }

    public function logout()
    {
        unset($_SESSION['user']['admin']);
    }

}



