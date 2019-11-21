<?php 
	session_start();
	require_once '../conexion/conexion.php';
	$db_conex= new conectar_bd();
	$conectando=$db_conex->conexion_bd();

	$descripcion =$conectando->real_escape_string($_POST['desc_producto']);
	$presentacion = $conectando->real_escape_string($_POST['present_select']);
	$marca = $conectando->real_escape_string($_POST['marca_producto']);
	$categorias =$conectando->real_escape_string($_POST['cat_select']);
	$provee= $conectando->real_escape_string($_POST['proveed_select']);
	$cost_comp = $conectando->real_escape_string($_POST['costo_compra']);
	$cost_vta = $conectando->real_escape_string($_POST['costo_venta']);
	$existencia=0;
	
	$insertar_productos = "INSERT INTO productos VALUES(NULL,'$descripcion', '$presentacion', '$marca', '$categorias', '$provee', 
						'$existencia', '$cost_comp', '$cost_vta')";
	$resultado_insertar = $conectando->query($insertar_productos);

	if ($resultado_insertar) {
		echo '<script type="text/javascript"> alert("Producto agregado con éxito"); window.location="../productos.php";</script>';
	} else{
		echo '<script type="text/javascript"> alert("Esta acción no fue realizada"); window.location="../productos.php";</script>';
	}
 ?>
