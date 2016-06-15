<?php

namespace Model;

class Clientes extends AbstractModel
{
    public $tabela = "clientes";
    
    protected $atributos = array(
        'id' => null,
        'nome_razao' => null,
        'cpf_cnpj' => null,
        'email' => null,
        'telefone' => null
    );
}

