<?php 
    include_once('RandomName.php');
    class CSV{
        function __construct(){

        }
        function insertDB($table, $columns = array(), $values = array(), $appendix = false, $ret = false) {
            $query = 'INSERT INTO';
            $query .= ' `'.addslashes($table)."` ";
            if (is_array($columns)) {
                $query .= '(';
                $num = 0;
                foreach ($columns as $key => $value) {
                    $query .= ' `'. $value .'`';
                    $num++;
                    if ($num != count($columns)) {
                        $query .= ',';
                    }
                }
                $query .= ' ) VALUES ';
                foreach ($values as $key => $value) {
                    $query .= '(';
                    foreach ($value as $key => $value) {
                        $query .= "'" . $value . "'" . ',';
                    }
                    $query = rtrim($query, ',');
                    $query .= '),'.PHP_EOL;
                }
                $query = rtrim($query, ','.PHP_EOL);
                if ($appendix) {
                    $query .= ' ' . $appendix;
                }
                if ($ret) {
                    return $query;
                }
                return $query;    
            }  
        }
        function randomBirthday(){
            $min        = strtotime("63 years ago");
            $max        = strtotime("13 years ago");
            $randTime  = mt_rand($min, $max);
            $birthDate = date('Y-m-d', $randTime);
            return $birthDate;
        }
        function randomName($number){
            $name = new randomNameGenerator('array');
            $names = $name->generateNames($number);
            return $names;
        }
        function randomEmail($number, $username_length = 10){
            if (is_numeric($number) && $number != 0) {
                $generated_email_addresses = array(); 
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
                $char_count = count($characters); 
                $tld = array("com", "net", "biz"); 
                for ($i = 0; $i < $number; ++$i){
                    $randomName = ''; 
                    for($j = 0; $j < $username_length; ++$j){
                        $randomName .= $characters[rand(0, strlen($characters) - 1)];
                    }
                    $k = array_rand($tld); 
                    $extension = $tld[$k]; 
                    $fullAddress = $randomName . "@" ."example.".$extension; 
                    $generated_emails[] = $fullAddress; 	
                    $email_count = count($generated_emails); 
                }
                    
            }
            return $generated_emails;
        }
        function insertUser($number = 10){
            $columns       = array('username' , 'email' , 'password', 'screen_name', 'profile_image', 'profile_cover', 'birthday');
            $userData      = array();
            $userNames     = $this->randomName($number);
            $emails        = $this->randomEmail($number);
            $password      = md5(123456);
            $screenNames   = $userNames;
            $profileImage  = 'assets/images/defaultprofileimage.png';
            $profileCover  = 'assets/images/defaultCoverImage.png';
            for ($i = 0; $i < $number; $i++){
                $birthday     = $this->randomBirthday();
                $username     = str_replace(' ', '', $userNames[$i]);
                $email        = $emails[$i];
                $screenName   = $screenNames[$i];
                $userData[]   = array($username , $email , $password, $screenName, $profileImage, $profileCover, $birthday);
            }
            $data = $this->insertDB('user' , $columns , $userData ); 
            $handle = fopen('InsertUser-'.date('dmy-hsi',time()).'.sql','w+');
	        fwrite($handle,$data);
            fclose($handle);   
            echo 'Write file success';      
        }

    }
    $data = new CSV();
    $data->insertUser(80000);
    


?>