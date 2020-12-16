<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<?php
		use ultimate\link as link;
		use ultimate\Bootstrap as Bootstrap;
		use Ultimate\creator\consults as creator;
		//use ultimate\Materialize as Materialize;
		//Materialize\ClasstoMaterialize();
		Bootstrap\ClasstoBoostrapcss();
		echo link\Classto("resources/css/index.css");
		$style=new stylesheet();
	?>
</head>
<body>

  


	<?php
	use Ultimate\creator\consults;
	$atributes=["nombre","email"]; 
	$operators=creator\arraygeneratorselect(["id"=>1],["nombre"=>"casimiro"]);
	$cons=conects::factory("mysql","user")
	->select($atributes,$operators)
	->limit(3);
	//$cons->consulta();
	$files=$cons->fetch();
	$style->tabla($files,$atributes);
	//$style->tabla($files,$atributes,"","","");
	//creator\echos();
 	?>
</body>
<?php Bootstrap\ClasstoBoostrapjs(); ?>
<?php //Materialize\ClasstoMaterializejs(); ?>
</html>
