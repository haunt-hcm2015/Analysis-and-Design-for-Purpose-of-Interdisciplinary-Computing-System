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
    <meta name="keywords" content="Translate Services">
    <title>Translate Services</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="<?php echo BASE_URL.'assets/css/image-project.css';?>" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">AI Solution Translate</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="name">Select Language</div>
                            <div class="value">
                                <select name="language_source">
                                    <option value="english">English</option>
                                    <option value="chinese">Chinese</option>
                                    <option value="japanese">Japanese</option>
                                    <option value="vietnamese">Vietnamese</option>
                                    <option value="afar">Afar</option>
                                    <option value="afrikaans">Afrikaans</option>
                                    <option value="akan">Akan</option>
                                    <option value="albanian">Albanian</option>
                                    <option value="amharic">Amharic</option>
                                    <option value="anii">Anii</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Language</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="message" placeholder="Language Source"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Select Language Destination</div>
                            <div class="value">
                                <select name="language_destination">
                                    <option value="english">English</option>
                                    <option value="chinese">Chinese</option>
                                    <option value="japanese">Japanese</option>
                                    <option value="vietnamese">Vietnamese</option>
                                    <option value="afar">Afar</option>
                                    <option value="afrikaans">Afrikaans</option>
                                    <option value="akan">Akan</option>
                                    <option value="albanian">Albanian</option>
                                    <option value="amharic">Amharic</option>
                                    <option value="anii">Anii</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Language Destination</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="message" placeholder="Language Destination"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Upload Interpreter File</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="file_cv" id="file">
                                    <label class="label--file" for="file">Choose file</label>
                                    <span class="input-file__info">No file chosen</span>
                                </div>
                                <div class="label--desc">Upload your Interpreter File . Max file size 10 MB</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit">Translate</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

