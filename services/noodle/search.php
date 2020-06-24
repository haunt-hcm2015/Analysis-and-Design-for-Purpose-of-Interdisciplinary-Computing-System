<?php
include("config.php");
include("classes/SiteResultsProvider.php");
include("classes/ImageResultsProvider.php");
include("../../core/init.php");

if(isset($_GET["term"])) {
	$term = $_GET["term"];
}
else {
	exit("You must enter a search term");
}

$type = isset($_GET["type"]) ? $_GET["type"] : "sites";
$page = isset($_GET["page"]) ? $_GET["page"] : 1;


	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Noodle</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo SERVICES_NOODLE.'assets/css/style.css'; ?>">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
<body>
	<div class="wrapper">
		<div class="header">
			<div class="headerContent">
				<div class="logoContainer">
					<a href="<?php echo SERVICES_NOODLE;?>">
						<img src="<?php echo SERVICES_NOODLE.'assets/images/logo.png'; ?>">
					</a>
				</div>
	
				<div class="searchContainer">
					<form action="search" method="GET">
						<div class="searchBarContainer">
							<input type="hidden" name="type" value="<?php echo $type; ?>">
							<input class="searchBox" type="text" name="term" value="<?php echo $term; ?>" autocomplete="off">
							<button class="searchButton">
								<img src="<?php echo SERVICES_NOODLE.'assets/images/icons/search.png'; ?>">
							</button>
						</div>
					</form>
				</div>
				
				<div id="topMenu">
					<div class="account">
						<ul>
							<?php 
								if ($user->loggedIn()){
								$userID = $_SESSION['user_id'];
								$userInfo = $user->getUserInfo($userID);
								echo '<li>
										<a class="nav-link" href="'.BASE_URL.'console-application">
											<img src="'.BASE_URL.$userInfo->profile_image.'" alt="User"/>
										</a>
									</li>';
								}
							?>
							<li>
								<a href="<?php echo BASE_URL.'login';?>">Login</a>
							</li>
							<li>
								<a href="<?php echo BASE_URL.'sign-up';?>">Sign up</a>
							</li>
						</ul>
					</div>
					<div class="products">
						<ul class="topMenuProduct">
							<li>
								<a href="<?php echo BASE_URL.'services/videotube';?>">Video Network</a>
							</li>
							<li>
								<a href="<?php echo BASE_URL.'services/friendbook';?>">Social Network</a>
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
		
			</div>
			<div class="tabsContainer">

				<ul class="tabList">

					<li class="<?php echo $type == 'sites' ? 'active' : '' ?>">
						<a href='<?php echo "search?term=$term&type=sites"; ?>'>
							Sites
						</a>
					</li>

					<li class="<?php echo $type == 'images' ? 'active' : '' ?>">
						<a href='<?php echo "search?term=$term&type=images"; ?>'>
							Images
						</a>
					</li>
					<li class="<?php echo $type == 'video' ? 'active' : '' ?>">
						<a href='<?php echo "search?term=$term&type=videos"; ?>'>
							Videos
						</a>
					</li>
					<li class="<?php echo $type == 'news' ? 'active' : '' ?>">
						<a href='<?php echo "search?term=$term&type=news"; ?>'>
							News
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="mainResultsSection">

			<?php
				if($type == "sites") {
					$resultsProvider = new SiteResultsProvider($con);
					$pageSize = 20;
				}
				else if ($type == "images") {
					$resultsProvider = new ImageResultsProvider($con);
					$pageSize = 30;
				}
				else if ($type == "video"){
					$resultsProvider = new VideoResultsProvider($con);
					$pageSize = 30;
				}
				else{
					$resultsProvider = new ImageResultsProvider($con);
					$pageSize = 30;
				}

				$numResults = $resultsProvider->getNumResults($term);

				echo "<p class='resultsCount'>$numResults results found</p>";



				echo $resultsProvider->getResultsHtml($page, $pageSize, $term);
			?>


		</div>



		<div class="paginationContainer">

			<div class="pageButtons">



				<div class="pageNumberContainer">
					<img src="<?php echo SERVICES_NOODLE.'assets/images/pageStart.png'; ?>">
				</div>

				<?php

				$pagesToShow = 10;
				$numPages = ceil($numResults / $pageSize);
				$pagesLeft = min($pagesToShow, $numPages);

				$currentPage = $page - floor($pagesToShow / 2);

				if($currentPage < 1) {
					$currentPage = 1;
				}

				if($currentPage + $pagesLeft > $numPages + 1) {
					$currentPage = $numPages + 1 - $pagesLeft;
				}

				while($pagesLeft != 0 && $currentPage <= $numPages) {

					if($currentPage == $page) {
						echo "<div class='pageNumberContainer'>
								<img src='".SERVICES_NOODLE."assets/images/pageSelected.png'>
								<span class='pageNumber'>$currentPage</span>
							</div>";
					}
					else {
						echo "<div class='pageNumberContainer'>
								<a href='search?term=$term&type=$type&page=$currentPage'>
									<img src='".SERVICES_NOODLE."assets/images/page.png'>
									<span class='pageNumber'>$currentPage</span>
								</a>
						</div>";
					}


					$currentPage++;
					$pagesLeft--;

				}





				?>

				<div class="pageNumberContainer">
					<img src="<?php echo SERVICES_NOODLE.'assets/images/pageEnd.png'; ?>">
				</div>



			</div>




		</div>







	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
	<script type="text/javascript" src="<?php echo SERVICES_NOODLE.'assets/js/script.js'; ?>"></script>
</body>
</html>