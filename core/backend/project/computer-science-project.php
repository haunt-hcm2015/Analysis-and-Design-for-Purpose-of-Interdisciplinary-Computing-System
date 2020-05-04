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
    <meta name="keywords" content="Compiler Online">
    <title>Compiler Online</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="<?php echo BASE_URL.'assets/css/image-project.css';?>" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gray p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Compiler Online</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="name">Project name</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="project_name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Select Programming Language</div>
                            <div class="value">
                                <select name="programming_language">
                                    <option value="python">Python</option>
                                    <option value="c++">C++</option>
                                    <option value="c#">C#</option>
                                    <option value="q#">Q#</option>
                                    <option value="c">C</option>
                                    <option value="javascript">Javascript</option>
                                    <option value="java">Java</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Source Code</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="source_code" placeholder="Source Code"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Result</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="result" placeholder="Result"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Upload Source Code</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="file_cv" id="file">
                                    <label class="label--file" for="file">Choose file</label>
                                    <span class="input-file__info">No file chosen</span>
                                </div>
                                <div class="label--desc">Upload your source code . Max file size 2 MB</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit">Test</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

