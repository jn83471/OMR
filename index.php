<?php
	require_once "config/consults.php";
	$url=explode("/", $_GET['url']);
	$bd=new conects("user");
	$atributes=["nombre","email"];
	$bd->select($atributes)->limit(1)->consulta();

?>