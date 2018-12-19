<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="519061711949-jc7dhk910o2f4bpa5f7rnbh9o2gt2e9i.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
  <body>

    <div id="loginPopTest">
      <script>
        function onSignIn(googleUser){
          console.log(document.cookie);
          var profile = googleUser.getBasicProfile();
          var fname = profile.getGivenName();
          var lname = profile.getFamilyName();
          var profPic = profile.getImageUrl();
          var email = profile.getEmail();
          document.cookie = "fname="+fname+ ";";
          document.cookie = "lname="+lname+ ";";
          document.cookie = "profPic="+profPic+ ";";
          document.cookie = "email="+email+ ";";
          console.log(document.cookie);
          window.location.href = "login.php";
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
        <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    </div>


<?php
  
    session_start();
    include "connect.php";
    $fname = isset($_COOKIE['fname'])?$_COOKIE['fname']:null;
    $lname = isset($_COOKIE['lname'])?$_COOKIE['lname']:null;
    $profPic =isset($_COOKIE['profPic'])?$_COOKIE['profPic']:null;
    $email = isset($_COOKIE['email'])?$_COOKIE['email']:null;
    if($fname == null){
      if(isset($_POST['login'])){
        //normal sign-in
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $sql= "SELECT password FROM login WHERE username='$user'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
          // output data of each row
          while($row = $result->fetch_assoc()){
            if($pass==$row['password']){
              // someone set up a session var or cookie with all of the data from the db
              header('location: testHomepage.html');
            }else{
              header('location: login.php');
            }
          }
        }else{
          echo "0 results";
        }
        $conn->close();
      }
    }else{
      //google sign-in
      echo "ur using google sigin".$fname;
      header('location: testHomepage.html');
    }
  
?>
</body>
</html>