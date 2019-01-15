<html>
<head>
  <?php
  include 'includes/connect.php';
  $id = $_GET['id'];
  $query = "SELECT * FROM user_project_info WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  $user = $row['host'];
  $projName = $row['project_name'];
  $description = $row['comments'];
  ?>
  <h1><?php echo $projName; ?></h1>
</head>
<body>
<p1><?php echo "by: ".$user; ?></p1>
<br><br>
<p1><?php echo "Description <br>".$description; ?></p1>

</body>
</html>
