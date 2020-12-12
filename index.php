<?php
	require_once "config/consults.php";
	$bd=new conects("user");
	$atributes=["nombre","email"];
	$bd->select($atributes)->limit(1)->consulta();

?>