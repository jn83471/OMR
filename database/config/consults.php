<?php
	
	require_once "database/config/ConectionPDO.php";
	
	/**
	 * 
	 */
	class conects extends ConectionPDO
	{
		protected static $table;
		protected static $consult;
		private $checked=false;

		/*function __construct($type,$table)
		{
			parent::__construct($type);
			$this->table=$table;
		}*/
		public static function factory($type,$tables){
			parent::Run($type);
			self::$table=$tables;
			return new self;
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
			$consult.=" FROM ".self::$table;
			self::$consult=$consult;
			$this->checked=true;
			self::prepareconsult(self::$consult);
			return $this;
		}

		public function limit($number=1)
		{
			$consult=" LIMIT ".$number;
			self::$consult.=$consult;
			self::prepareconsult(self::$consult);
			return $this;
		}
		public function consulta(){
			echo self::$consult;
		}
	}
?>