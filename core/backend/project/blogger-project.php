<?php 
    $directorySeparator = DIRECTORY_SEPARATOR;
	$baseDir = realpath(dirname(__FILE__).$directorySeparator.'..'.$directorySeparator.'..') . $directorySeparator;
    require_once("{$baseDir}{$directorySeparator}init.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="AI Solution">
    <meta name="keywords" content="Blogger System">
    <title>Create a new blog</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="<?php echo BASE_URL.'assets/css/image-project.css';?>" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-green p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Create a new blog</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="name">Title</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="title">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Random Domain</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="random_domain" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Theme</div>
                            <div class="row">
                                <div class="column">
                                    <img src="https://lh3.googleusercontent.com/7UR1JJ64J_7BC8S7IMPi7Yv9dmgt7ghF3M4zTu5vCtgLrTVHv0QMSA494mKX=s120-fcrop64=1,00000000ffffaaaa"  >
                                </div>
                                <div class="column">
                                    <img src="https://lh3.googleusercontent.com/sW4rPOmAKdOGCbFvC8LXDUVli2hF7W3CIuSOb_am_AOZFdUnrolzxd-w7-Wn=s120-fcrop64=1,00000000ffffaaaa" >
                                </div>
                                <div class="column">
                                    <img src="https://lh3.googleusercontent.com/ycK07golHsVzeHkeyzvjlfehhhLTDKLeXojzl89vhzzZ0gAV4jkMr8AeMxLU8g=s120-fcrop64=1,00000000ffffaaaa"  >
                                </div>
                                <div class="column">
                                    <img src="https://lh3.googleusercontent.com/Sa0njjHUUydT6P8vURFvyPR2M1b2vcXLg5nCEdBl1Lujrc9cdns2IWb5WpKkvSc=s120-fcrop64=1,00000000ffffaaaa"  >
                                </div>
                                <div class="column">
                                    <img src="https://lh3.googleusercontent.com/T4z8hqVYdjrITrotFIuwySoCPYYtlwK3GPjHrReEZGx_6G2LCqZNxHOPuj3Yr1U=s120-fcrop64=1,00000000ffffaaaa"  >
                                </div>
                                <div class="column">
                                    <img src="https://lh3.googleusercontent.com/nhX8mEreh0_BcfHR41wq6Vjcy3KhmvgxOPaQSBr-5_6kWULSR76S-RCuzJY9uQ=s120-fcrop64=1,00000000ffffaaaa" >
                                </div>
                                <div class="column">
                                    <img src="https://lh3.googleusercontent.com/JjNvT2tYlhP2NYzqaGyS0eVjOiN5Qn4rLDjyj1VX7dbkUq1KYbtL-KrRQ_lLL6o=s120-fcrop64=1,00000000ffffaaaa"  >
                                </div>
                                <div class="column">
                                    <img src="https://lh3.googleusercontent.com/U5d8q1TiVIh9nyL2WbV1V_ZvosLLIFYx0ZzIoLbvsr_O9xf61rnHfhdR9uCipg=s120-fcrop64=1,00000000ffffaaaa"  >
                                </div>
                                <div class="column">
                                    <img src="https://lh3.googleusercontent.com/gEySJZZwW3JPKAGqg6oqYdN36OLzw5vWbifUcArZ1MQlTqi0IBxn_zvxO-nV3w=s120-fcrop64=1,00000000ffffaaaa"  >
                                </div>
                                <div class="column">
                                    <img src="https://lh3.googleusercontent.com/Z1cnFJfQFxvbaNXjbzA-t67QQlHaATnm11y-vq8PK97Ee8ASFHmNYeYy6FqZyW0=s120-fcrop64=1,00000000ffffaaaa" >
                                </div>
                                <div class="column">
                                    <img src="https://lh3.googleusercontent.com/abS-uVgtnrWuKeM2PwhbDxJMHDUKiWdK-6PkwzAeNbavJBXe1tQlRff67qUr=s120-fcrop64=1,00000000ffffaaaa"  >
                                </div>
                                <div class="column">
                                    <img src="https://lh3.googleusercontent.com/v7U7zdD90YVrM6OzjYuMsFsYaklyNX4kOdBbRhL_VEo860ec8lRqg63lE6NE=s120-fcrop64=1,00000000ffffaaaa"  >
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit">Create a new Blog</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

