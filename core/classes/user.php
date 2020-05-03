<?php 
 class User{
     protected $db;
     function __construct($db){
         $this->db = $db;
     }
     public function checkInput($var){
        $var = htmlspecialchars($var);
        $var = trim($var);
        $var = stripslashes($var);
        return $var;
    }
 }    
?>