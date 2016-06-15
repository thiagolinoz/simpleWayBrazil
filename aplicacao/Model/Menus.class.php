<?php

namespace Model;

class Menus extends AbstractModel
{
    public $tabela = "menus";
    
    protected $atributos = array(
        'id'        => null,
        'prf_if'    => null,
        'descricao' => null,
        'link'      => null,
        'perfil'    => null
    );
}
