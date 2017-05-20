<?php

/**
 * 
 * @return type
 */
function connectDB() {
  $conexion = mysqli_connect('localhost', 'root', '', 'ciproyecto2');

  if ($conexion == true) {
    echo 'La conexion bd se ha hecho satisfactoriamente';
  } else {
    echo 'Ha sucedido un error';
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

  while ($row = mysqli_fecth_array($result)) {
    $rawdata[$i] = $row;
    $i++;
  }

  /**
   * desconectamos la bd
   */
  disconnectDB($conexion);
  return $rawdata;
}

function ver_elementos_array($rawdata) {
  echo $rawdata[1][2];
}
