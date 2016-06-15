<?php

namespace Controller;

use Views\View;

class Controller
{

    private $view;
    private $model;
    private $dados;
    private $idioma = null;
    
    public function __construct($tipo) 
    {
        if($tipo == 'admin' || isset($_GET['modulo'])){
            if(isset($_GET['modulo'])){
                $this->view = $_GET['modulo'];
                $model = "Model\\{$_GET['modulo']}";
                $this->model = new $model();
            }else{
                $this->view = 'index';
            }
            
            $action = isset($_GET['acao']) ? $_GET['acao'] : null;
            
            if($action){
                $this->dados = $this->model->$action();
                $this->view .= "/$action";
            }

            $idioma = $_SESSION['user']['idioma'];
            
        }elseif(isset($_GET['pagina'])){
            $this->view = $_GET['pagina'];
            $idioma = $_SESSION['user']['idioma'];
        }else{
            $this->view = 'index'; 
            $_SESSION['user']['idioma'] = 'en';
            $idioma = $_SESSION['user']['idioma'];
        }   

        View::carregar($this->view, $tipo, $idioma, $this->dados);    
    }

}





