<?php
session_start();
include("conexion.php");

$conexion=conexion();

$x_producto=$_REQUEST['id'];
$x_cedula=$_REQUEST['user'];
$x_cantidad=$_REQUEST['cantidad'];

$query_stock="SELECT prod_id,
		pro_stock
		FROM producto
		WHERE prod_id='$x_producto'" ;
//echo $query_stock;

$resultado=mysqli_query($conexion,$query_stock);
$filas=mysqli_num_rows($resultado);
$fila_user=mysqli_fetch_row($resultado);

if($fila_user[1]<$x_cantidad)
{
	
	echo "<script>
			alert('Cantidad solicitada es mayor de la disponibilidad');
			window.location.href='../detalle_productos.php?id=$x_producto';
			
			</script>";
}
else
{
	//Ingresar Orden a Carrito
		$sql_validar_insert="SELECT orden_id,
			orden_producto,
			orden_cedula,
			orden_cantidad,
			orden_creado,
			orden_modificado,
			orden_status
		FROM orden
		WHERE orden_producto='$x_producto' and orden_cedula='$x_cedula'
		;";
		$query_insert=mysqli_query($conexion,$sql_validar_insert);
		$fila_insert=mysqli_num_rows($query_insert);
		
		if($fila_insert==0){
		$sql_carrito="INSERT INTO orden(orden_producto,orden_cedula,orden_cantidad,orden_creado,orden_status) VALUES ('$x_producto','$x_cedula','$x_cantidad',now(),'1')";
		
		//echo $sql_carrito;
		//DAtps del producto
		}
		else {
			$sql_carrito="UPDATE orden
						 SET	orden_cantidad='$x_cantidad',
								orden_modificado=now()
						WHERE 	orden_cedula='$x_cedula'
						AND		orden_producto='$x_producto'";
		}
	//	echo $sql_carrito;
		$query_carrito=mysqli_query($conexion,$sql_carrito);
		echo "<script>
			window.location.href='../carrito.php';
			</script>";
		
	
	}
	
?>