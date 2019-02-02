<html>
<head>
  <?php
  include 'includes/connect.php';
  session_start();
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
  <h1><?php echo $projName; ?></h1>
</head>

<body>
<p1><?php echo "Date published ".$date; ?></p1>
<br><br>
<p1><?php echo "<b>Description </b><br><br>".$description; ?></p1>

<br>
<script>
function claim(){
  document.getElementById("claim").value = "Claimed!";
}
</script>
<form method="post">
<input type="submit" name="claim" id="claim" value="Claim">
</form>
<form method="post">
  <input type="submit" name="download" value="Download All">
</form>
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
              echo "<a style=' color: blue;' href='".$dir.$file."'download>$file</a><br>";
            }
         }
      closedir($dh);
    }
}
$down = false;
if(isset($_POST['download'])){
$down = true;
$arr = array('\\','?','%','*');
$fileName = str_replace($arr,"",$projName);
$fileName = str_replace(" ","_",$fileName);
  if (!is_dir("$fileName")) {
      mkdir("$fileName");
  }

  rmdir("$fileName");
foreach($files as $file){
  copy($dir.$file,$fileName."/".$file);
}

  if(extension_loaded('zip'))
  {
       // Checking ZIP extension is available
       if(isset($files) and count($files) > 0)
       {
            // Checking files are selected
            $zip = new ZipArchive(); // Load zip library
            $zip_name = $projName.".zip";           // Zip name
            if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)
            {
                 // Opening zip file to load files
                 $error .= "* Sorry ZIP creation failed at this time";
            }
            foreach($files as $file)
            {
                 $zip->addFile($fileName."/".$file); // Adding files into zip

            }
            $zip->close();
            if(file_exists($zip_name))
            {
                 // push to download the zip

                 header('Content-type: application/zip');
                 header('Content-Disposition: attachment; filename="'.$zip_name.'"');
                 readfile($zip_name);
                 // remove zip file is exists in temp path
                 unlink($zip_name);

            }
       }
       else
       {
            $error .= "There are no files ";
       }
  }
  else
  {
       $error .= "* You dont have ZIP extension";
  }




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
if($down){
    echo "haweklrjfhszdkjl";
}
?>
</body>
</html>
