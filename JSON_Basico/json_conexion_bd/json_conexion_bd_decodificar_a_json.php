<?php

$sql = "SELECT id_fruta, nombre_fruta, cantidad FROM fruta";

/**
 * 
 * @return type
 */
function connectDB() {

  $server = "localhost";
  $user = "root";
  $pass = "";
  $bd = "json_fruteria";

  $conexion = mysqli_connect($server, $user, $pass, $bd);

  if ($conexion) {
    echo 'La conexion bd se ha hecho satisfactoriamente';
    echo '<br>';
  } else {
    echo 'Ha sucedido un error';
    echo '<br>';
  }
  return $conexion;
}

/**
 * 
 * @param type $conexion
 * @return type
 */
function disconnectDB($conexion) {

  $close = mysqli_close($conexion);

  if ($close) {
    echo 'La desconexion de bd se ha hecho bien';
  } else {
    echo 'Error en la desconexion de bd';
  }
  return $close;
}

/**
 * 
 * @param type $sql
 * @return type
 */
function getArraySQL($sql) {
//  Creamos la conexion con la funcion anterior
  $conexion = connectDB();
//  Generamos la codificacion
  mysqli_set_charset($conexion, "utf8");
//  Generamos la consulta 
  if (!$result = mysqli_query($conexion, $sql)) {
    die();
  }
  // creamos un array
  $rawdata = array();
//  guardamos en un array multidimensional todos los datos 
  $i = 0;

  while ($row = mysqli_fetch_array($result)) {

    $rawdata[$i] = $row; // guardamos en array todos los elementos

    $i++;
  }
  disconnectDB($conexion); // funcion desconecta la conexion bd
  return $rawdata; //devuelve Array
}

$mi_array_string = getArraySQL($sql);
echo '<br>';
echo json_encode($mi_array_string); // codifico el array a un Json String
//-------------------------------------
// Almaceno el json completo dentro de una variable llamada $mi_array_string
$json_String = json_encode($mi_array_string);

// json_decode decodifica el json , suponer que nuestro JSON es un JSON_Array
// un array de datos, guardar en un array el resultado de decodificar el JSON.
$array = json_decode($json_String);

//se compone de JSON Objects y de JSON Arrays
echo '<hr> Genera un array <br>';
print_r($array);

echo '<br> Obtener un dato del array : ';
echo $array[0]->nombre_fruta;

echo '<hr>';

/**
 * Obtener los datos del JSON mediante un foreach
 */
foreach ($array as $obj) {
  $id_fruta = $obj->id_fruta;
  $nombre_fruta = $obj->nombre_fruta;
  $cantidad = $obj->cantidad;
  echo $id_fruta . " - " . $nombre_fruta . " - " . $cantidad;
  echo " <br> ";
}

echo '<hr>';

/**
 * Obtener los datos del JSON mediante un foreach
 */
for ($i = 0; $i < count($array); $i++) {
  $id_fruta1 = $array[$i]->id_fruta;
  $nombre_fruta1 = $array[$i]->nombre_fruta;
  $cantidad1 = $array[$i]->cantidad;
  echo $id_fruta1 . " - " . $nombre_fruta1 . " - " . $cantidad1;
  echo "<br>";
}


