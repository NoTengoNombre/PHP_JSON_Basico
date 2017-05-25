<?php
$info=json_decode($info,true);


foreach ($info as $info){
	echo $info["titulo"];
	echo "----";
	echo $info["id_documento"];
	echo "----";
	echo $info["nombre_archivo"];
	echo "----";
	echo $info["estado"];
	echo "----";
	echo $info["fecha_creacion"];
	echo "----";
	echo $info["fecha_impresion"];
	echo "----";
	echo $info["id_archivo"];
	echo "----";
	echo $info["notas"];
	echo "<br>";
}

?>