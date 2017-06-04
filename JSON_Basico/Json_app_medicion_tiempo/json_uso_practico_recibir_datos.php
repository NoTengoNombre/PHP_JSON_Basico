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

echo ' Ciudad : ' . $data['city']['name'];
echo '<br>';
echo '<br>';
//
//var_dump($data);
//
//print_r($data);

foreach ($data['list'] as $day => $value) {
  switch (++$day) {
    case 1 :
      echo "Maxima temperatura para el Lunes será de : " . $value['temp']['max'] . '<br>';
      echo "Minima temperatura para el Lunes será de : " . $value['temp']['min'] . '<br>';
      if ($value['humidity'] == 0) {
        echo "No hay datos registrados sobre la humedad para el Lunes<br>";
        echo '<hr>';
      } else {
        echo "Humedad para el Lunes será de : " . $value['humidity'] . '<br>';
        echo '<hr>';
      }
      break;

    case 2 :
      echo "Maxima temperatura para el Martes será de : " . $value['temp']['max'] . '<br>';
      echo "Minima temperatura para el Martes será de : " . $value['temp']['min'] . '<br>';
      if ($value['humidity'] == 0) {
        echo "No hay datos registrados sobre la humedad para el Martes<br>";
        echo '<hr>';
      } else {
        echo "Humedad para el Martes será de : " . $value['humidity'] . '<br>';
        echo '<hr>';
      }
      break;

    case 3 :
      echo "Maxima temperatura para el Miercoles será de : " . $value['temp']['max'] . '<br>';
      echo "Minima temperatura para el Miercoles será de : " . $value['temp']['min'] . '<br>';
      if ($value['humidity'] == 0) {
        echo "No hay datos registrados sobre la humedad para el Miercoles<br>";
        echo '<hr>';
      } else {
        echo "Humedad para el Miercoles será de : " . $value['humidity'] . '<br>';
        echo '<hr>';
      }
      break;

    case 4 :
      echo "Maxima temperatura para el Jueves será de : " . $value['temp']['max'] . '<br>';
      echo "Minima temperatura para el Jueves será de : " . $value['temp']['min'] . '<br>';
      if ($value['humidity'] === 0) {
        echo "No hay datos registrados sobre la humedad para el Jueves<br>";
        echo '<hr>';
      } else {
        echo "Humedad para el Jueves será de : " . $value['humidity'] . '<br>';
        echo '<hr>';
      }
      break;

    case 5 :
      echo "Maxima temperatura para el Viernes será de : " . $value['temp']['max'] . '<br>';
      echo "Minima temperatura para el Viernes será de : " . $value['temp']['min'] . '<br>';
      if ($value['humidity'] == 0) {
        echo "No hay datos registrados sobre la humedad para el Viernes<br>";
        echo '<hr>';
      } else {
        echo "Humedad para el Viernes será de : " . $value['humidity'] . '<br>';
        echo '<hr>';
      }
      break;

    case 6 :
      echo "Maxima temperatura para el Sabado será de : " . $value['temp']['max'] . '<br>';
      echo "Minima temperatura para el Sabado será de : " . $value['temp']['min'] . '<br>';
      if ($value['humidity'] == 0) {
        echo "No hay datos registrados sobre la humedad para el Sabado<br>";
        echo '<hr>';
      } else {
        echo "Humedad para el Sabado será de : " . $value['humidity'] . '<br>';
        echo '<hr>';
      }
      break;

    case 7 :
      echo "Maxima temperatura para el Domingo será de : " . $value['temp']['max'] . '<br>';
      echo "Minima temperatura para el Domingo será de : " . $value['temp']['min'] . '<br>';
      echo "Humedad para el Domingo será de : " . $value['humidity'] . '<br>';
      if ($value['humidity'] == 0) {
        echo "No hay datos registrados sobre la humedad para el Domingo<br>";
        echo '<hr>';
      } else {
        echo "Humedad para el Domingo será de : " . $value['humidity'] . '<br>';
        echo '<hr>';
      }
      break;

    default:
      echo "No hay mas días";
      echo "No hay Humedad";
      echo '<hr>';
      echo "No hay datos registrados sobre la humedad <br>";
      break;
  }
}

