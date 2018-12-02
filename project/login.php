<?php
  session_start();
  include "connect.php";
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $sql= "SELECT password FROM login WHERE username='$user'";
  $result = $conn->query($sql);

  if($result->num_rows > 0){
    // output data of each row
    while($row = $result->fetch_assoc()){
      if($pass==$row['password']){
        echo "finally";
      }else{
        header('location: loginPage.html');
      }
    }
  }else{
    echo "0 results";
  }
  $conn->close();
?>