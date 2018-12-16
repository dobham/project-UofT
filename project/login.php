<?php
  session_start();
  include "connect.php";
$fname = isset($_COOKIE['fname'])?$_COOKIE['fname']:null;
$lname = isset($_COOKIE['lname'])?$_COOKIE['lname']:null;
$profPic =isset($_COOKIE['profPic'])?$_COOKIE['profPic']:null;
$email = isset($_COOKIE['email'])?$_COOKIE['email']:null;
if($fname == null){
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $sql= "SELECT password FROM login WHERE username='$user'";
  $result = $conn->query($sql);

  if($result->num_rows > 0){
    // output data of each row
    while($row = $result->fetch_assoc()){
      if($pass==$row['password']){
        // someone set up a session var or cookie with all of the data from the db
        echo "welcome";
      }else{
        header('location: loginDiv.php');
      }
    }
  }else{
    echo "0 results";
  }
  $conn->close();
}else{
  echo "ur using google sigin".$fname;
}
  ?>
