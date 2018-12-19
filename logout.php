<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="519061711949-jc7dhk910o2f4bpa5f7rnbh9o2gt2e9i.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
<script type="text/javascript">
var token = gapi.auth.getToken();
if (token) {
  var accessToken = gapi.auth.getToken().access_token;
  if (accessToken) {
    // make http get request towards: 'https://accounts.google.com/o/oauth2/revoke?token=' + accessToken
    // In angular you can do it like this:
    // $http({
    //   method: 'GET',
    //   url: 'https://accounts.google.com/o/oauth2/revoke?token=' + accessToken
    // });
  }
}
gapi.auth.setToken(null);
gapi.auth.signOut();
</script>
<?php
	foreach($_COOKIE as $key => $value){
	  if (isset($_COOKIE[$key])) {
	      unset($_COOKIE[$key]);
	      setcookie($key, '', time() - 3600);
	  }
	}
	header('location: login.php');
?>

</html>