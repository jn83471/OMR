<?php
	/**
	 * 
	 */
	class stylesheet
	{
		
		function __construct()
		{
			
		}
		//crea tablas
		function tabla($patata){
			$files=json_decode($patata);
			foreach ($files as $value) {
				echo $value->nombre;
			}
		}
	}
?>