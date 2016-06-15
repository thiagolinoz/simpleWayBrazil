<?php

session_start();

function autoloader($classe)
{
    $classe = str_replace('\\', '/', $classe);
    
    $array = array(
        'class.php', 'trait.php'
    );
    
    foreach($array as $extensoes){
        if(file_exists("aplicacao/$classe.$extensoes")){
            require_once "aplicacao/$classe.$extensoes";
        }
    }
}

spl_autoload_register('autoloader');

