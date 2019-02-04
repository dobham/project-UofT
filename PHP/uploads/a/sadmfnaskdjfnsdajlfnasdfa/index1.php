<?php
include "connect.php";
$loggedIn=false;
//session_start(); Don't use this until its set up.
if(isset($_SESSION['id'])){ //If logged in through session variables.
    $userID = $_SESSION['id'];
    $sql= "SELECT * FROM login WHERE username='$user'";
    $result = $conn->query($sql);
    if(!$result){
      echo "ERROR" . $conn->error;
    }
    while($row = $result->fetch_assoc()){
      if($pass==$row['password']){
        $loggedIn=true;
        echo "Logged in";
      }else{
        echo "Incorrect login";
      }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>
<title>Page Title</title>
</head>
<body>

<div id="header">
<?php
    include("testdiv.html")
?>
	<div id="signButtons">
<?php
if ($loggedIn){
?>  
    <!-- Maybe add profile image with options onclick or something like that here. -->
		<button id="loginButton" onclick="">Logout</button> <!--LOGOUT BUTTON-->
<?php
}else{
?>
		<button id="loginButton" onclick="">Login</button> <!--LOGIN BUTTON-->
		<button id="signupButton" onclick="">Signup</button> <!--SIGNUP BUTTON-->
<?php
}
?>
	</div>
</div>

<div id="main">
	<div id="welcomeArea">
		<div id="requestArea">
			<p>Get your ideas made for free</p>
			<button id="createButton" onclick="">Create</button>
		</div>
		<div id="createArea">
			<p>Get experience helping others</p>
			<input id="searchBar" type="text" placeholder="search">
				<button id="searchButton" onclick="">Go</button>
		</div>
	</div>
	
	<p>This is a paragraph.</p>
</div>

</body>
</html>
<?php
    $conn->close();
?>
