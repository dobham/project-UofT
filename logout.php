<?php
	foreach($_COOKIE as $key => $value){
	  if (isset($_COOKIE[$key])) {
	      unset($_COOKIE[$key]);
	      setcookie($key, '', time() - 3600);
	  }
	}
	header('location: login.php');
?>