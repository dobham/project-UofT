<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login/Sign-Up</title>
    <script src="../JS/squareAnimation.js"></script>
    <script src="../JS/script.js"></script>
    <script src="../JS/sketch.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/stylesheet.css">
<script type="text/javascript">
	var check = function() {
	if(document.getElementById('pass').value ==
		document.getElementById('c_pass').value) {
		document.getElementById('message').style.color = 'green';
		document.getElementById('message').innerHTML = 'Matching';
	}else{
		document.getElementById('message').style.color = 'red';
		document.getElementById('message').innerHTML = 'Not Matching';
	}
}
</script>
</head>
<body>
<div class="topnav" id="myTopnav">
    <a class="option active" href="./index.php">
        Project University
    </a>
	<?php
	session_start();
	include "connect.php";
	if(isset($_SESSION['user'])){
	?>
    <a class="option" href="logout.php">
        Logout
    </a>
	<?php
	}else{
	?>
    <a class="option" href="login.php">
        Login
    </a>
    <a class="option" href="signup.php">
        Signup
    </a>
	}
	<?php
	}
	?>
    <a href="javascript:void(0);" class="icon" onclick="expand()">
        <i class="fa fa-bars"></i>
    </a>
</div>
<div class="side" id="sideResponsive">
    <div class="centerDiv">
		<?php
		if(isset($_SESSION['user'])){
		?>
		<a class="optionResponsive" id="loginSide" onclick="window.location.href='logout.php'">
			Logout
		</a>
		<?php
		}else{
		?>
        <button class="optionResponsive" id="loginSide" onclick="window.location.href='login.php'">
            Login
        </button>
		<?php
		}
		?>
    </div>
    <div class="centerDiv">
        <button class="optionResponsive" id="signupSide" onclick="window.location.href='signup.php'">
            Signup
        </button>
    </div>
</div>
<div id="blur">
<div id="layerOne"></div>
<div id="layerSignup">
    <div class="topTitleContainer">
        <div class="topTitle">Project University</div>
    </div>
    <div class="signTitleBox">
        <div class="signTitle">Log In</div>
    </div>
        <div id="contentLogin">
            <form class="indexForm" id="login_form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				<input type="text" name="user" placeholder="Username" class="indexInput"><br>
				<input type="password" name="pass" placeholder="Password" class="indexInput"><br><br>
				<button type="submit" name="login" class="smallButton">Login</button><br><br>
                <a class="reoveryLink" href="#">Recover password</a><br>
            </form>
        </div>
    <div class="switchLayer">
        <div id="loginButton" class="titleUnderline" onclick="switchSignup()"><i class="fa fa-chevron-left"></i><i class="fa fa-chevron-left"></i>   Or Sign Up</div>
    </div>
</div>
<div class="outerLayer">
<div id="layerLogin">
    <div class="topTitleContainer">
        <div class="topTitle">Project University</div>
    </div>
    <div class="signTitleBox">
        <div class="signTitle">Sign Up</div>
    </div>
    <div id="contentSignup">
        <form class="indexForm" id="signup_form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<input type="text" name="name" placeholder="Name" class="indexInput"><br>
			<input type="text" name="user" placeholder="Username" class="indexInput"><br>
			<input type="email" name="email" placeholder="Email" class="indexInput"><br>
			<input type="password" name="pass" placeholder="Password" class="indexInput" id="pass" onkeyup='check();'><br>
			<input type="password" name="c_pass" placeholder="Confirm Password" class="indexInput" id="c_pass" onkeyup='check();'><span id='message' ></span><br><br>
			<button type="submit" name="create" class="smallButton">Sign Up</button>
        </form>
        <!--<button type="submit" name="create" class="indexFormSubmitButton" form="signup_form">Sign Up</button-->
    </div>
        <div class="switchLayer">
            <div id="signupButton" class="titleUnderline" onclick="switchLogin()">Or Log In   <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></div>
        </div>
</div>
</div>
</div>
<canvas id="canvas" height="100%" width="100%" style="bottom: -0%;"></canvas>




<?php

if(isset($_POST['login'])){
	//normal sign-in
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$sql= "SELECT password FROM login WHERE username='$user' and password='$pass'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		// output data of each row
		$_SESSION['user']=$user;
			?>
			<script type="text/javascript">window.location.href = 'index.php';</script>
			<?php
	}else{
		echo "Incorrect username or password";
	}
}

if(isset($_POST['create'])){
	$name = $_POST['name'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$email = $_POST['email'];
	$c_pass = $_POST['c_pass'];
	if($pass!=$c_pass){
			?>
			<script type="text/javascript">window.location.href = 'signup.php';</script>
			<?php
	}else{
		$sql="SELECT username FROM login where username='$user'";
		$result = $conn->query($sql);
		if($result->num_rows == 0){
			$sql = "INSERT INTO login (username, password) VALUES ('$user','$pass');";
			$sql .= "INSERT INTO userinfo (name, username, email) VALUES ('$name','$user','$email')";

			if ($conn->multi_query($sql) === TRUE) {
				echo "New records created successfully";
			}else{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			mkdir('uploads/'.$user);
			$_SESSION['user']=$user;
			?>
			<script type="text/javascript">window.location.href = 'index.php';</script>
			<?php
		}else{
			echo "Username Taken";
		}
	}
}

$conn->close();
?>

<script src="../JS/sideParticles.js"></script>
</body>
</html>