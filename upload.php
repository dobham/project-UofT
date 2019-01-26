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
	