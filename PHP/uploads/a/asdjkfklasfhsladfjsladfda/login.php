<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="519061711949-9tbcqj0td8ufouul9jfaapr0ar248kr6.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
  <body>

    <div id="loginPopTest">
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
  session_start();
?>
      <script>
        function onSignIn(googleUser){
          document.cookie = "fname=; lname=; profpic=; email=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
          console.log(document.cookie);
          var profile = googleUser.getBasicProfile();
          var fname = profile.getGivenName();
          var lname = profile.getFamilyName();
          var profPic = profile.getImageUrl();
          var email = profile.getEmail();
          //var isset = TRUE;
          document.cookie = "fname="+fname+ ";";
          document.cookie = "lname="+lname+ ";";
          document.cookie = "profPic="+profPic+ ";";
          document.cookie = "email="+email+ ";";
          window.location.href = "homepage.php";
          console.log(document.cookie);
          //document.writeln(email);
        };
      </script>
        <form id="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
          <input type="text" name="user" placeholder="Username">
          <input type="password" name="pass" placeholder="Password">
          <input type="submit" name="login" value="login">
        </form>
        <form id="signup" action="signup.php" method="post">
          <input type="submit" name="signup" value="signup">
        </form>
        <form method="post">

            <div name = "google" class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
        </form>
    </div>


<?php

    //session_start();
    include "connect.php";

     // if($fname == null){
      if(isset($_POST['login'])){
        //normal sign-in
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $sql= "SELECT password FROM login WHERE username='$user'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
          // output data of each row
          $_SESSION['user']=$user;
          while($row = $result->fetch_assoc()){
            if($pass==$row['password']){
              header('location: homepage.php');
            }else{
              header('location: login.php');
            }
          }
        }else{
          echo "0 results";
        }
        $conn->close();
      }
    // }else{
    //   //google sign-in
    //   echo "ur using google sigin".$fname;
    //   header('location: homepage.php');
    // }

?>
</body>
</html>
