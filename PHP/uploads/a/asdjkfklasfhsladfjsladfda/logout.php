<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="519061711949-9tbcqj0td8ufouul9jfaapr0ar248kr6.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
<script type="text/javascript">
var token = gapi.auth.getToken();
if (token) {
  var accessToken = gapi.auth.getToken().access_token;
  if (accessToken) {
  }
}
gapi.auth.setToken(null);
gapi.auth.signOut();
</script>
<?php
  session_start();
	foreach($_COOKIE as $key => $value){
	  if (isset($_COOKIE[$key])) {
	      unset($_COOKIE[$key]);
	      setcookie($key, '', time() - 3600);
	  }
	}
  session_destroy();
  session_unset();

	header('location: login.php');
?>

</html>
