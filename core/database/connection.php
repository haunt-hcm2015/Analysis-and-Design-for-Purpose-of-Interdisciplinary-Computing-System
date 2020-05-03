<?php 
    try{
        $pdo = new PDO('pgsql:host=localhost;dbname=ai_solution;port=5432;user=postgres;password=123');
           
    }catch(PDOException $e){
		echo 'Connection error: '.$e->getMessage();
	}
?>