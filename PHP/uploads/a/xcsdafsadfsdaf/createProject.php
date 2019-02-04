<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
	<input type="name" name="projectName" value="" placeholder="Your project name"><br>
	<!-- <input type="name" name="client" value="" placeholder="client name"><br> -->
	<textarea name="comment" placeholder="Describe your project..." cols=30 rows=5></textarea><br>
    <input type="file" name="uploaded_file[]" id="fileToUpload" multiple>
    <input type="submit" value="Submit" name="Submit">
</form>

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
<form action="homepage.php">
	<input type='submit' name='Homepage' value='Homepage'>
</form>
