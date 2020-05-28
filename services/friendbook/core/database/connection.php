<?php 
	class ConnectDB {
		private $userName;
		private $password;
		private $dbname;
		public function __construct($dbname, $userName, $password){
			$this->userName = $userName;
			$this->password = $password;
			$this->dbname = $dbname;
		}
		public function connect(){
			try{
				$pdo = new PDO($this->dbname, $this->userName, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
				return $pdo;
			}catch(PDOException $e){
				echo 'Connection error: '.$e->getMessage();
			}
		}
	}
	$connectDB = new ConnectDB('mysql:host=localhost; dbname=ai-solution', 'root', '');
	$pdo = $connectDB->connect();
	
?>