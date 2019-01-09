<!DOCTYPE html>
<html>
<head>

</head>

<body>
<table id="announcement">
  <tr>
    <th width="12%">Date</th>
    <th width="15%">Club</th>
    <th width="20%">Staff</th>
    <th width="45%">Announcement</th>
    <th widht="8%"></th>
  </tr>

<?php
include 'includes/connect.php';
$sql = "SELECT * FROM announcement";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['date']."</td>";
        echo "<td>".$row['club']."</td>";
        echo "<td>".$row['sponsor']."</td>";
        echo "<td>".$row['announcement']."</td>";
        echo "<td><a href='update.php?id=".$row['id']."'>Update</a> &nbsp&nbsp";
        echo "<a href='delete.php?id=".$row['id']."'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
}
?>
</table>

</body>
</html>>