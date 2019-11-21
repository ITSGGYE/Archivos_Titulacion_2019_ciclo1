<?PHP
//include("inicio_sesion.php");
//session_start();
session_start();
include("conexion.php");

$conexion=conexion();
$x_user=$_SESSION['usuario_mto'];
$x_nombre_prod=mysqli_real_escape_string($conexion,$_REQUEST['nproducto']);
$x_precio_prod=mysqli_real_escape_string($conexion,$_REQUEST['precio']);
$x_tipoprod=$_REQUEST['tipo'];
$x_descripcion=mysqli_real_escape_string($conexion,$_REQUEST['descripcion']);
$x_variedad=mysqli_real_escape_string($conexion,$_REQUEST['variedad']);
$x_peso=mysqli_real_escape_string($conexion,$_REQUEST['peso']);
$x_presentacion=mysqli_real_escape_string($conexion,$_REQUEST['presentacion']);
$foto=$_FILES['imagen']['name'];
//echo $foto."<br>";
$x_ruta=$_FILES['imagen']['tmp_name'];
//echo $x_ruta."<br>";
$x_tamanio=$_FILES['imagen']['size'];
//echo $x_tamanio."<br>";
$x_tipof=$_FILES['imagen']['type'];

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
    pro_actualizado
FROM producto
WHERE pro_nombre='".$x_nombre_prod."';";

//Datos de la Foto del producto a promocionar.

if($x_tamanio<=30000000){

	if($x_tipof=="image/jpeg" || $x_tipof=="image/jpg" || $x_tipof=="image/png" || $x_tipof=="image/gif")

	{

		//ruta de la carpeta servidor

		$x_destino=$_SERVER['DOCUMENT_ROOT']."/langoquil/images/producto/";
//$x_destino=$_SERVER['DOCUMENT_ROOT']."/images/producto/";

		//echo $x_destino,"<br>";

		//mover el archivo elegido a la carpeta servidor

		move_uploaded_file($_FILES['imagen']['tmp_name'],$x_destino.$foto);
		chmod($x_destino.$foto,0777);
		}
	

	else{

		echo "Solo se pueden ignresar JPEG,JPG,GIF,PNP";

		}

}else

{

	echo "El tamaño de la imagen exede los limites permitidos";

}


//echo $busquedap."<br>";
$sql_buscarp=mysqli_query($conexion,$busquedap);
$local= mysqli_fetch_row($sql_buscarp);
//echo $local[0];
$id_tipo=$local[0];

$nocolumna=mysqli_num_rows($sql_buscarp);
if($nocolumna==0){

$query="INSERT INTO producto(pro_nombre,
    pro_valor,
    pro_tipo,
    pro_foto,
    pro_descripcion,
    pro_visible,
    pro_presentacion,
    pro_variedad,
    pro_peso,
    pro_creado,
	pro-user) VALUES('$x_nombre_prod','$x_precio_prod','$x_tipoprod','$foto','$x_descripcion','1','$x_presentacion','$x_variedad','$x_peso','now()','$x_user')";
$resultado=mysqli_query($conexion,$query);
}
else{
	echo "<script>
	alert('Registro ya Existe');
		
	</script>";	}
//echo $query;


if($resultado){

    //echo "si se isnerto";
	desconexion($conexion);
	
	echo "<script>alert('Grabacion Correcta') ; window.location='../lista_edicion_tprod.php';</script>";
	

}else

{

  // echo "no se inserto";
echo"<script>alert('Error en Guardar') ; window.location='../lista_edicion_tprod.php';</script>";

}

?>