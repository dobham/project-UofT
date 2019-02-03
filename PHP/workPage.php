<html>
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/stylesheet.css">
    <link rel="stylesheet" href="includes/tableStyle.css" />
</head>
<body>
<div class="topnav" id="myTopnav">
    <a class="option active" href="index.php">
        Project University
    </a>
    <a class="option" href="login.php">
        Login
    </a>
    <a class="option" href="signup.php">
        Signup
    </a>
    <a href="javascript:void(0);" class="icon" onclick="expand()">
        <i class="fa fa-bars"></i>
    </a>
</div>
<div class="side" id="sideResponsive">
    <a class="optionResponsive">
        Login
    </a>
    <a class="optionResponsive">
        Signup
    </a>
</div>
<div id="titleBoxProfile">
	<div class="bigTitle titleUnderline">Claim a Project</div>
</div>
<div class="centerDiv" style="width: 99%">
<table id="work">
  <tr>
    <th width="15%">User</th>
    <th width="20%">Project Name</th>
    <th width="=65%">Description</th>

  </tr>
<?php
include 'includes/connect.php';
$sql = "SELECT * FROM user_project_info";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['host']."</td>";
		?>
		<td onclick="this.querySelector('form').submit();">
			<form action="project.php" method="GET" style="display: inline;">
				<input type="hidden" name="id" value="<?php echo $row['id'] ?>"/>
			<?php echo $row['project_name'];?>
			</form>
		</td>
		<?php
		$comments = str_replace('><', '> <', $row['comments']);
		$comments = strip_tags($comments);
		?>
		<td onclick="this.querySelector('form').submit();">
			<form action="project.php" method="GET" style="display: inline;">
				<input type="hidden" name="id" value="<?php echo $comments ?>"/>
			<?php echo $row['project_name'];?>
			</form>
		</td>
		<?php
echo "</tr>";
          }
        }
        ?>
      </table>
	  </div>
    </body>
    </html>
