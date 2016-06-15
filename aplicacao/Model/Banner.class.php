<?php

namespace Model;

class Banner extends AbstractModel
{
    public $tabela = "banner";
    protected $atributos = array(
        'id' => null,
        'descricao' => null,
        'imagem' => null
    );
}


