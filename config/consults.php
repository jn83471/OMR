<?php
	require_once "config/config.php";
	use ULTIMATE\config;
	/**
	 * 
	 */
	class conects
	{
		protected $table;
		protected $consult;
		function __construct($table)
		{
			$this->table=$table;
		}
		public function select(array $args){
			$consult="SELECT ";
			foreach ($args as $key => $value) {
				if($key===0){
					$consult.=$value."";
				}
				else{
					$consult.=", ".$value." ";
				}
				
			}
			$consult.=" FROM ".$this->table;
			$this->consult=$consult;
			return $this;
		}

		public function limit($number=1)
		{
			$consult=" LIMIT ".$number;
			$this->consult.=$consult;
			return $this;
		}
		public function consulta(){
			echo $this->consult;
		}
	}
?>