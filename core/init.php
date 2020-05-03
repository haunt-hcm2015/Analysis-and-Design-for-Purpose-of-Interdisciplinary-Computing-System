<?php 
include 'database/connection.php';
include 'classes/user.php';

global $db;
if (!isset($_SESSION)){
    session_start();
}
$user = new User($db);
define("BASE_URL", "http://localhost:81/ai-solution/");
define("AI_URL", "http://localhost:8000/");



?>