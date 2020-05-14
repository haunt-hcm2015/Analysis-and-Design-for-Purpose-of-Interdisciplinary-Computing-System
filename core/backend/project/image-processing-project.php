<?php 
    $directorySeparator = DIRECTORY_SEPARATOR;
	$baseDir = realpath(dirname(__FILE__).$directorySeparator.'..'.$directorySeparator.'..') . $directorySeparator;
    require_once("{$baseDir}{$directorySeparator}init.php");
    require_once("../library/FaceDetector.php");
    use svay\FaceDetector;

    if (isset($_POST['send_request']))
        if (isset($_POST['project_name']) && isset($_POST['analysis_mode']) && isset($_POST['analytis_result'])){
            $projectName = $_POST['project_name'];
            $analysisMode = $_POST['analysis_mode'];
            $analytisResult = $_POST['analytis_result'];
            switch($analysisMode){
                case 'face_detection':
                    $faceDetect = new FaceDetector();
                    $faceDetect->faceDetect($_FILES['image']['tmp_name']);
                    $faceDetect->toJpeg();
                 
                    break;
                case 'object_and_scene_detection':
                    break;
                case 'facial_analytis';
                    break;
                case 'text_in_image':
                    break;
                case 'face_comparison':
                    break;
            }
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="AI Solution">
    <meta name="keywords" content="Image Processing">
    <title>Image Processing</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="<?php echo BASE_URL.'assets/css/image-project.css';?>" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Image Processing</h2>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
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
                                    <option value="face_detection">Face Detection</option>
                                    <option value="object_and_scene_detection">Object and Scene Detection</option>
                                    <option value="facial_analytis">Facial Analytis</option>
                                    <option value="text_in_image">Text in Image</option>
                                    <option value="face_comparison">Face Comparison</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Upload Multi Image</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="image" accept="image/*" id="file">
                                    <label class="label--file" for="file">Choose file</label>
                                    <span class="input-file__info">No file chosen</span>
                                </div>
                                <div class="label--desc">Upload your Multi Image. Max file size 50 MB</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Analytis Gallery Result</div>
                            <div class="value">
                                
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

