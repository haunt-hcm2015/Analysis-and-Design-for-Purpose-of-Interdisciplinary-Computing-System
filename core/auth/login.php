<?php 
    $directorySeparator = DIRECTORY_SEPARATOR;
	$baseDir = realpath(dirname(__FILE__).$directorySeparator.'..') . $directorySeparator;
	require_once("{$baseDir}{$directorySeparator}init.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login User</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL.'assets/css/bootstrap.min.css';?>">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL.'assets/css/font-awesome.min.css';?>">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL.'assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css';?>">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL.'assets/css/util.css';?>">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL.'assets/css/login.css';?>">
	</head>
	<body>
		<div class="limiter">
			<div class="container-login100" style="background-image: url('<?php echo BASE_URL.'assets/images/login-bg.jpg';?>');">
				<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
					<form class="login100-form validate-form" method="POST">
						<span class="login100-form-title p-b-49">
							Login
						</span>

						<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
							<span class="label-input100">Username</span>
							<input class="input100" type="text" name="username" placeholder="Type your username">
							<span class="focus-input100" data-symbol="&#xf206;"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Password is required">
							<span class="label-input100">Password</span>
							<input class="input100" type="password" name="pass" placeholder="Type your password">
							<span class="focus-input100" data-symbol="&#xf190;"></span>
						</div>
						
						<div class="text-right p-t-8 p-b-31">
							<a href="#">
								Forgot password?
							</a>
						</div>
						
						<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button class="login100-form-btn">
									Login
								</button>
							</div>
						</div>

						<div class="txt1 text-center p-t-54 p-b-20">
							<span>
								Or Sign Up Using
							</span>
						</div>

						<div class="flex-c-m">
							<a href="#" class="login100-social-item bg1">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="login100-social-item bg2">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="login100-social-item bg3">
								<i class="fa fa-google"></i>
							</a>
						</div>

						<div class="flex-col-c p-t-155">
							<span class="txt1 p-b-17">
								Or Sign Up Using
							</span>

							<a href="<?php echo BASE_URL.'sign-up'; ?>" class="txt2">
								Sign Up
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>