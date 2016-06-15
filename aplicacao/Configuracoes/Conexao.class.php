<?php

namespace Configuracoes;

use Biblioteca\Crud;

class Conexao extends Crud
{
    static private $instancia;
    protected $conexao;
    
    public static function instanciar()
    {
        if(is_null(self::$instancia)){
            self::$instancia = new Conexao();
            self::$instancia->conectar();
        }
        return self::$instancia;
    }
    
    private function conectar()
    {
        try{
            #usar a classe PDO q e core do PHP. '\' volta um nivel e vai pro core
            $opcoes = array( \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
            $this->conexao = new \PDO('mysql:host=#;dbname=#', '#', '#', $opcoes);
            $this->conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }catch(\PDOException $e){
            echo "Não foi possivel conectar".$e->getMessage();
        }    
    }
}
