<?PHP
//include("inicio_sesion.php");
//session_start();

include("conexion.php");
$conexion=conexion();
session_start();
$x_user=$_SESSION['usuario_mto'];


//$x_local=$_REQUEST['id_local'];
//echo $x_local."<br>";
//datos de los tipos
$x_tipoprod=$_REQUEST['id'];


$busquedap="SELECT variedad_id,
    variedad_nombre,
    variedad_creado,
    variedad_actualizado,
    variedad_status
FROM variedad
WHERE variedad_id='$x_tipoprod';";
//echo $busquedap."<br>";
$sql_buscarp=mysqli_query($conexion,$busquedap);
$local= mysqli_fetch_row($sql_buscarp);
//echo $local[0];
$id_tipo=$local[0];

$nocolumna=mysqli_num_rows($sql_buscarp);
if(!$nocolumna==0){
$query="UPDATE variedad
SET variedad_status='0',
	variedad_actualizado=now(),
	variedad_user='$x_user'

WHERE variedad_id='$x_tipoprod'";
}

//echo $query;

echo $resultado=mysqli_query($conexion,$query);





?>