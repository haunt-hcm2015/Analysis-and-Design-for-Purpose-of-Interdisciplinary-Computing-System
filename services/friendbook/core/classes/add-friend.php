<?php 
	class AddFriend extends User{
		protected $pdo;
		function __construct($pdo){
			$this->pdo = $pdo;
		}
	}
?>