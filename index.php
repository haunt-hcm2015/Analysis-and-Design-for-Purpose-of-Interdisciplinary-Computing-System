<?php 
    $ds = DIRECTORY_SEPARATOR;
    $baseDir = realpath(dirname(__FILE__)).$ds;
    require_once("{$baseDir}core{$ds}init.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <title>AI Solution - Interdisciplinary Research</title>
        <link rel="stylesheet" href="<?php echo BASE_URL.'assets/css/bootstrap.min.css'; ?>" type="text/css" crossorigin="anonymous"/>
        <link rel="stylesheet" href="<?php echo BASE_URL.'assets/css/style.css'; ?>" type="text/css" crossorigin="anonymous"/>
    </head>
    <body>
    <div class="container-fluid">
        <?php include_once("{$baseDir}core{$ds}classes{$ds}header.php");?>
        <div class="slide img-fluid">
            <figure id="multiSlide" class="multiSlide"></figure>
            <nav id="multiSlideNav" class="multiSlideNav">
                <a href="#" id="top" class="navButton"><</a>
                <a href="#" id="bottom" class="navButton">></a>
                <a href="#" id="left" class="navButton"><</a>
                <a href="#" id="right" class="navButton">></a>
            </nav>
        </div>  
        <?php include_once("{$baseDir}core{$ds}classes{$ds}footer.php");?>
    </div>
    </body>
    <script src="<?php echo BASE_URL.'assets/js/jquery-3.2.1.slim.min.js'; ?>" crossorigin="anonymous"></script>
    <script src="<?php echo BASE_URL.'assets/js/animate.js'; ?>" crossorigin="anonymous"></script>
    <script src="<?php echo BASE_URL.'assets/js/popper.min.js'; ?>" crossorigin="anonymous"></script>
    <script src="<?php echo BASE_URL.'assets/js/bootstrap.min.js'; ?>" crossorigin="anonymous"></script>
</html> 