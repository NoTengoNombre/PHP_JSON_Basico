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

     class lang {

         public $java = "JAVA";
         public $php = "PHP";
         public $html = "HTML";
         public $js = "JAVASCRIPT";
         public $perl = "PERL";
         public $dates = "";

     }

     $lan = new lang();
     $lan->dates = new DateTime();
     
     echo 'ARRAY DE OBJETOS creado a partir de una CLASE BASICA ';
     echo '<br>';
     echo '<br>';
     echo json_encode($lan);
     
     ?>
 </body>
</html>
