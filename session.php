<?php
session_start();

if($_GET['lang'] == 'pt'){
	$_SESSION['user']['idioma'] = 'pt';
	$_SESSION['user']['id_idioma'] = '1';
}elseif($_GET['lang'] == 'en'){
	$_SESSION['user']['idioma'] = 'en';
	$_SESSION['user']['id_idioma'] = '2';
}elseif($_GET['lang'] == 'du'){
	$_SESSION['user']['idioma'] = 'du';
	$_SESSION['user']['id_idioma'] = '2';
}

header("Location: home");

?>