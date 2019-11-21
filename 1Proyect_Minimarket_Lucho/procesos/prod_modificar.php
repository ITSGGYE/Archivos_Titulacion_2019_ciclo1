<?php
	session_start(); 
	require_once ("../conexion/conexion.php");
	$codigo=$_REQUEST["id"];
	$db_conex= new conectar_bd();
	$conectando=$db_conex->conexion_bd();

	$descripcion =$conectando->real_escape_string($_POST['desc_producto']);
	$presentacion = $conectando->real_escape_string($_POST['present_select']);
	$marca = $conectando->real_escape_string($_POST['marca_producto']);
	$categorias =$conectando->real_escape_string($_POST['cat_select']);
	$provee= $conectando->real_escape_string($_POST['proveed_select']);
	$prec_compra = $conectando->real_escape_string($_POST['costo_compra']);
	$prec_venta = $conectando->real_escape_string($_POST['costo_venta']);


	$actualizar_productos="UPDATE productos SET prd_descripcion='$descripcion', prd_presentacion='$presentacion', prd_marca='$marca', prd_cat_cod='$categorias', prd_prv_cod='$provee', prd_costcompra='$prec_compra', prd_costventa='$prec_venta' WHERE prd_codigo='$codigo'";

	$respuesta_productos= $conectando->query($actualizar_productos);

	if ($respuesta_productos) {
		echo '<script type="text/javascript"> alert("Producto actualizado con éxito"); window.location="../datos_prod.php";</script>';
	} else{
		echo '<script type="text/javascript"> alert("Esta acción no fue realizada"); window.location="../datos_prod.php";</script>';
	}
?>