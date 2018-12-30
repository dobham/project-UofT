<!DOCTYPE html>
<html>
<head>
	<title>test homepage</title>
</head>
<body>
	<?php
		session_start();
		if(empty($_SESSION['user'])){
			header('location: logout.php');
		}
	?>
	Homepage basics(uplaoding files)
	<form method="post" action="logout.php">
		<input type="submit" name="logout" value="logout">
	</form>
	
	<form action="upload.php" method="post" enctype="multipart/form-data">
	    
	    <input type="file" name="uploaded_file" id="fileToUpload">
	    <input type="submit" value="Upload File" name="submit">
	</form>
	

</body>
</html>