<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
 <head>
  <meta charset="UTF-8">
  <title <title>Example of JSON Format</title>    
 </head>
 <body>
  <h1>Ejemplo de Formato Json </h1>
  <?php
  $array = array(
      array(
          'id' => 5384,
          'post_title' => "Accordeon me con JQuery",
          'post_name' => "Accordeon-con-jquery",
          'reading' => 55140,
          'post_date' => "01-12-2012",
          'media' => 59.546436285097,
          'dias' => 926),
      array(
          'id' => 2509,
          'post_title' => "Popup me con jQuery",
          'post_name' => "popup-me-con-jquery",
          'reading' => 26261,
          'post_date' => "13-04-2012",
          'media' => 22.677892918826,
          'dias' => 926));

  $visits = json_decode(json_encode($array), true);

  foreach ($array as $f1) { // f1 TIENE TODOS LOS VALORES
      foreach ($f1 as $f2) { // f2 recorre hasta el final
          echo $f2;
          echo '<br>';
      }

      if ($f1['id'] == 5384) {
          echo '<b>El valor es : ' . $f1['id'] . '</b>';
          echo '<br>';
      } else {
          echo '<h3>Soy otra cosa : ' . $f1['id'] . '</h3>';
      }
  }

  echo '<hr>';
  var_dump($visits);

  echo '<hr>';
  var_dump($array);
  ?>



 </body>
</html>
