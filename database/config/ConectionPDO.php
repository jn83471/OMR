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
		public static function Run($typebd)
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

		public function prepareconsult($query){
			$this->query=$query;
			$this->stmt = self::$pdo->prepare($query);
		}
		public function execute(){
			$this->stmt->execute();
			//echo $this->query;
		}
		public function fetchArrow(){
			$user = $this->stmt->fetchAll();
			return json_encode($user);
		}
		//'SELECT * FROM users WHERE email = :email AND status=:status'
		//$stmt->execute(['email' => $email, 'status' => $status]);
		//$user = $stmt->fetch();
	}
?>