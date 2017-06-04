<!--
    @Created on : 25-may-2017, 20:57:33
    @Author     : RVS - N.F.N.D - Home
    @Pag        :
    @version    :
    @TODO       :
-->
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title></title>
 </head>
 <body>

  <?php
  $json_array_asociativo_objetos = '{"a" : 1, "b" : 2 , "c" : 3 , "d" : 4 , "e" : 5 }';

  var_dump(json_decode($json_array_asociativo_objetos));

  echo '<br>';

  var_dump($json_array_asociativo_objetos, true);
  ?>
 </body>
</html>
