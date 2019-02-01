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
//$options = "";
if (is_dir($dir)){
    if ($dh = opendir($dir)){
      while (($file = readdir($dh)) !== false){
        if($file != '.' && $file != '..' && $file!="index.php"){
               // select option with files names
               //$options = $options."<option>$file</option>";
               // display the file names
               echo $file."<br>";
            }
         }
      closedir($dh);
    }
}
if(isset($_POST['download'])){
echo "test";
  if (is_dir($dir)){
      if ($dh = opendir($dir)){
        while (($file = readdir($dh)) !== false){
          if($file != '.' && $file != '..' && $file!="index.php"){
                if (file_exists($file)) {
              header('Content-Description: File Transfer');
              header('Content-Type: application/octet-stream');
              header('Content-Disposition: attachment; filename="'.basename($file).'"');
              header('Expires: 0');
              header('Cache-Control: must-revalidate');
              header('Pragma: public');
              header('Content-Length: ' . filesize($file));
              readfile($file);
              exit;
          }
              }
          }
        closedir($dh);
      }
  }
  $file = 'monkey.gif';


}
?>

</body>
</html>
