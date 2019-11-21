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
$x_id=$_REQUEST['id'];
$x_nombre=strtoupper($_REQUEST['nombre']);
$x_editar=$_REQUEST['editar'];



if($x_id!="" || $x_id!=NULL){
$x_tipoprod=$_REQUEST['id'];
$var_sql="variedad_id=";
}else
{
$x_tipoprod=$_REQUEST['nombre'];
$var_sql="variedad_nombre=";
	}

$busquedap="SELECT variedad_id,
    variedad_nombre,
    variedad_creado,
    variedad_actualizado,
    variedad_status
FROM variedad
WHERE ".$var_sql."'$x_tipoprod';";
//echo $busquedap."<br>";
$sql_buscarp=mysqli_query($conexion,$busquedap);
$local= mysqli_fetch_row($sql_buscarp);
//echo $local[0];
$id_tipo=$local[0];

$nocolumna=mysqli_num_rows($sql_buscarp);
if(!$nocolumna==0){
$query="UPDATE variedad
SET variedad_nombre='$x_nombre',
	variedad_actualizado=now(),
	variedad_user='$x_user'

WHERE variedad_id='$id_tipo'";
}
else{

$query="INSERT INTO variedad(variedad_nombre,variedad_creado) VALUES('$x_nombre',now())";
}
//echo $query;

echo $resultado=mysqli_query($conexion,$query);


if($x_editar!='e'){
	if($resultado){

    //echo "si se isnerto";
	desconexion($conexion);
	
	
	echo "<script>
	alert('Grabacion Exitosa');
	window.opener.document.location.reload();
		window.close();
	</script>";	
	


	}else

	{
	 // echo "no se inserto";
	echo"<script>alert('Error en Guardar') ; window.location='../variedad.html';
	
</script>";
		}
}




?>