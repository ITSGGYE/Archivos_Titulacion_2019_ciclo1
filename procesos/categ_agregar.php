<?php
session_start();

require_once '../conexion/conexion.php';
$db_conex= new conectar_bd();
$conectando=$db_conex->conexion_bd();
date_default_timezone_set('America/Guayaquil');

$fecha= date("Y-m-d H:i:s");
$catego=$conectando->real_escape_string($_POST['nomb_categ']);

$insertar_categorias = "INSERT INTO categorias(cat_nombre,cat_fcaptura) VALUES('$catego','$fecha')";
$resultado_insertar = $conectando -> query($insertar_categorias);

if ($resultado_insertar) {
	echo '<script type="text/javascript"> alert("Categoria agregada con éxito"); window.location="../categorias.php";</script>';
} else{
	echo '<script type="text/javascript"> alert("Esta acción no fue realizada"); window.location="../categorias.php";</script>';
}

?>