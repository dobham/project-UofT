<?php 
	session_start();
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	<input type="name" name="name" value="" placeholder="<?php echo $_SESSION['name']==''?'How did you make this account?':$_SESSION['name'];?>" ><br>
	<input type="name" name="email" value="" placeholder="<?php echo $_SESSION['email']==''?'How did you make this account?':$_SESSION['email'];?>"><br>
	<input type="name" name="github" value="" placeholder="<?php echo $_SESSION['github']==''?'Add your github':$_SESSION['github'];?>"><br>
	<input type="name" name="bio" value="" placeholder="<?php echo $_SESSION['bio']==''?'Add your bio':$_SESSION['bio'];?>"><br>
	<input type="submit" name="updateProfile" value="Update your profile">
</form>

<?php
	if(isset($_POST['updateProfile'])){
		$name = $_POST['name']!=''? $_POST['name']:$_SESSION['name'];
		$github = $_POST['github']!=''? $_POST['github']:$_SESSION['github'];
		$email = $_POST['email']!=''? $_POST['email']:$_SESSION['email'];
		$bio = $_POST['bio']!=''? $_POST['bio']:$_SESSION['bio'];
		$user = $_SESSION['user'];
		include "connect.php";
		$sql = "UPDATE `userinfo` SET `name`='$name', `github`='$github', `email`='$email', `bio`='$bio' WHERE `username`='$user'";
		if ($conn->multi_query($sql) === TRUE) {
	    	echo "New records created successfully";
		}else{
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
		//mkdir('uploads/'.$user);

		echo "Updated ".$_SESSION['user']."s profile";
		header('location: viewProfile.php')
;	}
?>