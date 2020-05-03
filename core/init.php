<?php 
include 'database/connection.php';
include 'classes/user.php';

global $pdo;
if (!isset($_SESSION)){
    session_start();
}
$user = new User($pdo);
define("BASE_URL", "http://localhost:81/ai-solution/");
define("AI_URL", "http://localhost:8000/");



?>