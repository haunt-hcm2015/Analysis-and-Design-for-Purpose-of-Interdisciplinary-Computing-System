<?php
ob_start();
try {
	$con = new PDO("mysql:dbname=ai-solution;host=localhost", "root", "");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(PDOExeption $e) {
	echo "Connection failed: " . $e->getMessage();
}
define("NOODLE_URL", "http://localhost:81/ai-solution/noodle/");
define("BASE_URL", "http://localhost:81/ai-solution/");
define("SERVICES_NOODLE", "http://localhost:81/ai-solution/services/noodle/");
?>