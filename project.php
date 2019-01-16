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
  $date = substr($row['creation'],0,10);
  ?>
  <h1><?php echo $projName; ?></h1>
</head>
<body>
<p1><?php echo "Date published ".$date; ?></p1>
<br><br>
<p1><?php echo "<b>Description </b><br><br>".$description; ?></p1>

</body>
</html>
