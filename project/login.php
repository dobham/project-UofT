<?php
  session_start();
  include "connect.php";
$user = $_POST['user'];
  $pass = $_POST['pass'];

  $sql= "SELECT password FROM login WHERE username=$user";
  $result = $conn->query($sql);
while($row = $result-> fetch_assoc()){
   if($pass==$row['password']){
      header('location: index.html')
    }else{
      echo "Incorrect login";
      header('location: loginPage.html');
    }
  }
?>
