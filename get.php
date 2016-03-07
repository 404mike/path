<?php


$con=mysqli_connect("localhost","dbuser","123","paths");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM paths WHERE path = '' LIMIT 1");

while($row = $result->fetch_assoc()) {

  $arr = [
    'id' => $row['id'],
    'start' => $row['start'],
    'end' => $row['end']
  ];

  echo json_encode($arr);
}

mysqli_close($con);