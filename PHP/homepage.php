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
		if(file_exists("uploads/".$_SESSION['user']."/") == 0){
			//echo "asdassda";
			mkdir("uploads/".$_SESSION['user']."/");
		}
	?>
	Homepage basics(uplaoding files)
	<form method="post" action="logout.php">
		<input type="submit" name="logout" value="logout">
		<input type="submit" name="createProject" value="Create A Project" formaction="createProject.php">
	</form>

	

</body>
</html>
