<?php

namespace Model;

class TiposEncomendas extends AbstractModel
{
    public $tabela = 'tipos_encomendas';
    protected $atributos = array(
      'id' => null,
      'nome' => null,
      'valor_km' => null,
      'prazo_maximo' => null,  
    );
}

