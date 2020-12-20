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
		private $params="";
		private $seleccionador=1;

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
		public function select(array $args,$params=""){

			$constador=true;
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
			if(isset($params)){
				if (is_array($params) && count($params)>0) {
					$consult.=" WHERE ";
					$this->params=[];
					foreach ($params as $key => $value) {
						if ($key==="AND" || $key==="OR") {
							foreach ($value as $keyindex => $values) {
								if ($key==="OR") {
									$variblespecial=str_replace("/","", $keyindex)."o".$this->seleccionador;
									$this->params=array_merge($this->params,[$variblespecial=>$values]);
								}
								else{
									$this->params=array_merge($this->params,[$keyindex=>$values]);
								}
								
								
								if ($constador) {
									$consult.=" ".$keyindex." = :".$keyindex;
									$constador=false;
								}
								else{
									if ($key==="OR") {
										$consult.=" ".$key." ".str_replace("/","", $keyindex)." = :".str_replace("/","", $keyindex)."o".$this->seleccionador;
									}
									else{
										$consult.=" ".$key." ".$keyindex." = :".$keyindex;
									}
								}
								$this->seleccionador++;
							}
						}
						//var_dump($this->params);
					}
				}
			}
			
			self::$consult=$consult;
			$this->checked=true;
			return $this;
		}

		public function innerjoin(array $tables,array $atributos){
			return $this;
		}

		public function widthAnd(...$args){
			$localquery=self::$consult;
			$this->params=[];
			//echo $var;
			//var_dump($args);
			foreach ($args as $keys => $value) {
				foreach ($value as $key => $files) {
					if ($this->seleccionador===1) {
						$localquery.=" WHERE ".$key." = :".$key;
						$this->seleccionador++;
					}
					else{
						$localquery.=" AND ".$key." = :".$key;
					}

					$this->params=array_merge($this->params,[$key=>$files]);
					
				}
			}
			self::$consult=$localquery;
			return $this;
		}

		public function widthOr(...$args){
			//var_dump($args);
			return $this;
		}

		public function limit($number=1)
		{
			$consult=" LIMIT ".$number;
			self::$consult.=$consult;
			return $this;
		}
		public function consulta(){
			echo self::$consult;
		}
		public function state(){
			echo $this->state;
		}
		public function fetch(... $args){
			if(is_array($this->params))
			{
				self::prepareconsult(self::$consult,$args);
				return parent::fetchArrow($this->params);
			}
			else{
				self::prepareconsult(self::$consult,$args);
				return parent::fetchArrow();
			}
		}

		//'SELECT * FROM users WHERE email = :email AND status=:status'
	}

	
	
?>