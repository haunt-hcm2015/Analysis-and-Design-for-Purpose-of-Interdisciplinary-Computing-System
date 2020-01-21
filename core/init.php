<?php 
include_once 'database/connection.php';

global $pdo;
if (!isset($_SESSION)){
    session_start();
}
define("BASE_URL", "http://localhost:81/ai-solution/");
?>