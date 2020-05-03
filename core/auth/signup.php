<?php 
	    $directorySeparator = DIRECTORY_SEPARATOR;
		$baseDir = realpath(dirname(__FILE__).$directorySeparator.'..') . $directorySeparator;
		require_once("{$baseDir}{$directorySeparator}init.php");

		if (isset($_POST['signup']) && isset($_POST['checkbox'])){
			$error= '';
			$firstName = $user->checkInput($_POST['firstname']);
			$lastName = $user->checkInput($_POST['lastname']);
			$userName = $user->checkInput($_POST['username']);
			$password = $user->checkInput($_POST['password']);
			$position = $_POST['position'];
			$company = $user->checkInput($_POST['company']);
			$gender = $_POST['gender']; 
			$profileLink = '';
			if (isset($_FILE['profileuser'])){
				$profileLink = $user->uploadImage($_FILE['profileuser']);
			}
			else{
				$profileLink = 'assets/metadata/user_image/defaultprofileimage.png';
			}
			$business = $user->checkInput($_POST['business']);
			$address = $user->checkInput($_POST['address']);
			$zip = $user->checkInput($_POST['zip']);
			$country = $_POST['country'];
			$code = $user->checkInput($_POST['code']);
			$phone = $user->checkInput($_POST['phone']);
			$email = $user->checkInput($_POST['email']);
			
			if (strlen($password) < 5)
				$error = "Password is to short";
			else if (!filter_var($email))
				$error = "Invalid email format";
			else {
				if ($user->checkEmail($email) === true){
					$error = "Email is already in use";
				}else{
					$user_id = $user->create('user_info', array(  
									'firstname' => $firstName, 'lastname' => $lastName, 
									'username' => $userName, 'gender' => strval($gender),
									'password' => md5($password),
									'email' => $email));
					$_SESSION['user_id'] = $user_id;
				}
			}
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Sign Up</title>
		<link rel="stylesheet" href="<?php echo BASE_URL.'assets/css/montserrat-font.css';?>" type="text/css" crossorigin="anonymous"/>
		<link rel="stylesheet" href="<?php echo BASE_URL.'assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css';?>" type="text/css" crossorigin="anonymous"/>
		<link rel="stylesheet" href="<?php echo BASE_URL.'assets/css/style.css';?>" type="text/css" crossorigin="anonymous"/>
	</head>
	<body class="form-v10">
		<div class="page-content">
			<div class="form-v10-content">
				<form class="form-detail" method="POST">
					<div class="form-left">
						<h2>General Infomation</h2>
						<div class="form-group">
							<div class="form-row form-row-1">
								<input type="text" name="firstname" placeholder="First Name" required>
							</div>
							<div class="form-row form-row-2">
								<input type="text" name="lastname" placeholder="Last Name" required>
							</div>
						</div>
						<div class="form-row">
							<input type="text" name="username" placeholder="Username" required>
						</div>
						<div class="form-row">
							<input type="password" name="password" placeholder="Password" required>
						</div>
						<div class="form-row">
							<select name="gender">
								<option value="0">Male</option>
								<option value="1">Female</option>
							</select>
							<span class="select-btn">
								<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</div>
						<div class="form-row">
							<select name="position">
								<option value="student">Student</option>
								<option value="director">Director</option>
								<option value="manager">Manager</option>
								<option value="employee">Employee</option>
								<option value="other">Other</option>
							</select>
							<span class="select-btn">
								<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</div>
						<div class="form-row">
							<input type="text" name="company" placeholder="Company" >
						</div>
						<div class="form-row">
							<input type="file" name="profileuser" accept="images/*"/>
						</div>
						<div class="form-group">
							<div class="form-row form-row-3">
								<input type="text" name="business" placeholder="Business Arena" >
							</div>
						</div>
					</div>
					<div class="form-right">
						<h2>Contact Details</h2>
						<div class="form-row">
							<input type="text" name="address" placeholder="Address">
						</div>
						<div class="form-group">
							<div class="form-row form-row-1">
								<input type="text" name="zip" placeholder="Zip Code">
							</div>
						</div>
						<div class="form-row">
							<select name="country">
								<option value="Vietnam">Vietnam</option>
								<option value="china">China</option>
								<option value="Malaysia">Malaysia</option>
								<option value="India">India</option>
							</select>
							<span class="select-btn">
								<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</div>
						<div class="form-group">
							<div class="form-row form-row-1">
								<input type="text" name="code" placeholder="Code +">
							</div>
							<div class="form-row form-row-2">
								<input type="text" name="phone" placeholder="Phone Number">
							</div>
						</div>
						<div class="form-row">
							<input type="text" name="email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email">
						</div>
						<div class="form-checkbox">
							<label class="container"><p>I do accept the <a href="#" class="text">Terms and Conditions</a> of your site.</p>
								<input type="checkbox" name="checkbox">
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="form-row-last">
							<input type="submit" name="signup" class="register" value="Signup">
						</div>
						<?php 
							if (isset($error))
								echo '<li class="error-li">
										<div class="span-fp-error">'.$error.'</div>
									</li>';
						?>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
