<?php 
	$ds = DIRECTORY_SEPARATOR;
	$base_dir = realpath(dirname(__FILE__).$ds.'..').$ds;
	require_once("{$base_dir}core{$ds}init.php"); 
	require_once("{$base_dir}core{$ds}classes{$ds}class.phpmailer.php"); 
	require_once("{$base_dir}core{$ds}classes{$ds}class.smtp.php"); 

	if ($_SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
		header("Location: ".BASE_URL."index.php");
	}
	if (isset($_POST['signup'])){
		$screenName = $_POST['screenName'];
		$email 		= $_POST['email'];
		$password 	= $_POST['password'];
		$date 		= strtotime($_POST['birthday']);
		$birthday 	= date('Y-m-d', $date);
		$gender 	= $_POST['gender'];
		$error2		= '';
		if (empty($screenName) or empty($birthday) 
				or empty($gender) or empty($email) 
					or empty($password))
			$error2 = 'All field are required';
		else{
			$screenName = $getFromUser->checkInput($screenName);
			$email 		= $getFromUser->checkInput($email);
			$password 	= $getFromUser->checkInput($password);
			$code       = $getFromUser->randomCode();
			if (!filter_var($email))
				$error2 = "Invalid email format";
			else if (strlen($screenName) > 20)
				$error2 = "Name must be between 6-20 characters";
			else if (strlen($password) < 5)
				$error2 = "Password is to short";
			else{
				if ($getFromUser->checkEmail($email) === true)
					$error2 = "Email is already in use";
				else{
					$user_id = $getFromUser->create('users', array( 'email' => $email, 
								'password' => md5($password),'screen_name' => $screenName, 
									'profile_image' => 'assets/images/defaultprofileimage.png', 
										'profile_cover' => 'assets/images/defaultCoverImage.png', 
											'gender' => $gender, 'birthday' => $birthday, 'hash_code' => $code));
					$_SESSION['user_id'] = $user_id;
					$getFromUser->confirmEmail($email, $code);
					header("Location: includes/signup.php?step=1");
					exit();
				}
			}
		}
	}
?>
<form method="post">
	<div class="signup-div"> 
		<h3>Sign up </h3>
		<ul>
			<li>
				<input type="text" name="screenName" placeholder="Full Name"/>
			</li>
			<li>
				<input type="email" name="email" placeholder="Email"/>
			</li>
			<li>
				<input type="password" name="password" placeholder="Password"/>
			</li>
			<li>
				<h3>Birthday</h3>
				<input type="date" name="birthday" placeholder="Birthday"/>
			</li>
			<li>
				<h3>Gender</h3>
				<input type="radio" name="gender" value="male" checked> Male
				<input type="radio" name="gender" value="female"> Female
				<input type="radio" name="gender" value="other"> Other  
			</li>
			<li>
				<input type="submit" name="signup" Value="Signup for Friendbook">
			</li>
		</ul>
		<?php 
			if (isset($error2))
				echo '<li class="error-li">
						  <div class="span-fp-error">'.$error2.'</div>
					  </li>';
		?>
	</div>
</form>