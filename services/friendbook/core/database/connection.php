<?php 
	$databaseName = 'mysql:host=localhost; dbname=friendbook';
	$user = 'root';
	$pass = '';
	try{
		$pdo = new PDO($databaseName, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	}catch(PDOException $e){
		echo 'Connection error: '.$e->getMessage();
	}
?>