<?php 
 class User{
     protected $pdo;
     function __construct($pdo){
         $this->pdo = $pdo;
     }
     public function checkInput($var){
        $var = htmlspecialchars($var);
        $var = trim($var);
        $var = stripslashes($var);
        return $var;
    }
    
    public function create($table, $fields = array()){
        $columnName = implode(',', array_keys($fields));
        $values = ':'.implode(', :', array_keys($fields));
        $sql = "INSERT INTO `{$table}` ({$columnName}) VALUES ({$values})";
        $smtp = $this->pdo->prepare($sql);
        if ($smtp = $this->pdo->prepare($sql)){
            foreach($fields as $key => $data)
                $smtp->bindValue(":".$key, $data);
            $smtp->execute();
            return $this->pdo->lastInsertId();
        }
    }
    public function update($table, $userId, $fields = array()){
        $columns = '';
        $i  = 1;
        foreach($fields as $name => $value){
            $columns .= "{$name} = :{$name}";
            if ($i < count($fields))
                $columns .= ', ';
            $i++;
        }
        $sql = "UPDATE {$table} SET {$columns} WHERE user_id = {$userId}";
        if ($smtp = $this->pdo->prepare($sql)){
            foreach($fields as $key => $value)
                $smtp->bindValue(':'.$key, $value);
            $smtp->execute();
        }
    }
    public function checkPassword($password){
        $password = md5($password);
        $smtp = $this->pdo->prepare("SELECT password from users WHERE password = :_password");
        $smtp->bindParam(":_password", $password, PDO::PARAM_STR);
        $smtp->execute();
        $count = $smtp->rowCount();
        if ($count > 0)
            return true;
        return false;
    }
    public function checkEmail($email){
        $smtp = $this->pdo->prepare("SELECT email from users WHERE email = :email");
        $smtp->bindParam(":email", $email, PDO::PARAM_STR);
        $smtp->execute();
        $count = $smtp->rowCount();
        if ($count > 0)
            return true;
        return false;
    }
    public function login($username, $pass){
        $smtp = $this->pdo->prepare('SELECT `user_id` from `users` WHERE `username`= :user and `password` = :pass');
        $smtp->bindParam(":user", $username, PDO::PARAM_STR);
        $pass = md5($pass);
        $smtp->bindParam(":pass", $pass, PDO::PARAM_STR);
        $smtp->execute();
        $user = $smtp->fetch(PDO::FETCH_OBJ);
        $count = $smtp->rowCount();
        if ($count > 0){
            $_SESSION['user_id'] = $user->user_id;
            header("Location: ".BASE_URL."console-application");
        }
        else
            return false;
    }
    public function loggedIn(){
        return (isset($_SESSION['user_id'])) ? true : false;
    }
    public function logout(){
        $_SESSION = array();
        session_destroy();
    }
    public function getUserInfo($userID){
        $smtp = $this->pdo->prepare("SELECT `profileuser`, `username` from `users` WHERE `user_id` = :userID");
		$smtp->bindParam(":userID", $userID, PDO::PARAM_STR);
        $smtp->execute();
        $userInfo = $smtp->fetch(PDO::FETCH_OBJ);
		return $userInfo;
    }
    public function uploadImage($file){
        $fileName = basename($file['name']);
        $fileTmp  = $file['tmp_name'];
        $fileSize = $file['size'];
        $error	  = $file['error'];
        $ext 	  = explode('.', $fileName); 
        $ext 	  = strtolower(end($ext));
        $allowExt = array('png', 'jpg', 'jpeg', 'gif');
        if (in_array($ext, $allowExt) === true){
            if ($error === 0)
                if ($fileSize <= 10240){
                    $fileRoot = 'assets/metadata/user_image'.$fileName;
                    move_uploaded_file($fileTmp, $_SERVER['DOCUMENT_ROOT'].'/ai-solution/'.$fileRoot);
                    return $fileRoot;
                }else 
                    $GLOBALS['imageError'] = "The File Size is Too Large";
        }else{
            $GLOBALS['imageError'] = "The Extension is Not Allowed";
        }
    }
 }    
?>