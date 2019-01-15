<?php

	// if(isset($_FILES['uploaded_file'])) {
	//     // Make sure the file was sent without errors
	//     if($_FILES['uploaded_file']['error'] == 0) {

	//         include "connect.php";
	//         $name = $conn->real_escape_string($_FILES['uploaded_file']['name']);
	//         $mime = $conn->real_escape_string($_FILES['uploaded_file']['type']);
	//         $data = $conn->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
	//         $size = intval($_FILES['uploaded_file']['size']);
	// 	    $sql = "INSERT INTO `user_project` (`name`, `mime`, `size`, `data`, `created`)
	//             	VALUES ('{$name}', '{$mime}', {$size}, '{$data}', NOW())";

	//         $result = $conn->query($sql);

	//         if($result) echo 'Success! Your file was successfully added!';
	//         else echo 'Error! Failed to insert the file'."<pre>{$conn->error}</pre>";
	//     }
	//     else {
	//         echo 'An error accured while the file was being uploaded. '.'Error code: '.intval($_FILES['uploaded_file']['error']);
	//     }

	//     $conn->close();
	// }else{
	//     echo 'Error! A file was not sent!';
	// }

	session_start();
	$currentDir = getcwd();
    $uploadDirectory = "/uploads/".$_SESSION['user']."/";

    $errors = []; // Store all foreseen and unforseen errors here

    //$fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions
		print_r($_FILES['fileselect']);
    $fileName = $_FILES['fileselect']['name'];
    $fileSize = intval($_FILES['fileselect']['size']);
    $fileTmpName  = $_FILES['fileselect']['tmp_name'];
    $fileType = $_FILES['fileselect']['type'];
    //$fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDir . $uploadDirectory . basename($fileName);

    if (isset($_FILES['fileselect'])) {

        // if (! in_array($fileExtension,$fileExtensions)) {
        //     $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        // }

        // if ($fileSize > 2000000) {
        //     $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        // }

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
