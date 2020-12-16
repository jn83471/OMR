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
		function tabla($filesdata,$atributes,$headers="<table class='table'> || </table>",$rows="<tr> || <td>  || </td> || </tr>",$thead=""){
			echo $thead;
			$headers=explode("||", $headers);
			$rows=explode("||", $rows);
			$files=json_decode($filesdata);
			if (count($headers)>1 && count($rows)>3) {
				echo $headers[0];
				$files=json_decode($filesdata);
				foreach ($files as $values) {
					echo $rows[0];
					foreach ($atributes as $data) {
						echo $rows[1];
						echo $values->$data."";
						echo $rows[2];
					}
					echo $rows[3];
				}
				echo $headers[1];
			}
			else
			{
				foreach ($files as $values) {
					foreach ($atributes as $data) {
						echo $values->$data."<br>";
					}
				}
			}
			
		}
	}
?>