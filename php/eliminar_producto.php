<?PHP
//include("inicio_sesion.php");
//session_start();
include("conexion.php");
$conexion=conexion();
session_start();
$x_id=$_REQUEST['id'];
$x_user=$_SESSION['usuario_mto'];
//echo $x_id;
$busquedap="SELECT prod_id,
    pro_nombre,
    pro_valor,
    pro_tipo,
    pro_foto,
    pro_descripcion,
    pro_visible
FROM producto
WHERE prod_id='".$x_id."';";

//echo $busquedap;


//echo $busquedap."<br>";
$sql_buscarp=mysqli_query($conexion,$busquedap);
$local= mysqli_fetch_row($sql_buscarp);
//echo $local[0];
$id_tipo=$local[0];

$nocolumna=mysqli_num_rows($sql_buscarp);
if($nocolumna!=0){

$query="UPDATE producto
    SET pro_visible='0',
	pro_actualizado=now(),
	pro_user='$x_user'
	WHERE prod_id=$x_id";
echo $resultado=mysqli_query($conexion,$query);
}
else{
	echo "<script>
	alert('Registro NO Existe');
		
	</script>";	}
//echo $query;

?>
