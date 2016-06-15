<?php

namespace Biblioteca;

class Crud
{
    protected $statement;
    
    public function getOne($objeto, $whr)
    {
        //montar condicional WHERE p/ query
        if(is_array($whr)){
            foreach($whr as $k => $v){
                //criptografa senha
                if($k == 'senha'){
                    $v = md5($v);
                }
                //não revelar nome de campo da tabela
                if($k=='idioma'){
                    $k = 'id_idioma';
                }

                $linha[] = "$k = '$v'";
            }
            //transforma array em query
            $where = implode(" AND ", $linha);
        }else{
           $where =  $whr;
        }
            
        $sql = "SELECT * FROM $objeto WHERE $where";
        $obj = get_class($objeto);
        return $this->conexao->query($sql)->fetchObject($obj);
    }
    
    public function getAll($objeto,$onde=null,$limite=null,$ordem=null,$start=null)
    {   

        $sql = "SELECT * FROM $objeto";
            
            if($onde){
                $sql .= " WHERE $onde ";
            }
            if($ordem){
                $sql .= " ORDER BY $ordem DESC ";
            }
            if($limite){
                $sql .= "LIMIT $limite ";
                if($start){
                    $sql .= "OFFSET $start";
                }
            }
            

        $obj = get_class($objeto);
        
        return $this->conexao->query($sql)->fetchAll(\PDO::FETCH_CLASS, $obj);
    }
    
    public function gravar($objeto)
    {
        foreach($objeto->getAtributos() as $campo => $valor){
            $campos[] = $campo;
            $valores[] = $valor;
            $holders[] = '?';
        }
        $campos = implode(',',$campos);
        $holders = implode(',', $holders);
        
        $sql = "INSERT INTO $objeto($campos) VALUES($holders)";
        $this->statement = $this->conexao->prepare($sql);
        
        return $this->statement->execute($valores);
    }
    
    public function apagar($objeto,$onde)
    {
        $sql = "DELETE FROM $objeto WHERE id= ?";
        
        $this->statement = $this->conexao->prepare($sql);
        return $this->statement->execute(array($onde));
    }
    
    public function alterar($objeto)
    {
        foreach($objeto->getAtributos() as $campo => $valor){
            if($campo == 'id'){
                continue;
            }
            $campos[] = "$campo=?";
            $valores[] = $valor;
        }
        
        $valores[] = $objeto->getId();
        $campos = implode(',',$campos);
        
        $sql = "UPDATE $objeto SET $campos WHERE id=?";
        $this->statement = $this->conexao->prepare($sql);
        return $this->statement->execute($valores);
    }

    public function ocultar($objeto,$id)
    {
        $sql = "UPDATE $objeto SET deleted=1 WHERE id=$id";
        return $this->conexao->query($sql);
    }
    
}
