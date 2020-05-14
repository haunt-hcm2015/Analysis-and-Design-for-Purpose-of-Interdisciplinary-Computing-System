<?php 
    try{
        $pdo = new PDO("mysql:dbname=ai-solution;host=localhost", "root", "");
           
    }catch(PDOException $e){
		echo 'Connection error: '.$e->getMessage();
	}
?>