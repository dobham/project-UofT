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
$_SESSION['name'] = $row['name'];
$_SESSION['email']= $row['email'];
$_SESSION['uname'] = $row['username'];
$_SESSION['github'] = $row['github'];
$_SESSION['bio'] = $row['bio'];
$claimed = explode(",",$row['claimedProj']);

$projects2 = array();
foreach($claimed as $proj){
  $sql= "SELECT host FROM user_project_info WHERE project_name='$proj'";
  if ($conn->query($sql)) {
    $row = $conn->query($sql)->fetch_assoc();
    array_push($projects2,$row['host']);
  }
}
echo "<b>name:</b> ".$name."<br><b>email:</b> ".$email."<br><b>username:</b> ".$uname."<br><b>github:</b> ".$github."<br><b>bio: </b>".$bio."<br>";
array_pop($projects2);
echo "<br>";
echo "<br>";

?>
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
<br>
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
<form action="updateProfile.php" method="post">
  <input type="submit" name="upProfile" value="Update Your Profile"><br>
  <input type="submit" name="homepage" value="Homepage" formaction="homepage.php">
</form>
