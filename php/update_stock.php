<?PHP
//include("inicio_sesion.php");
//session_start();
include("conexion.php");
$conexion=conexion();
session_start();
$x_user=$_SESSION['usuario_mto'];
$x_id=$_REQUEST['id'];
$x_nombre_prod=mysqli_real_escape_string($conexion,$_REQUEST['nombre']);
$x_stock_prod=mysqli_real_escape_string($conexion,$_REQUEST['stock']);



$busquedap="SELECT prod_id,
   pro_nombre,
    pro_valor,
    pro_tipo,
    pro_foto,
    pro_descripcion,
    pro_visible,
    pro_presentacion,
    pro_variedad,
    pro_peso,
    pro_creado,
	pro_stock,
    pro_actualizado
FROM producto
WHERE prod_id='".$x_id."';";


//echo $busquedap."<br>";
$sql_buscarp=mysqli_query($conexion,$busquedap);
$local= mysqli_fetch_row($sql_buscarp);
//echo $local[0];
$id_tipo=$local[0];
$total_actualizado=$local[11]+$x_stock_prod;
$nocolumna=mysqli_num_rows($sql_buscarp);
if($nocolumna!=0){
	

$query="UPDATE producto
	SET
	pro_stock='$total_actualizado',
   	pro_actualizado=now(),
	pro_user='$x_user'
	
   WHERE prod_id=$x_id";
   //echo "<br>".$query;
echo $resultado=mysqli_query($conexion,$query);

}
else{
	echo "<script>
	alert('Registro No Existe');
		
	</script>";	}
//echo $query;







?>
