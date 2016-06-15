<?php

namespace Model;

class Encomendas extends AbstractModel
{
    public $tabela = "encomendas";
    protected $propriedades = array(
        'id' => null,
        'nome' => null,
        'saida' => null,
        'destino' => null
    );
}

