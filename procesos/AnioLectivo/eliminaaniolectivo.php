<?php
require_once "../../clases/conexion.php";
require_once "../../clases/Aniolectivo.php";

$id=$_POST['idanio'];
	$obj=new aniolectivo();
	echo $obj->eliminaaniolectivo($id);

 ?>