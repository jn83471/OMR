
	<?php
	require_once "database/config/consults.php";
	require_once "app/Controllers/Maincontroller.php";
	require_once "resources/styles/stylesheetsjon.php";
	require_once "resources/styles/stylesheetlink.php";
	require_once "Config/config.php";

	$controller="";
	$url= $_GET['url'] ?? "Index/index";
	$url=explode("/", $url);
	
	$crud="";
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

	if (isset($url[1])) {
		$crud=is_numeric($url[1]) ? true : false;
	}
	if ($crud) {
		echo "number";
	}else{
		require_once "resources/views/index.php";
	}
	
	
?>

