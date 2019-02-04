<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile View</title>

    <script src="../JS/squareAnimation.js"></script>
    <script src="../JS/script.js"></script>
    <script src="../JS/sketch.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="includes/tableStyle.css" />
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
<div id="blur">
<div id="layerProfile">

<?php
session_start();

$user = $_SESSION['user'];
include "connect.php";
  $sql= "SELECT * FROM userinfo WHERE username='$user'";
  if ($conn->query($sql)) {
    $row = $conn->query($sql)->fetch_assoc();
  }
  $myProjects = array();
  $sql2= "SELECT claimers, project_name FROM user_project_info WHERE host='$user'";
  // $result = $conn->query($sql2);
if ($result = $conn->query($sql2)) {
    while($row2 = $result->fetch_assoc()){

      $row2['claimers']=substr($row2['claimers'],0,-1);
      array_push($myProjects,$row2);
  }
}
// print_r($myProjects);
$name = $row['name'];
$email = $row['email'];
$uname = $row['username'];
$github = $row['github'];
$bio = $row['bio'];
$claimed = explode(",",$row['claimedProj']);

$projects2 = array();
foreach($claimed as $proj){
  $sql= "SELECT host FROM user_project_info WHERE project_name='$proj'";
  if ($conn->query($sql)) {
    $row = $conn->query($sql)->fetch_assoc();
    array_push($projects2,$row['host']);
  }
}
?>
    <div id="titleBoxProfile">
        <div class="signTitle" id="viewTitle"><?php echo $name; ?>'s Profile</div>
    </div>
    <h2 id="userBio" class="titleUnderline">User Bio</h2>
    <div class="bioBox">
        <div id="bioInfo"><?php echo $bio; ?></div>
    </div>
<?php
//echo "<b>name:</b> ".$name."<br><b>email:</b> ".$email."<br><b>username:</b> ".$uname."<br><b>github:</b> ".$github."<br><b>bio: </b>".$bio."<br>";
array_pop($projects2);
//echo "<br>";
//echo "<br>";

?>
    <h2 id="userProjects" class="titleUnderline">Project Requests</h2>
    <div class="tableBox">
<table>
  <tr>
    <th>Project Name</th>
    <th>Claimers</th>
  </tr>
  <?php
  foreach($myProjects as $rows){
    echo "<tr>";
    echo "<td>$rows[project_name]</td>";
    echo "<td>$rows[claimers]</td>";
    echo "</tr>";
  }
  ?>
</table>
    </div>
    <div id="contentProfile">
        <div id="openPref" class="titleUnderline" onclick="prefOpenView()"><i class="fa fa-chevron-left"></i><i class="fa fa-chevron-left"></i>   More Info</div>
    </div>

<br>
    <h2 id="userProjects" class="titleUnderline">Project Requests</h2>
    <div class="tableBox">
<table>
  <tr>
    <th>Claimed Projects</th>
    <th>Hosts</th> 
  </tr>
<?php
for($i=0;$i<count($claimed)-1;$i++){
  echo "<tr>";
  echo "<td>$claimed[$i]</td> <td>$projects2[$i]</td>";
  echo "</tr>";
}

?>
</table>
    </div>
</div>
<div id="topPrefView">
    <div id="layerSideProfile">
        <div id="titleBoxSide">
            <div  class="titleUnderline signTitle" onclick="prefOpenView()"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i>   Hide</div>
        </div>
        <div id="contentProfileSide">
            <!--<img src="../IMAGES/img_avatar.png" class="profileImageUpload" style="left: 15%;top: 30%;position: absolute;">
            <button class="imageChooser">Choose an Image</button> <!-- Opens explorer of some kind to pick an image -->
            <div class="profileNameBox">
                <h2 id="profileName"><?php echo $user; ?></h2>
            </div>
            <h1 class="titleUnderline" id="contactView">Contact Info</h1>
            <h2 class="titleUnderline" id="emailInfoTitle">Email</h2>
            <p id="emailInfo"><?php echo $email; ?></p>
            <h2 class="titleUnderline" id="gitHubInfoTitle">GitHub Link</h2>
            <p id="gitHubInfo"><?php echo $github; ?></p><!--In case they want to display a link to their other projects maybe-->
        </div>
    </div>
</div>
</div>
<canvas id="canvas" height="100%" width="100%" style="bottom: -0%;"></canvas>
<script type="text/javascript" src="../JS/sideParticles.js"></script>

<script type="text/javascript" src="../JS/jquery.min.js"></script>
<script type="text/javascript" src="../JS/quill.min.js"></script>
<script type="text/javascript" src="../JS/text_editor.js"></script>
</body>
</html>