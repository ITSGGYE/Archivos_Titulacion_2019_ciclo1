<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysqli_query($conexion,"SELECT * FROM proveedor WHERE id_proveedor = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
				0 => $valores2['nombre_proveedor'], 
				1 => $valores2['direccion'], 
			    2 => $valores2['telefono'], 
				3 => $valores2['email'], 
				); 
echo json_encode($datos);
?>