<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="http://localhost:81/omr/resources/css/index.css">
</head>
<body>
	<?php
	require_once "database/config/consults.php";
	require_once "app/Controllers/Maincontroller.php";
	require_once "resources/styles/stylesheetsjon.php";

	$controller="";
	$url= $_GET['url'] ?? "Index/index";
	$url=explode("/", $url);
	$style=new stylesheet();
	if(isset($url[0]))
	{
		$controller=$url[0];
	}
	if(file_exists("app/Controllers/".$controller."Controller.php")){
		$controllerpath=$controller."Controller";
		require_once "app/Controllers/".$controllerpath.".php";
		$controllerfunction=new $controllerpath();
		if (method_exists($controllerfunction,$controller)) {
			$controllerfunction->{$controller}();
		}
	}

	$atributes=["nombre","email"]; 
	$cons=conects::factory("mysql","user")->select($atributes)->limit(2);
	$cons->execute();
	$files=$cons->fetchArrow();
	$style->tabla($files);
	
?>
</body>
</html>

