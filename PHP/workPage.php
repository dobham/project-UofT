<html>
<head>
    <link rel="stylesheet" href="includes/tableStyle.css" />
</head>
<body>
<table id="work">
  <tr>
    <th width="15%">User</th>
    <th width="20%">Project Name</th>
    <th width="50%">Description</th>
    <th>Link</th>

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
        echo "<td>".$row['project_name']."</td>";
        echo "<td>".$row['comments']."</td>";
?>
<td>
<form action="project.php" method="GET" style="display: inline;">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>"/>
            <input type="submit" name="enterProj" value="go to page"/>
            </form>
          </td>
<?php
echo "</tr>";
          }
        }
        ?>
      </table>
    </body>
    </html>
