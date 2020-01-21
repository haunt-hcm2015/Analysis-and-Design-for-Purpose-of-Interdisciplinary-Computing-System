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
        <?php include_once("{$baseDir}core{$ds}classes{$ds}header.php");?>

        <?php include_once("{$baseDir}core{$ds}classes{$ds}footer.php");?>
    </body>
    <script src="<?php echo BASE_URL.'assets/js/jquery-3.2.1.slim.min.js'; ?>" crossorigin="anonymous"></script>
    <script src="<?php echo BASE_URL.'assets/js/popper.min.js'; ?>" crossorigin="anonymous"></script>
    <script src="<?php echo BASE_URL.'assets/js/bootstrap.min.js'; ?>" crossorigin="anonymous"></script>
</html> 