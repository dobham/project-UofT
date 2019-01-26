
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	<input type="name" name="name" placeholder="Enter name"><br>
	<input type="name" name="user" placeholder="Enter username"><br>
	<input type="email" name="email" placeholder="Enter Email"><br>
	<input type="password" name="pass" placeholder="Enter password" id="pass" onkeyup='check();'><br>
	<input type="password" name="c_pass" placeholder="Confirm password" id="c_pass" onkeyup='check();'><span id='message' ></span><br>
	<input type="submit" name="create" value="Sign-Up">
</form>
<script type="text/javascript">
	var check = function() {
	if(document.getElementById('pass').value ==
		document.getElementById('c_pass').value) {
		document.getElementById('message').style.color = 'green';
		document.getElementById('message').innerHTML = 'matching';
	}else{
		document.getElementById('message').style.color = 'red';
		document.getElementById('message').innerHTML = 'not matching';
	}
}
</script>
<?php
	include "connect.php";
	if(isset($_POST['create'])){
		
		$name = $_POST['name'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$email = $_POST['email'];
		$c_pass = $_POST['c_pass'];
		if($pass!=$c_pass){
			header('location: signup.php');
		}
		$sql = "INSERT INTO login (username, password) VALUES ('$user','$pass');";
		$sql .= "INSERT INTO userinfo (name, username, email) VALUES ('$name','$user','$email')";

		if ($conn->multi_query($sql) === TRUE) {
	    	echo "New records created successfully";
		}else{
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
		mkdir('uploads/'.$user);
		header('location: homepage.php');
	}
?>