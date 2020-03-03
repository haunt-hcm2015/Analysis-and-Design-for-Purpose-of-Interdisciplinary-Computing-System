<?php 
     $ds = DIRECTORY_SEPARATOR;
	$base_dir = realpath(dirname(__FILE__).$ds.'..') . $ds;
     require_once("{$base_dir}core{$ds}init.php"); 
     
     $getFromUser->logout();
     if ($getFromUser->loggedIn() === false)
          header("Location: ".BASE_URL."index.php");
?>