<?php
session_start();
require_once ("../conexion/conexion.php");
$codigo=$_REQUEST["id"];
$db_conex= new conectar_bd();
$conectando=$db_conex->conexion_bd();


$eliminar_categoria="DELETE FROM categorias WHERE cat_codigo='$codigo'";
$resultado_categoria= $conectando->query($eliminar_categoria);

if ($resultado_categoria) {
	echo '<script type="text/javascript"> alert("Categoria eliminada con éxito"); window.location="../datos_categ.php";</script>';
} else{
	echo '<script type="text/javascript"> alert("Esta acción no fue realizada"); window.location="../datos_categ.php";</script>';
}
?>
?>