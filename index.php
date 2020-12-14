<?php
	require_once "database/config/consults.php";
	$url= $_GET['url'] ?? "Index/index";
	$url=explode("/", $url);
	$atributes=["nombre","email"]; 
	$cons=conects::factory("mysql","user")->select($atributes)->limit(2);
	$cons->execute();
	var_dump($cons->fetchArrow());
	
?>