<?php 
	$ds = DIRECTORY_SEPARATOR;
	$base_dir = realpath(dirname(__FILE__).$ds.'..') . $ds;
	require_once("{$base_dir}core{$ds}init.php");
	 
	if ($_SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
		header("Location: ".BASE_URL."index.php");
	}
	if (isset($_POST['login']) && !empty($_POST['login'])){
		$email    = $_POST['email'];
		$password = $_POST['password'];
		if (!empty($email) or !empty($password)){
			$email    = $getFromUser->checkInput($email);
			$password = $getFromUser->checkInput($password);
			$error1    = '';
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$error1 = "Invalid email format";
			}
			else{
				if ($getFromUser->login($email, $password) === false){
					$error1 = "The email or password is incorrect";
				}
			}
		}else{
			$error1 = "Please check your username or your password";
		}
		
	}

?>
<div class="login-div">
	<form method="post"> 
		<ul>
			<li>
				<input type="text" name="email" placeholder="Please enter your email here"/>
			</li>
			<li>
				<input type="password" name="password" placeholder="Password"/>
				<input type="submit" name="login" value="Log in"/>
			</li>
			<li><a href="#">Forgot Password</a></li>
			<li>
				<input type="checkbox" Value="Remember me">Remember me
			</li>
		</ul>
		<?php
			if (isset($error1))
			{
				echo '<li class="error-li">
						<div class="span-fp-error">'.$error1.'</div>
					</li> ';
			}
		?>
	</form>
</div>