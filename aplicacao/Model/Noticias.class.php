<?php
	
namespace Model;

class Noticias extends AbstractModel
{
	public $tabela = 'noticias';

	protected $atributos = array(
		'id' => NULL,
		'id_idioma' => NULL,
		'titulo' => NULL,
		'sub_titulo' => NULL,
		'conteudo' => NULL,
		'imagem' => NULL,
		'data_noticia' => NULL,
		'ordem' => NULL,
		'ativo' => NULL,
		'deleted' => NULL

	);
}	