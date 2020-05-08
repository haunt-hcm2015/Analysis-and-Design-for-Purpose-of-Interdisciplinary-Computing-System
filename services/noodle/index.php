<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Doodle</title>

	<meta name="description" content="Search the web for sites and images.">
	<meta name="keywords" content="Search engine, doodle, websites">
	<meta name="author" content="Reece Kenney">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>
	
	<div class="wrapper indexPage">
		<div id="topMenu">
			<div class="account">
				<ul>
					<li>
						<a href="#">Login</a>
					</li>
					<li>
						<a href="#">Sign up</a>
					</li>
				</ul>
			</div>
			<div class="products">
				<ul class="topMenuProduct">
					<li>
						<a href="#">Social Network</a>
					</li>
					<li>
						<a href="#">AI Solution</a>
					</li>
					<li>
						<a href="#">More Product</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="mainSection">
			<div class="logoContainer">
				<img src="assets/images/logo.png" title="Logo of our site" alt="Site logo">
			</div>


			<div class="searchContainer">

				<form action="search.php" method="GET">

					<input class="searchBox" type="text" name="term" autocomplete="off">
					<input class="searchButton" type="submit" value="Search">


				</form>

			</div>


		</div>


	</div>

</body>
</html>