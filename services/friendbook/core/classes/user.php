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
		public function randomCode(){
			$digitsNeeded = 8;
			$randomNumber = ''; 
			$count = 0;
			while ( $count < $digitsNeeded ) {
				$randomDigit = mt_rand(0, 9);
				$randomNumber .= $randomDigit;
				$count++;
			}
			return $randomNumber;
		}
		public function confirmCode($userID){
			$smtp = $this->pdo->prepare("SELECT `hash_code` from `user` WHERE `user_id` = :userID");
			$smtp->bindParam(":userID", $userID, PDO::PARAM_STR);
			$smtp->execute();
			$user = $smtp->fetch(PDO::FETCH_OBJ);
			return $user->hash_code;
		}
		public function confirmEmail($email, $code){
			$mail = new PHPMailer();
			$mail->IsSMTP(); 
			$mail->Host = "smtp.gmail.com"; 
			$mail->Port = '587'; 
			$mail->SMTPSecure = 'tls';
 			$mail->SMTPAuth = true;
			$mail->isHTML();
			$mail->Username = "noreply74108520963@gmail.com"; 
			$mail->Password = "lyggyrxiwwgaspko";  
			$mail->AddAddress($email);
			$mail->Subject = "Please confirm your email";
			$mail->msgHTML("A sign in attempt requires further verification because we did not recognize your email. To complete the sign in, enter the verification code on the platform.
									<br/> <br/> Verify code: ".$code." <br/><br/> Thanks and best regard <br/> The Friendbook team."); 
			$mail->send();
		}
		public function search($search){
			$smtp = $this->pdo->prepare("SELECT `user_id`,`username`,`screen_name`,`profile_image`,`profile_cover` from `user` WHERE `username` LIKE ? OR `screen_name` LIKE ?");
			$smtp->bindValue(1, $search.'%', PDO::PARAM_STR);
			$smtp->bindValue(2, $search.'%', PDO::PARAM_STR);
			$smtp->execute();
			return $smtp->fetchAll(PDO::FETCH_OBJ);
		}
		public function checkEmail($email){
			$smtp = $this->pdo->prepare("SELECT `email` from `user` WHERE `email` = :email");
			$smtp->bindParam(":email", $email, PDO::PARAM_STR);
			$smtp->execute();

			$count = $smtp->rowCount();
			if ($count > 0)
				return true;
			return false;
		}
		public function preventAccess($request, $currentFile, $currently){
			if ($request == "GET" && $currentFile == $currently){
				header("Location: ".BASE_URL."index.php");
			}
		}
		public function checkPhoneNumber($phoneNumber){
			$smtp = $this->pdo->prepare("SELECT `phone_number` from `user` WHERE `phone_number` = :phoneNumber");
			$smtp->bindParam(":phoneNumber", $phoneNumber, PDO::PARAM_STR);
			$smtp->execute();

			$count = $smtp->rowCount();
			if ($count > 0)
				return true;
			return false;
		}
		public function checkUserName($userName){
			$smtp = $this->pdo->prepare("SELECT `username` from `user` WHERE `username` = :username");
			$smtp->bindParam(":username", $userName, PDO::PARAM_STR);
			$smtp->execute();

			$count = $smtp->rowCount();
			if ($count > 0)
				return true;
			return false;
		}

		public function checkPassword($password){
			$password = md5($password);
			$smtp = $this->pdo->prepare("SELECT `password` from `user` WHERE `password` = :_password");
			$smtp->bindParam(":_password", $password, PDO::PARAM_STR);
			$smtp->execute();

			$count = $smtp->rowCount();
			if ($count > 0)
				return true;
			return false;
		}

		public function register($userName, $screenName, $birthday, $gender, $email, $password){
			$smtp = $this->pdo->prepare("INSERT INTO `user` (`username`, `email`,`password`,`screen_name`,`profile_image`,`profile_cover`, `gender`,`birthday`)
											VALUES (:username, :email, :_password, :screenName, 
												'assets/images/defaultprofileimage.png', 
												'assets/images/defaultCoverImage.png', :gender, :birthday)");
			$smtp->bindParam(":username", $userName, PDO::PARAM_STR);
			$smtp->bindParam(":email", $email, PDO::PARAM_STR);
			$password = md5($password);
			$smtp->bindParam(":_password", $password, PDO::PARAM_STR);
			$smtp->bindParam(":screenName", $screenName, PDO::PARAM_STR);
			$smtp->bindParam(":gender", $gender, PDO::PARAM_STR);
			$smtp->bindParam(":birthday", $birthday, PDO::PARAM_STR);
			$smtp->execute();
			$userID = $this->pdo->lastInsertId();
			$_SESSION['user_id'] = $userID;
		}

		public function create($table, $fields = array()){
			# Join key element of array to string
			$columnName = implode(',', array_keys($fields));
			$values = ':'.implode(', :', array_keys($fields));
			$sql = "INSERT INTO {$table} ({$columnName}) VALUES ({$values})";
			if ($smtp = $this->pdo->prepare($sql)){
				foreach($fields as $key => $data)
					$smtp->bindValue(':'.$key, $data);
				$smtp->execute();
				return $this->pdo->lastInsertId();
			}
		}
		public function update($table, $userId, $fields = array()){
			$columns = '';
			$i  = 1;
			foreach($fields as $name => $value){
				$columns .= "`{$name}` = :{$name}";
				if ($i < count($fields))
					$columns .= ', ';
				$i++;
			}
			$sql = "UPDATE {$table} SET {$columns} WHERE `user_id` = {$userId}";
			if ($smtp = $this->pdo->prepare($sql)){
				foreach($fields as $key => $value)
					$smtp->bindValue(':'.$key, $value);
				$smtp->execute();
			}
		}
		public function delete($table, $array){
			$sql   = "DELETE FROM `{$table}`";
			$where = " WHERE ";
			foreach($array as $name => $value){
				$sql  .= "{$where} `{$name}` = :{$name}";
				$where = " AND ";
			} 
			if ($smtp = $this->pdo->prepare($sql)){
				foreach($array as $name => $value){
					$smtp->bindValue(":".$name, $value);
				} 
				var_dump($sql);
				$smtp->execute();
			}
		}
		public function login($email, $password){
			$smtp = $this->pdo->prepare('SELECT `user_id` from `user` WHERE `email` = :email and `password` = :password');
			$smtp->bindParam(":email", $email, PDO::PARAM_STR);
			$password = md5($password);
			$smtp->bindParam(":password", $password, PDO::PARAM_STR);
			$smtp->execute();

			$user = $smtp->fetch(PDO::FETCH_OBJ);
			$count = $smtp->rowCount();
			if ($count > 0)
			{
				$_SESSION['user_id'] = $user->user_id;
				header('Location: home.php');
			}else{
				return false;
			}
		}

		public function userIdByUsername($_username){
			$smtp = $this->pdo->prepare("SELECT `user_id` from `user` WHERE `username` = :username");
			$smtp->bindParam(":username", $_username, PDO::PARAM_STR);
			$smtp->execute();
			$user = $smtp->fetch(PDO::FETCH_OBJ);
			return $user->user_id;
		}

		public function uploadImage($file){
			$fileName = basename($file['name']);
			$fileTmp  = $file['tmp_name'];
			$fileSize = $file['size'];
			$error	  = $file['error'];
			$ext 	  = explode('.', $fileName); 
			$ext 	  = strtolower(end($ext));
			$allowExt = array('png', 'jpg', 'jpeg', 'docx', 'ods', 'odt', 'doc', 'odt','tex', 'txt','pdf', 'exe', 'zip', 'rar', '7z', 'cbr', 'deb', 'gz',
									 'pkg', 'rpm', 'sitx', 'tar.gz', 'zipx', 'html', 'bsl', 'abap', 'fnt', 'fon', 'otf', 'ttf', 'crx', 'plugin', 'asp', 'aspx',
									 'cer', 'cfm', 'csr', 'css', 'dcr', 'htm', 'js', 'jsp', 'php', 'rss', 'xhtml', 'gpx', 'kml', 'kmz', 'dwg', 'dxf', 'apk',
									 'app', 'bat', 'cgi', 'com', 'gadget', 'jar', 'wsf', 'db', 'dbf', 'mdb', 'pdb', 'sql', 'accdb', 'xlr', 'xls', 'xlsx', 'mp3',
									 'avi', 'asf', '3g2', '3gp', 'flv', 'm4v', 'mov', 'mp4', 'mpg', 'rm', 'srt', 'swf', 'vob', 'wmv', 'wav', 'wma', 'mpa', 'mid', 
									 'm4a', 'm3u', 'iff', 'aif', 'ppt', 'pptx', 'csv', 'xml', 'abnf', 'asc', 'ash', 'ampl', 'mod', 'g4', 'apib', 'apl', 'dyalog', 
									 'asn', 'asn1', 'torent', 'part', 'msi', 'ics', 'crdownload', 'tmp', 'bak', 'c', 'cpp', 'class', 'cs', 'dtd', 'fla', 'h', 'java',
									 'lua', 'm', 'pl', 'py', 'sh', 'sln', 'swift', 'vb', 'vcxproj', 'xcodeproj', 'bin', 'cue', 'dmg', 'iso', 'mdf', 'toast', 'vcd');
			if (in_array($ext, $allowExt) === true){
				if ($error === 0)
					if ($fileSize <= 209272152){
						$fileRoot = 'users/'.$fileName;
						move_uploaded_file($fileTmp, $_SERVER['DOCUMENT_ROOT'].'/friendbook/'.$fileRoot);
						return $fileRoot;
					}else 
						$GLOBALS['imageError'] = "The file size is too large";
			}else{
				$GLOBALS['imageError'] = "The extension is not allowed";
			}
		}
		# Posted time ago 
		public function timeAgo($dateTime){
			$time 	 = strtotime($dateTime);
			$current = time();
			$seconds = $current - $time;
			$minutes = round($seconds / 60);
			$hour 	 = round($seconds / 3600);
			$month   = round($seconds / 2600640);
			if ($seconds <= 60)
				if ($seconds == 0)
					return 'now';
				else
					return $seconds.' s';
			else if ($minutes <= 60)
				return $minutes.' m';
			else if ($hour <= 24)
				return $hour.' h';
			else if ($month <= 24)
				return date('M j', $time);
			else
				return date('j M Y', $time);
		}
		public function loggedIn(){
			return (isset($_SESSION['user_id'])) ? true : false;
		}
		public function userData($userId){
			$smtp = $this->pdo->prepare('SELECT * from `user` WHERE `user_id` = :userId');
			$smtp->bindParam(":userId", $userId, PDO::PARAM_INT);
			$smtp->execute();
			$data = $smtp->fetch(PDO::FETCH_OBJ);
			return $data;
		}

		public function logout(){
			$_SESSION = array();
			session_destroy();
			header("Location: ".BASE_URL."index.php");
		}
	}
?>