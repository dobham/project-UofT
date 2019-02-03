<!DOCTYPE html>
<html>
<head>
	<title>test homepage</title>
</head>
<body>
	<?php
		session_start();
		if(isset($_COOKIE['fname'])){
		$_SESSION['user'] =$_COOKIE['fname'];
		$_SESSION['email'] =$_COOKIE['email'];
		$user = $_SESSION['user'];
		$email = $_SESSION['email'];

		include "connect.php";
		  $sql= "SELECT username FROM userinfo WHERE username='$user'";
			if ($conn->query($sql)) {
				$row = $conn->query($sql);
				$row = $conn->query($sql)->fetch_assoc();
				if($row['username']==""){
						$sql = "INSERT INTO userinfo (name, username, email) VALUES ('$user','$user','$email')";
						if ($conn->query($sql) === TRUE) {
			    	echo "New records created successfully";
			}

	}
	}
}

		if(empty($_SESSION['user'])){
			header('location: logout.php');
		}
		if(file_exists("uploads/".$_SESSION['user']."/") == 0){
			//echo "asdassda";
			mkdir("uploads/".$_SESSION['user']."/");
		}
	?>
	Homepage basics(uploding files)
	<form method="post" action="logout.php">
		<input type="submit" name="logout" value="logout">
		<input type="submit" name="createProject" value="Create A Project" formaction="createProject.php">
		<input type="submit" name="claimProject" value="Claim a Project" formaction="workPage.php">
	</form>
</body>
</html>
