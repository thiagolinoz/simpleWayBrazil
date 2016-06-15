<?php

namespace Biblioteca;

trait Mensagem
{
    static private function exists()
    {
        return isset( $_SESSION['mensagem'] );
    }
    
    static public function set( $mensagem, $tipo) 
    {
        $_SESSION['mensagem']['tipo']  = $tipo;
        $_SESSION['mensagem']['valor'] = $mensagem;
        session_commit();
    }
    
    static public function get()
    {
        $mensagem = '';

        if( self::exists() ) {
            $tipo  = $_SESSION['mensagem']['tipo'];
            $valor = $_SESSION['mensagem']['valor'];

            self::limpar();

            $mensagem = "<div class=\"alert alert-$tipo\">$valor</div>";
        }

        return $mensagem;
    }
    
    static public function limpar()
    {
        unset($_SESSION['mensagem']);
        session_commit();
    }
}

