<?php

//if ($_GET['c'] == null) {
//  die();
//}

// obtener el JSON que genera la API de OpenWeatherMap gracias a la función file_get_contents
//$html = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=" . $_GET["c"]);
//$html = file_get_contents("http://tile.openweathermap.org/data/2.5/weather?q=" . $_GET["c"]);
//$html = file_get_contents('http://api.openweathermap.org/data/2.5/forecast/daily?q=' . $_GET['c'] . ',');
//
//$html = file_get_contents("http://api.openweathermap.org/data/2.5/forecast/daily?q=" . $_GET['c'] . "," . 'Spain' . "&units=metric&cnt=7&lang=es&appid=c0c4a4b4047b97ebc5948ac9c48c0559");

$city = "Madrid";
$country = "Spain";

$html = file_get_contents("http://api.openweathermap.org/data/2.5/forecast/daily?q=" . $city . "," . $country . "&units=metric&cnt=7&lang=en&appid=c0c4a4b4047b97ebc5948ac9c48c0559");


//$city = "London";
//$country = "UK";
//$url = "http://api.openweathermap.org/data/2.5/forecast/daily?q=" . $city . "," . $country . "&units=metric&cnt=7&lang=en&appid=c0c4a4b4047b97ebc5948ac9c48c0559";



$json = json_decode($html);

//$ciudad = $json->name;
//$lat = $json->coord->lat;
//$lon = $json->coord->lon;
//$temp = $json->main->temp;
//$tempmax = $json->main->temp_max;
//$tempmin = $json->main->temp_min;
//$presion = $json->main->pressure;
//$humedad = $json->main->humidity;
//$vel_viento = $json->main->temp;
//$estado_cielo = $json->weather[0]->main;
//$descripcion = $json->weather[0]->description;

echo "<h3> Ciudad " . $ciudad . "[lat = " . $lat . " , lon . ] </h3>";
echo "";
echo "Estado del Cielo: " . $estado_cielo;
echo "";
echo "Descripcion : " . $descripcion;
echo "";
echo "Temperatura : " . $temp . " K [Max : " . $tempmax . "K, Min: " . $tempmax . "K]";
echo "";
echo "Presion: " . $presion;
echo "";
echo "Humedad: " . $humedad;
echo "";





