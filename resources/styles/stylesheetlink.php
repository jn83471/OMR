<?php
namespace ultimate\Bootstrap;
use ultimate\link as link;
function ClasstoBoostrapcss(){

	echo link\Classto("bootstrap/css/bootstrap.min.css");
}
function ClasstoBoostrapjs(){

	echo link\jsto("bootstrap/js/bootstrap.min.js");
}	

namespace ultimate\Materialize;
use ultimate\link as link;
function ClasstoMaterialize(){
	echo link\Classto("materialize/css/materialize.min.css");
}
function ClasstoMaterializejs(){

	echo link\jsto("materialize/js/materialize.min.js");
}
namespace ultimate\link;
function Classto($link){
	return "<link rel='stylesheet' href='".URL.$link."'>";
}
function jsto($link){
	return "<script src='".URL.$link."' type='text/javascript'></script>";
}
?>