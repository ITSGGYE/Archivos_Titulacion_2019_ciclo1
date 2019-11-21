<?php
include("conexion.php");
$conexion=conexion();



//$x_local=$_REQUEST['id_local'];
//echo $x_local."<br>";
//datos de los tipos
$x_id=$_REQUEST['id'];
$x_nombre=$_REQUEST['cantidad'];
$x_producto=$_REQUEST['producto'];

$stock_disponible="SELECT prod_id,
					pro_stock
					from producto
					WHERE prod_id='$x_producto'";
					
$sql_stock=mysqli_query($conexion,$stock_disponible);
$total_stock= mysqli_fetch_row($sql_stock);

//echo $stock_disponible;
			
if($total_stock[1]<$x_nombre){
echo	$resultado=0;
}
else{

$busquedap="SELECT orden_id,
    orden_cantidad
FROM orden
WHERE orden_id='$x_id';";
//echo $busquedap."<br>";
$sql_buscarp=mysqli_query($conexion,$busquedap);
$local= mysqli_fetch_row($sql_buscarp);
//echo $local[0];
$id_tipo=$local[0];
$nocolumna=mysqli_num_rows($sql_buscarp);


if(!$nocolumna==0){
$query="UPDATE orden
SET orden_cantidad='$x_nombre',
	orden_modificado=now()

WHERE orden_id='$id_tipo'";
}
//echo $query;

echo $resultado=mysqli_query($conexion,$query);

}


?>