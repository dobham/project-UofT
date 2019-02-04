<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>post Create</title>

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
<div id="blur">
  <?php
  $client = $_SESSION['user'];
  $id = $_GET['id'];
  $query = "SELECT * FROM user_project_info WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  $user = $row['host'];
  $projName = $row['project_name'];
  $description = $row['comments'];
  $date = substr($row['creation'],0,10);
  $clients = $row['claimers'];

  $query = "SELECT * FROM userinfo WHERE username='$client'";
  $result = mysqli_query($conn, $query);
  $wor = mysqli_fetch_array($result);
  $idClient = $wor['id'];
  $proj = $wor['claimedProj'];
  ?>

<br>
<script>
function claim(){
  document.getElementById("claim").value = "Claimed!";
}
</script>
<div id="layerCreate">
    <div id="titleBoxProfile">
        <div class="bigTitle"><?php echo $projName; ?></div><br><br>
        <div class="smallTitle">Requested <?php echo $date; ?> by <a href=""><?php echo $user ?></a></div><br>
    </div>
	<div class="bigSubtitle">Description</div>
    <div class="descriptBox">
        <div class="descript"><?php echo $description; ?>
    </div>
	<div class="centerDiv">
		<form method="post" id="form1"></form>
		<form method="post" id="form2"></form>
		<button type="submit" name="claim" id="claim" form="form1" class="smallButton">
			Claim
		</button>
	</div><br>
		<div class="centerDiv">
		<button type="submit" name="download" form="form2" class="smallButton">
			Download
		</button>
		<br><br>
<?php
if(isset($_POST["claim"])){
  $sql = "UPDATE userinfo SET claimedProj = '$proj$projName,' WHERE id = $idClient;";
  $sql .= "UPDATE user_project_info SET claimers = '$clients$client,' WHERE id = $id";

  if ($conn->multi_query($sql) === TRUE) {
      echo '<script>claim();</script>';
  }else{
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();

}
echo "<br>";

$dir = "uploads/".$_SESSION['user']."/".$projName."/";
$files = array();
$dh = opendir($dir);
$file = readdir($dh);
if (is_dir($dir)){
    if ($dh = opendir($dir)){
      while (($file = readdir($dh)) !== false){
        if($file != '.' && $file != '..' && $file!="index.php"){
              array_push($files,$file);
              echo "<a href='".$dir.$file."'download>$file</a><br><br>";
            }
         }
      closedir($dh);
    }
}
if(isset($_POST['download'])){
$arr = array('\\','?','%','*');
$fileName = str_replace($arr,"",$projName);
$fileName = str_replace(" ","_",$fileName);
$fileName = "../project_files/".$fileName;
  if (!is_dir("$fileName")) {
      mkdir("$fileName");
  }

foreach($files as $file){
  copy($dir.$file, $fileName."/".$file);
}

  if(extension_loaded('zip'))
  {
       if(isset($files) and count($files) > 0)
       {
            $zip = new ZipArchive();
            $zip_name = $projName.".rar";
            if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)
            {
              echo "error in archiving files";
            }
            foreach($files as $file)
            {
                 $zip->addFile($fileName."/".$file);

            }
            $zip->close();
            if(file_exists($zip_name))
            {

                 header('Content-type: application/zip');
                 header('Content-Disposition: attachment; filename="'.$zip_name.'"');
                 readfile($zip_name);
                 unlink($zip_name);

            }
       }
       else
       {
            echo "There are no files ";
       }
  }


foreach($files as $file){
  echo "a";
  if(file_exists($fileName."/".$file)){
    unlink($fileName."/".$file);
  }
}
rmdir($filename);

  // the old and crappy method
  // if (is_dir($dir)){
  //     if ($dh = opendir($dir)){
  //       while (($file = readdir($dh)) !== false){
  //         if($file != '.' && $file != '..' && $file!="index.php"){
  //             //  echo $dir;
  //                echo $file."<a href='".$dir.$file."'download>$file</a><br>";
  //             }
  //          }
  //       closedir($dh);
  //     }
  // }



}
?>
	</div>

</div>
</div>
<canvas id="canvas" height="100%" width="100%" style="bottom: -0%;"></canvas>
<script type="text/javascript" src="../JS/sideParticles.js"></script>

<script type="text/javascript" src="../JS/jquery.min.js"></script>
<script type="text/javascript" src="../JS/quill.min.js"></script>
<script type="text/javascript" src="../JS/text_editor.js"></script>
<script type="text/javascript" src="../JS/tags.js"></script>
</body>
</html>
