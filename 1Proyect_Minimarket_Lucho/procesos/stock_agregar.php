<?php
	session_start();
	require_once '../conexion/conexion.php';
	$db_conex= new conectar_bd();
	$conectando=$db_conex->conexion_bd();

	date_default_timezone_set('America/Guayaquil');
	$fecha= date("Y-m-d H:i:s");

	$productos= $conectando->real_escape_string($_POST["prd_select"]);
	$cantidad= $conectando->real_escape_string($_POST["cant_stock"]);
	$caducidad= $conectando->real_escape_string($_POST["f_Caducidad"]);
	$total=0;

	//$select_cost = "SELECT pd.prd_costcompra FROM productos pd";
	

	$insertar_stock = "INSERT INTO ingreso_stock VALUES(null, '$productos', '$cantidad', '$total', '$fecha', '$caducidad')";
	$resultado_stock = $conectando -> query($insertar_stock);

	if ($resultado_stock) {
		$actual_stock= "UPDATE productos p INNER JOIN ingreso_stock i ON p.prd_codigo = i.ing_prd_cod 
		SET p.prd_existencia = p.prd_existencia + '{$cantidad}' WHERE p.prd_codigo='{$productos}'";
		$actualiza= $conectando-> query($actual_stock);

		$cost_total = "UPDATE ingreso_stock i INNER JOIN productos pd ON pd.prd_codigo= i.ing_prd_cod  
		SET i.ing_total = pd.prd_costcompra * '{$cantidad}' WHERE pd.prd_codigo='{$productos}'";
		$ingreso= $conectando->query($cost_total);

		echo '<script type="text/javascript"> alert("Stock agregado con éxito"); window.location="../stock.php";</script>';
	} else{
		echo '<script type="text/javascript"> alert("Esta acción no fue realizada"); window.location="../stock.php";</script>';
	}

?>