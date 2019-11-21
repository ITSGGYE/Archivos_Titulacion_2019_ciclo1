<?PHP
//include("inicio_sesion.php");
//session_start();

include("conexion.php");
include("encripdecrip.php");
$conexion=conexion();



//$x_local=$_REQUEST['id_local'];
//echo $x_local."<br>";
//datos de los tipos
$x_id=$desencriptar($_REQUEST['id']);
$x_cedula=$desencriptar($_REQUEST['cedula']);


$busquedap="SELECT *
FROM compras
where compra_id_user='$x_cedula'
;";
//echo $busquedap."<br>";
$sql_buscarp=mysqli_query($conexion,$busquedap);
$local= mysqli_fetch_row($sql_buscarp);
//echo $local[0];
$id_tipo=$local[0];

$nocolumna=mysqli_num_rows($sql_buscarp);
if(!$nocolumna==0){
	
$query_prod="DELETE FROM detalle_compras
WHERE detalle_num_compra_detalle='$x_id'";
$resultado_detalle=mysqli_query($conexion,$query_prod);	
$query="DELETE FROM compras
WHERE compra_id_user='$x_cedula' and compra_num_compra='$x_id'";
$resultado=mysqli_query($conexion,$query);

}

//echo $query;
//echo "<br>".$query_prod;



echo"<script>
	alert ('Eliminacion Exitosa');
window.location='../lista_atencion_pedidos.php';</script>";




?>