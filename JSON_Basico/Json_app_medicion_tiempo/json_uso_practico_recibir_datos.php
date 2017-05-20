<?php

if ($_GET['c'] == null && $_GET['p'] == null) {
  if ($_GET['c'] == '' && $_GET['p'] == '') {
    die();
  }
}


$city = $_GET['c'];
$country = $_GET['p'];
$url = "http://api.openweathermap.org/data/2.5/forecast/daily?q=" . $city . "," . $country . "&units=metric&cnt=7&lang=es&appid=c0c4a4b4047b97ebc5948ac9c48c0559";
$json = file_get_contents($url);
$data = json_decode($json, true);
echo $data['city']['name'];
echo '<br>';

//var_dump($data);
//
//print_r($data);

foreach ($data['list'] as $day => $value) {
  echo "Maxima temperatura para los días " . ++$day . " será de : " . $value['temp']['max'] . '<br>';
}