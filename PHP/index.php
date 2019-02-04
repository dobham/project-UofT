<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project Uni</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/stylesheet.css">
    <script src="../JS/script.js"></script>
    <script src="../JS/squareAnimation.js"></script>
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
<div id="searchOverlay">
    <h1 id="overlayText">
        Join the community now! <br>
        Search for a Project!
    </h1>
	<form id="searchForm" method="post" action="<?php echo htmlspecialchars('workpage.php');?>">
	</form>
    <input form="searchForm" id="searchBar" name="searchTerm" placeholder="Find a project to work on now!">
	<button type="submit" form="searchForm" id="searchButton" onclick="openSearch()"><i class="fa fa-search"></i></button>
    <button onclick="searchOverlayOff(); openSearch();" id="searchClose">Close</button>
</div>
<div id="blur">
<div class="container" id="createContainer">
    <div id="create">
        <h2 id="createInfo">
            Have a project idea? <br>
            Want it to get made?
        </h2>
		<div id="createRow">
			<button id="createButton" onclick="window.location.href='createproject.php'">Get started!</button>
		</div>
    </div
	><div id="search">
        <h2 id="searchInfo">
            Search For Projects, Gain Expereince, Add It To Your Resume!
        </h2>
        <div id="searchRow">
            <button id="searchOverlayButton" onclick="searchOverlayOn(); openSearch();" >Search Now</button>
        </div>
    </div>
</div>
<div class="container" id="aboutContainer">
    <div id="about">
        <h2 id="aboutInfo">
            What is this?
        </h2>
        <p id="aboutText">
A streamlined platform for open source programming hobbyists in high school from around the world to use, hoping to also create a community of networking individuals whom may lack the programming experience for a project or idea they have in mind who then can use our platform to find others to help them. This then allows students to build up their resume with projects they have completed and allow them to gain an edge within their applications to university or to even work at a company.        </p>
    </div>
</div>
<div class="container" id="teamContainer">
    <div id="team">
        <h2 id="teamInfo">
            Who are we?
        </h2>
        <div class="member" id="anthony">
            <img src="../IMAGES/NOT%20-%20Copy.jpg" class="memberImage">
            <h3 class="name">
                Anthony Bertnyk
            </h3>
            <p class="memberInfo">
                Bunch of words about me
            </p>
        </div><div class="member" id="aryan">
            <img src="../IMAGES/ARYANNN.png" class="memberImage">
            <h3 class="name">
                Aryan Gajeli
            </h3>
            <p class="memberInfo">
                Bunch of words about me
            </p>
        </div><div class="member" id="mahbod">
            <img src="../IMAGES/big%20sahd.png" class="memberImage">
            <h3 class="name">
                Mahbod Sabbaghi
            </h3>
            <p class="memberInfo">
                Bunch of words about me
            </p>
        </div><div class="member" id="azfar">
            <img src="../IMAGES/celeb-closeup-james-franco.jpg" class="memberImage">
            <h3 class="name">
                Azfar Choudhry
            </h3>
            <p class="memberInfo">
                Bunch of words about me
            </p>
        </div>
    </div>
</div>
<canvas id="canvas" height="100%" width="100%"></canvas>
</div>
</body>
</html>
