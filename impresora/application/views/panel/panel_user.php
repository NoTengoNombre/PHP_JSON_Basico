<?php

echo "AQUI IRIAN LOS DOS BOTONES A ELEGIR";
$session=$this->session->get_userdata();
echo "<br>Bienvenido " .$session['nombreusr'];
?>

<br>
<a href="<?php echo site_url('controlador_documentos/subir_documentos')?>">Subir</a>

<a href="<?php echo site_url('controlador_documentos/ver_documentos')?>">Ver</a>