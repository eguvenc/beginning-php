<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$q=$_GET["q"];

$con = mysqli_connect('localhost','root','12345','ajax');

if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }


$sql="SELECT * FROM customer WHERE id = '".$q."'";

$result = mysqli_query($con,$sql);

echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['FirstName'] . "</td>";
  echo "<td>" . $row['LastName'] . "</td>";
  echo "<td>" . $row['Age'] . "</td>";
  echo "<td>" . $row['Hometown'] . "</td>";
  echo "<td>" . $row['Job'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
