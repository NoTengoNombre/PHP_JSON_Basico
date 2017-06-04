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
  $lang_array_basico = array('PHP', "Java", "JS", "HTML", "Perl", "NET");

  echo json_encode($lang_array_basico);
  echo "<br>";

  $lang_array_asociativo = array(array("php" => "PHP", "Java" => "JAVA", "HTML" => "html", "perl" => "PERL", "net" => "NET"));

  echo json_encode($lang_array_asociativo);

  echo "<br>";

//  Añadir directamente array ASOCIATIVO
  echo json_encode(
          array("PHP" => true,
              "JAVA" => true,
              "PERL" => false,
              "Basic" => null));
  ?>

 </body>
</html>
