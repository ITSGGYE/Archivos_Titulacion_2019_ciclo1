<?php
	session_start();
	require_once '../conexion/conexion.php';
	$db_conex= new conectar_bd();
	$conectando=$db_conex->conexion_bd();

	date_default_timezone_set('America/Guayaquil');
	$fecha= date("Y-m-d H:i:s");

	$productos= $conectando->real_escape_string($_POST["prd_select"]);
	$cantidad= $conectando->real_escape_string($_POST["cant_vta"]);
	$precios=0;

    $selec_stock= "SELECT prd_existencia FROM productos WHERE prd_codigo='{$productos}'";
    $respuesta_stock= $conectando->query($selec_stock);
    list($stock)= mysqli_fetch_array($respuesta_stock);
    
    if ($stock < $cantidad) {
        echo '<script type="text/javascript"> alert("La cantidad es superior a lo que hay inventario"); window.location="../ventas.php" 
        </script>';
    } else{
        $insertar_venta = "INSERT INTO ventas VALUES(null, '$productos', '$cantidad', '$precios', '$fecha')";
        $respuesta_venta = $conectando -> query($insertar_venta);

        if ($respuesta_venta) {
            //Actualiza la cantidad respectiva al stock en la tb_productos restando con la cantidad ingresada
            $actual_stock= "UPDATE productos p INNER JOIN ventas v ON p.prd_codigo = v.vta_prd_cod 
            SET p.prd_existencia = p.prd_existencia - '{$cantidad}' WHERE p.prd_codigo = '{$productos}'";
            $conectando-> query($actual_stock); 

            //Calcula el valor total mediante la multiplicacion del producto con la cantidad ingresada 
            $cost_total = "UPDATE ventas vt INNER JOIN productos pd ON pd.prd_codigo= vt.vta_prd_cod  
            SET vt.vta_total = pd.prd_costventa * '{$cantidad}' WHERE pd.prd_codigo='{$productos}'";
            $ingreso= $conectando->query($cost_total);
        } else{
            echo '<script type="text/javascript"> alert("Esta acción no fue realizada"); window.location="../ventas.php";</script>';
        }
       echo '<script type="text/javascript"> alert("Venta agregado con éxito"); window.location="../ventas.php";</script>';
    } 
?>