<?php
ob_start();
try {
	$con = new PDO("mysql:dbname=ai-solution;host=localhost", "root", "");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(PDOExeption $e) {
	echo "Connection failed: " . $e->getMessage();
}
define("SERVICES_NOODLE", "http://localhost:81/ai-solution/services/noodle/");

?>