<?PHP
//include("inicio_sesion.php");
//session_start();
session_start();
include("conexion.php");
$conexion=conexion();

$x_user=$_SESSION['usuario_mto'];
$x_id=$_REQUEST['id'];
$x_nombre=strtoupper($_REQUEST['nombre']);
$x_url=$_REQUEST['url_video'];

//echo $x_url;

if($x_id!="" || $x_id!=NULL){
$x_tipoprod=$_REQUEST['id'];
$var_sql="video_id=";
}else
{
$x_tipoprod=$_REQUEST['nombre'];
$var_sql="video_titulo=";
	}

$busquedap="SELECT video_id,
   video_titulo,
    video_url,
    video_actualizado,
	video_creado,
	video_status
FROM video
WHERE ".$var_sql."'$x_tipoprod';";
//echo $busquedap."<br>";
$sql_buscarp=mysqli_query($conexion,$busquedap);
$local= mysqli_fetch_row($sql_buscarp);
//echo $local[0];
$id_tipo=$local[0];

$nocolumna=mysqli_num_rows($sql_buscarp);
if(!$nocolumna==0){

$query="UPDATE video
SET video_titulo='$x_nombre',
	video_url='$x_url',
	video_actualizado=now(),
	video_user='$x_user'

WHERE video_id='$id_tipo'";
}
else{

$query="INSERT INTO video(video_titulo,video_url,video_creado,video_user) VALUES('$x_nombre','$x_url',now(),'$x_user')";
}
//echo $query;

echo $resultado=mysqli_query($conexion,$query);





?>