<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
	<input type="name" name="projectName" value="" placeholder="Your project name"><br>
	<input type="name" name="client" value="" placeholder="client name"><br>
	<textarea name="comment" placeholder="Describe your project..." cols=30 rows=5></textarea><br>
    <input type="file" name="uploaded_file" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
</form>

<?php
	if(isset($_POST['submit'])){
		session_start();
		include "connect.php";

		$projectName = $_POST['projectName'];
		$comment = $_POST['comment'];
		$client = $_POST['client'];
		$user = $_SESSION['user'];

		$sql = "INSERT INTO user_project_info(host, client, project_name, comments) VALUES('$user', '$client', '$projectName', '$comment')";
		if ($conn->multi_query($sql) === TRUE) {
	    	echo "New records created successfully";
		}else{
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
		//header('location: upload.php');
	}

	$currentDir = getcwd();
    $uploadDirectory = "/uploads/".$_SESSION['user']."/";

    $errors = []; // Store all foreseen and unforseen errors here

    //$fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

    $fileName = $_FILES['uploaded_file']['name'];
    $fileSize = intval($_FILES['uploaded_file']['size']);
    $fileTmpName  = $_FILES['uploaded_file']['tmp_name'];
    $fileType = $_FILES['uploaded_file']['type'];
    //$fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 

    if (isset($_FILES['uploaded_file'])) {

        // if (! in_array($fileExtension,$fileExtensions)) {
        //     $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        // }

        if ($fileSize > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
            	echo "The file " . basename($fileName) . " has been uploaded";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
        }
    }
?>
<form action="homepage.php">
	<input type='submit' name='Homepage' value='Homepage'>
</form>