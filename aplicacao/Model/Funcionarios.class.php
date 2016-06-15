<?php

namespace Model;

class Funcionarios extends AbstractModel
{
    public $tabela = 'funcionarios';
    
    protected $atributos = array(
        'email' => null,
        'prf_id' => null,
        'nome'=> null,
        'id_idioma' => null,
        'senha'=> null
    );
}

