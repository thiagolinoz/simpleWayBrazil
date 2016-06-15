<?php

namespace Views;

class View
{
    public static function carregar($arquivo, $tipo, $idioma=null, $dados = NULL)
    {
        if($tipo == 'admin'){
            $idioma = null;
        }

        if($idioma == 'en'){
            $_SESSION['user']['idioma'] = 'en';
            $_SESSION['user']['id_idioma'] = '2';
        }
        
        $path = 'public/';
        
        $arquivo = strtolower($arquivo);

        $pathArquivo = __DIR__."/../../templates/$tipo/$idioma/$arquivo.tpl.php";
        
        include_once __DIR__."/../../templates/$tipo/$idioma/_cabecalho.tpl.php";
        
        if(file_exists($pathArquivo)){
            include_once $pathArquivo;
        }else{
            echo "<h3>$pathArquivo: View Nao Localizada</h3>";
        }
        
        include_once __DIR__."/../../templates/$tipo/$idioma/_rodape.tpl.php";
    }
}