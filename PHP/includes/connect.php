<?php
  $servername = "localhost";
  $username = "root";
  $password = "waxyman2002";
  $database = "maindb";
  $conn = new mysqli($servername, $username, $password,$database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  echo "connected succesfully";
?>
