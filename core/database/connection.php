<?php 
    $dbName      = 'dbname=ai_solution';
    $port        = 'port = 5432';
    $host        = 'host = 127.0.0.1';
    $credentials = 'user = postgres password=123';
    $db = pg_connect("$host $port $dbName $credentials");
    if(!$db) {
        echo "Error : Unable to open database\n";
    }
?>