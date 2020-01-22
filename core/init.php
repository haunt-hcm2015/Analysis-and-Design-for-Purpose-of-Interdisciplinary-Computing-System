<?php 
include_once 'database/connection.php';

global $pdo;
if (!isset($_SESSION)){
    session_start();
}
define("BASE_URL", "http://localhost:81/ai-solution/");

function execInBackground($cmd) {
    if (substr(php_uname(), 0, 7) == "Windows"){
        pclose(popen("start /B ". $cmd, "r")); 
    }
    else {
        exec($cmd . " > /dev/null &");  
    }
}
// $technology = 'python implementation_algorithm/manage.py runserver';
// shell_exec($technology);
?>