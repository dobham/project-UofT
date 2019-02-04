<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Creator</title>

    <script src="../JS/squareAnimation.js"></script>
    <script src="../JS/script.js"></script>
    <script src="../JS/sketch.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../CSS/stylesheet.css">

    <link rel="stylesheet" href="../CSS/quill.snow.css"/>
    <link rel="stylesheet" href="../CSS/quill.core.css"/>
    <link rel="stylesheet" href="../CSS/quill.bubble.css"/>
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
<div id="layerProfile">
    <div id="titleBoxProfile">
        <div class="signTitle">Create Account</div>
    </div>
	<div class="editContainor">
		<div id="editorBox" class="profileQuill"><p> <!-- USERS TYPE INTO THIS --> </p></div>
		</div>
    <div id="contentProfile">
        <div id="openPref" class="titleUnderline" onclick="prefOpen()"><i class="fa fa-chevron-left"></i><i class="fa fa-chevron-left"></i>   More</div>
    </div>
</div>
<div id="topPref">
	<div id="layerSideProfile">
		<div id="titleBoxSide">
			<div  class="titleUnderline signTitle" onclick="prefOpen()"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i>   Hide</div>
		</div>
		<div id="contentProfileSide">
			<!--<img src="../IMAGES/img_avatar.png" class="profileImageUpload" style="left: 15%;top: 30%;position: absolute;">
			<button class="imageChooser">Choose an Image</button> <!-- Opens explorer of some kind to pick an image -->
			<div class="profileNameBox">
				<h2 id="profileName"><?php echo $_SESSION['user']; ?></h2>
			</div>
			<form id="createForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
				<input  placeholder="Name" class="indexInput" id="nickname" name="name">
				<input  placeholder="Email" class="indexInput" id="profileEmail" name="email">
				<input  placeholder="GitHub Link" class="indexInput" id="gitHubLink" name="github"><!--In case they want to display a link to their other projects maybe-->
				<input id="bioInput" type="hidden" name="bio" value="">
			</form>
		</div>
	</div>
</div>
<div id="bottomPref">
	<button type="submit" name="create" class="indexFormSubmitButton" id="submitProfile" form="createForm" onclick="document.getElementById('bioInput').value = document.getElementById('editorBox').children[0].innerHTML;">Save</button>
</div>
<?php
	if(isset($_POST['create'])){

		$name = $_POST['name'];
		$github = $_POST['github'];
		$email = $_POST['email'];
		$bio = $_POST['bio'];
		$user=$_SESSION['user'];
		$sql = "UPDATE userinfo SET name='$name', email='$email', github='$github', bio='$bio' WHERE username='$user'";

		if ($conn->query($sql) === TRUE) {
	    	echo "New records created successfully";
		}else{
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
		header('location: viewProfile.php');
	}
?>

<canvas id="canvas" height="100%" width="100%" style="bottom: -0%;"></canvas>
<script type="text/javascript" src="../JS/sideParticles.js"></script>

<script type="text/javascript" src="../JS/jquery.min.js"></script>
<script type="text/javascript" src="../JS/quill.min.js"></script>
<script type="text/javascript" src="../JS/text_editor.js"></script>
</body>
</html>