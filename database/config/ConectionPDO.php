<?php
	/**
	 * 
	 */
	require_once "database/config/config.php";
	use ULTIMATE\config;
	class ConectionPDO
	{
		protected static$pdo;
		protected $query;
		protected $stm;
		protected static function Run($typebd)
		{
			if($typebd==="mysql"){
				try {
					self::$pdo = new PDO('mysql:host='.HOST.';dbname='.BD, USER, PASSWORD,[
					    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
					    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
					    PDO::ATTR_EMULATE_PREPARES   => false,
					]);
				} catch (Exception $e) {
					echo $e->getMessage();
				}
			}
		}

		protected function prepareconsult($query){
			$this->query=$query;
			$this->stmt = self::$pdo->prepare($query);
		}
		protected function execute($params=""){
			if(is_array($params)){
				$this->stmt->execute($params);
			}
			else{
				$this->stmt->execute();
			}
		}
		protected function fetchArrow($params=""){
			$this->execute($params);
			$user = $this->stmt->fetchAll();
			return json_encode($user);
		}
		//'SELECT * FROM users WHERE email = :email AND status=:status'
		//$stmt->execute(['email' => $email, 'status' => $status]);
		//$user = $stmt->fetch();
	}
?>