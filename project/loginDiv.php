<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="519061711949-1ko9fh9st4mnfr5o21ji7ir9e54kkit9.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
  <body>
<div id="loginPopTest">
      <script>
        function onSignIn(googleUser) {
          var profile = googleUser.getBasicProfile();
          var fName = profile.getGivenName();
          var lName = profile.getFamilyName();
          var profPic = profile.getImageUrl();
          var email = profile.getEmail();
          // var userData = [fName, lName, profPic, email];
          document.cookie = "lName="+lName+";profPic="+profPic+";email="+email;
          console.log(document.cookie);
        //  window.location.href = "login.php
        };
      </script>
      <form id="login" action="login.php" method="post">
        <input type="text" name="user" placeholder="Username">
        <input type="password" name="pass" placeholder="Password">
        <input type="submit" name="login" value="login">
      </form>
      <form id="signup" action="signup.php" method="post">
        <input type="submit" name="signup" value="signup">
      </form>
      <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    </div>
<?php
print_r($_COOKIE);
?>
</body>
</html>
