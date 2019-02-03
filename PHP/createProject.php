<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>post Create</title>

    <script src="../JS/squareAnimation.js"></script>
    <script src="../JS/script.js"></script>
    <script src="../JS/sketch.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../CSS/stylesheet.css">

    <link rel="stylesheet" href="../CSS/quill.snow.css"/>
    <link rel="stylesheet" href="../CSS/quill.core.css"/>
    <link rel="stylesheet" href="../CSS/quill.bubble.css"/>
</head>
<body>
<div class="topnav" id="myTopnav">
    <a class="option active" href="index.php">
        Project University
    </a>
    <a class="option" href="login.php">
        Login
    </a>
    <a class="option" href="signup.php">
        Signup
    </a>
    <a href="javascript:void(0);" class="icon" onclick="expand()">
        <i class="fa fa-bars"></i>
    </a>
</div>
<div class="side" id="sideResponsive">
    <a class="optionResponsive">
        Login
    </a>
    <a class="optionResponsive">
        Signup
    </a>
</div>
<div id="layerCreate">
    <div id="titleBoxProfile">
        <div class="signTitle">Request A Project</div>
    </div>
    <form id="postCreateForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
        <input type="name" name="projectName" id="postTitle" class="indexInput" placeholder="Title">
	<div id="editorBox"><p> <!-- USERS TYPE INTO THIS --> </p></div>
	<div id="editorContact"><p> <!-- USERS TYPE INTO THIS --> </p></div>
		<input id="descInput" type="hidden" name="comment" value="">
		<input type="text" id="textBox" class="indexInput" name="tagger" placeholder="Tags"><br><br>
		<input type="file" name="uploaded_file[]" id="fileToUpload" class="custom-file-input" multiple>
		<div class="target" contenteditable="false"></div><br><br>
		<button type="submit" name="Submit" id="submitPost" class="smallButton" action="" onclick="document.getElementById('descInput').value = document.getElementById('editorBox').children[0].innerHTML;">Go</button>
    </form>
</div>
<!--
<form action="" method="post" enctype="multipart/form-data">
	<input type="name" name="projectName" value="" placeholder="Your project name"><br>
	<textarea name="comment" placeholder="Describe your project..." cols=30 rows=5></textarea><br>
    <input type="file" name="uploaded_file[]" id="fileToUpload" multiple>
    <input type="submit" value="Submit" name="Submit">
</form>
-->
<?php
	if(isset($_POST['Submit'])){
		session_start();
		include "connect.php";
		$projectName = $_POST['projectName'];
		$comment = $_POST['comment'];
		$files = $_FILES['uploaded_file'];
		$user = $_SESSION['user'];
		$sql = "INSERT INTO user_project_info(host, project_name, comments) VALUES('$user', '$projectName', '$comment')";
		if ($conn->multi_query($sql) === TRUE) {
			echo "";
		}else{
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
		$fileCount = count($files["name"]);
		for($i=0;$i< $fileCount;$i++){
	    $fileName = $_FILES['uploaded_file']['name'];
			echo "<br>";
			//print_r($fileName);
      $fileSize = intval($_FILES['uploaded_file']['size']);
      $fileTmpName  = $_FILES['uploaded_file']['tmp_name'];
      $fileType = $_FILES['uploaded_file']['type'];
      //$fileExtension = strtolower(end(explode('.',$fileName)));

            if(file_exists("uploads/".$user."/".$_POST['projectName']."/") == 0){

                mkdir("uploads/".$user."/".$_POST['projectName']."/");
            }

        $uploadDirectory = "uploads/".$user."/".$_POST['projectName']."/";

        $errors = [];
        $uploadPath = $uploadDirectory.$fileName[$i];
				// echo $uploadPath;
        if (isset($_FILES['uploaded_file'])) {
            if ($fileSize > 2000000) $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
            if (empty($errors)) {
                $didUpload = move_uploaded_file($fileTmpName[$i], $uploadPath);

                if ($didUpload) {
                	echo "The file has been uploaded";
                } else {
                    echo "An error occurred somewhere. Try again or contact the admin";
                }
            } else {
                foreach ($errors as $error) {
                    echo $error . "These are the errors" . "\n";
                }
            }

	}
}
}

?>
<canvas id="canvas" height="100%" width="100%" style="bottom: -0%;"></canvas>
<script type="text/javascript" src="../JS/sideParticles.js"></script>

<script type="text/javascript" src="../JS/jquery.min.js"></script>
<script type="text/javascript" src="../JS/quill.min.js"></script>
<script type="text/javascript" src="../JS/text_editor.js"></script>
<script type="text/javascript" src="../JS/tags.js"></script>
</body>
</html>
