<?PHP
//include("inicio_sesion.php");
//session_start();

include("conexion.php");
$conexion=conexion();



//$x_local=$_REQUEST['id_local'];
//echo $x_local."<br>";
//datos de los tipos
$x_tipoprod=$_REQUEST['id'];


$busquedap="SELECT video_id,
   video_titulo,
    video_url,
    video_actualizado,
	video_creado,
	video_status
FROM video
WHERE video_id='$x_tipoprod';";
//echo $busquedap."<br>";
$sql_buscarp=mysqli_query($conexion,$busquedap);
$local= mysqli_fetch_row($sql_buscarp);
//echo $local[0];
$id_tipo=$local[0];

$nocolumna=mysqli_num_rows($sql_buscarp);
if(!$nocolumna==0){
$query="DELETE FROM video
WHERE video_id='$x_tipoprod'";
}

//echo $query;

echo $resultado=mysqli_query($conexion,$query);





?>