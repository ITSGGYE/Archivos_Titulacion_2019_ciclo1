<?php
session_start(); 
require_once ("../conexion/conexion.php");
$codigo=$_REQUEST["id"];
$db_conex= new conectar_bd();
$conectando=$db_conex->conexion_bd();

$nomb_categ=$conectando->real_escape_string($_POST["nomb_categ"]);

$actualizar_categoria="UPDATE categorias SET cat_nombre='$nomb_categ' WHERE cat_codigo='$codigo'";
$resultado_categoria= $conectando->query($actualizar_categoria);

if ($resultado_categoria) {
	echo '<script type="text/javascript"> alert("Categoria actualizada con éxito"); window.location="../datos_categ.php";</script>';
} else{
	echo '<script type="text/javascript"> alert("Esta acción no fue realizada"); window.location="../datos_categ.php";</script>';
}
?>