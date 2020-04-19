<?php 
include_once 'database/connection.php';

global $db;
if (!isset($_SESSION)){
    session_start();
}
define("BASE_URL", "http://localhost:81/ai-solution/");
define("AI_URL", "http://localhost:8000/");



?>