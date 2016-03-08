<?php

function get(){
  $con=mysqli_connect("localhost","root","root","paths");
  // Check connection
  if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $result = mysqli_query($con,"SELECT * FROM paths WHERE path = '' LIMIT 1");

  while($row = $result->fetch_assoc()) {


    $start = $row['start'];
    $start_loc = lookup($start);
    $end = $row['end'];
    // $end_loc = lookup($end);

    $arr = [
      'id' => $row['id'],
      'start' => $row['start'],
      'end' => $row['end']
    ];
    mysqli_close($con);



    echo '<pre>' ,print_r($arr) ,' </pre>';

    return json_encode($arr);
  }

  
}

function lookup($place)
{
  $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=$QUERY&key=AIzaSyAGZ6UZNUwkU_qVzB7RrdfzGf28entH1LI';
  $url = str_replace('$QUERY', $place, $url);
  echo $url;
  $json = file_get_contents($url);
  $data = json_decode($json,true);
  echo '<pre>' , print_r($data) , '</pre>';
}

get();