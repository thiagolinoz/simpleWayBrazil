<?php

namespace Model;

class Conteudos extends AbstractModel
{
    public $tabela = 'conteudos';
    protected $atributos = array(
        'id' => null,
        'titulo' => null,
        'texto' => null
    );
}

