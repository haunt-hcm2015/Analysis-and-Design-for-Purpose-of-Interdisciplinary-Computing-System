<?php 
    $directorySeparator = DIRECTORY_SEPARATOR;
	$baseDir = realpath(dirname(__FILE__).$directorySeparator.'..') . $directorySeparator;
	require_once("{$baseDir}{$directorySeparator}init.php"); 
     
     $user->logout();
     if ($user->loggedIn() === false)
          header("Location: ".BASE_URL."index.php");
?>