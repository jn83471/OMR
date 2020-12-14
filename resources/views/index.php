<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="http://localhost:81/omr/resources/css/index.css">
	<?php
		
		$style=new stylesheet();
		//use ultimate\Bootstrap as Bootstrap;
		//Bootstrap\ClasstoBoostrapcss();
		use ultimate\Materialize as Materialize;
		Materialize\ClasstoMaterialize();
	?>
</head>
<body>
	<div class="row">
    <div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Card Title</span>
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>
  </div>
	<?php

	$atributes=["nombre","email"]; 
	$cons=conects::factory("mysql","user")->select($atributes)->limit(1);
	$cons->execute();
	$files=$cons->fetchArrow();
	$style->tabla($files);
	
 	?>
</body>
<?php //Bootstrap\ClasstoBoostrapjs(); ?>
<?php Materialize\ClasstoMaterializejs(); ?>
</html>
