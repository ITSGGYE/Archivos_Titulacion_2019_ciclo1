<?PHP
//include("inicio_sesion.php");
session_start();
include("conexion.php");
$conexion=conexion();

$x_user=$_SESSION['usuario_mto'];

	
//echo $_SESSION['usuario_mto'];

//$x_local=$_REQUEST['id_local'];
//echo $x_local."<br>";
//datos de los tipos
$x_id=$_REQUEST['id'];
$x_nombre=strtoupper($_REQUEST['nombre']);
$x_editar=$_REQUEST['editar'];
//echo($x_descripcion)."<br>";
$foto=$_FILES['imagen']['name'];
//echo $foto."<br>";
$x_ruta=$_FILES['imagen']['tmp_name'];
//echo $x_ruta."<br>";
$x_tamanio=$_FILES['imagen']['size'];
//echo $x_tamanio."<br>";
$x_tipof=$_FILES['imagen']['type'];

if($x_id!="" || $x_id!=NULL){
$x_tipoprod=$_REQUEST['id'];
$var_sql="tipo_pro_id=";
}else
{
$x_tipoprod=$_REQUEST['nombre'];
$var_sql="tipo_pro_nombre=";
	}
//subir imagen del tipo de producto
//Datos de la Foto del producto a promocionar.

if($x_tamanio<=30000000){

	if($x_tipof=="image/jpeg" || $x_tipof=="image/jpg" || $x_tipof=="image/png" || $x_tipof=="image/gif")

	{

		//ruta de la carpeta servidor

		//$x_destino=$_SERVER['DOCUMENT_ROOT']."/langoquil/images/";
$x_destino=$_SERVER['DOCUMENT_ROOT']."/images/";

	//	echo $x_destino,"<br>";

		//mover el archivo elegido a la carpeta servidor

		move_uploaded_file($_FILES['imagen']['tmp_name'],$x_destino.$foto);
		chmod($x_destino.$foto,0777);
		}
	

	else{
		if($x_tipof!=""){
		echo "Solo se pueden ignresar JPEG,JPG,GIF,PNP";
		}
		}

}else

{

	echo "El tamaño de la imagen exede los limites permitidos";

}


//fin de procedimiento


$busquedap="SELECT tipo_pro_id,
    tipo_pro_nombre
FROM tipo_producto 
WHERE ".$var_sql."'$x_tipoprod'
order by tipo_pro_nombre ASC;";

//echo $busquedap."<br>";
$sql_buscarp=mysqli_query($conexion,$busquedap);
$local= mysqli_fetch_row($sql_buscarp);
//echo $local[0];
$id_tipo=$local[0];
//echo $foto;
$nocolumna=mysqli_num_rows($sql_buscarp);
if(!$nocolumna==0){
$query="UPDATE tipo_producto
SET tipo_pro_nombre='$x_nombre',
tipo_user='$x_user',
tipo_img='$foto'

WHERE tipo_pro_id='$id_tipo'";
}
else{

$query="INSERT INTO tipo_producto(tipo_pro_nombre,tipo_img) VALUES('$x_nombre','$foto')";
}
//echo $query;

echo $resultado=mysqli_query($conexion,$query);


if($x_editar!="e"){
if($resultado){

    //echo "si se isnerto";
	desconexion($conexion);
	/*echo "<script>
	alert('Grabacion Exitosa');
	window.opener.document.location.reload()
		window.close();
	</script>";	
*/

}else

{

   echo "no se inserto";
echo"<script>alert('Error en Guardar') ; window.location='../emergente.html';</script>";

}
}



?>