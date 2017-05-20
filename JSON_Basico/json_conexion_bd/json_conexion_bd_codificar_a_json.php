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

    $rawdata[$i] = $row;

    $i++;
  }
  /**
   * desconectamos la bd
   */
  disconnectDB($conexion);
  return $rawdata; //devuelve Array
}

/**
 * 
 * @param type $rawdata
 */
function ver_elementos_array($rawdata) {

  echo '- Filas totales : ' . count($rawdata) . '<br>';

  echo '<hr>';

  for ($i = 0; $i < count($rawdata); $i++) {
    for ($j = 0; $j < count($rawdata); $j++) {
      echo ' - ' . $rawdata[$i][$j];
    }
    echo '<br>';
  }
}

$mi_array_string = getArraySQL($sql);
echo '<br>';
ver_elementos_array($mi_array_string);
echo '<br>' . '<hr>';
echo json_encode($mi_array_string);

echo '<hr>';
