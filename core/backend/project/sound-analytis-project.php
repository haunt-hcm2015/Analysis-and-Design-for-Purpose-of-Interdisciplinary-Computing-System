<?php 
    $directorySeparator = DIRECTORY_SEPARATOR;
	$baseDir = realpath(dirname(__FILE__).$directorySeparator.'..'.$directorySeparator.'..') . $directorySeparator;
    require_once("{$baseDir}{$directorySeparator}init.php");
    if (isset($_POST['send_request']))
        if (isset($_POST['project_name']) && isset($_POST['analysis_mode']) && isset($_POST['analytis_result']))
        {
            $projectName = $_POST['project_name'];
            $analysisName = $_POST['analysis_mode'];
            $analysisResult = $_POST['analytis_result'];
            echo $analysisResult;
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="AI Solution">
    <meta name="keywords" content="Sound Analytis">
    <title>Sound Analytis</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="<?php echo BASE_URL.'assets/css/image-project.css';?>" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-green p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Sound Analysis</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="name">Project Name</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="project_name">
                            </div>
                        </div>
                       
                        <div class="form-row">
                            <div class="name">Analysis Mode</div>
                            <div class="value">
                                <select name="analysis_mode">
                                    <option value="sound_recognition">Sound Recognition</option>
                                    <option value="text_in_sound">Text in Sound</option>
                                    <option value="foreign_language">Foreign Language Translate</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Upload  Sound</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="file_cv" id="file">
                                    <label class="label--file" for="file">Choose file</label>
                                    <span class="input-file__info">No file chosen</span>
                                </div>
                                <div class="label--desc">Upload your Sound. Max file size 10 MB</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Analytis Result</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="analytis_result" placeholder="Analytis Result"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn--radius-2 btn--blue-2" name="send_request" type="submit">Send Request</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
</html>

