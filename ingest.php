<?php


$con=mysqli_connect("localhost","dbuser","123","paths");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$json = file_get_contents('out');
$data = json_decode($json,true);

foreach($data['path'] as $path) {
  $pathArr = explode('-', $path);
  $start = trim($pathArr[0]);
  $end = trim($pathArr[1]);

  $start = mysqli_real_escape_string($con , $start);
  $end = mysqli_real_escape_string($con , $end);

  $query = mysqli_query($con,"INSERT INTO paths (start,end) 
  VALUES ('$start','$end')");

  if(!$query) die("INSERT INTO paths (start,end) VALUES ('$start','$end')");
}

mysqli_close($con);