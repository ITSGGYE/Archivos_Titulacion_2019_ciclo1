<?PHP
//include("inicio_sesion.php");
session_start();
include("conexion.php");
$conexion=conexion();

$x_user=$_SESSION['usuario_mto'];
$x_id=$_REQUEST['id'];
$x_nombre_prod=mysqli_real_escape_string($conexion,$_REQUEST['nproducto']);
$x_precio_prod=mysqli_real_escape_string($conexion,$_REQUEST['precio']);
$x_tipoprod=mysqli_real_escape_string($conexion,$_REQUEST['tipo']);
$x_descripcion=mysqli_real_escape_string($conexion,$_REQUEST['descripcion']);
$x_presentacion=mysqli_real_escape_string($conexion,$_REQUEST['presentacion']);
$x_variedad=mysqli_real_escape_string($conexion,$_REQUEST['variedad']);
$x_peso=mysqli_real_escape_string($conexion,$_REQUEST['peso']);


//echo($x_descripcion)."<br>";
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
WHERE prod_id='".$x_id."';";

//Datos de la Foto del producto a promocionar.

if($x_tamanio<=30000000){

	if($x_tipof=="image/jpeg" || $x_tipof=="image/jpg" || $x_tipof=="image/png" || $x_tipof=="image/gif")

	{

		//ruta de la carpeta servidor
		//Carpeta local
		//$x_destino=$_SERVER['DOCUMENT_ROOT']."/langoquil/images/producto/";
		//Carpeta servidor
		$x_destino=$_SERVER['DOCUMENT_ROOT']."/images/producto/";

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


//echo $busquedap."<br>";
$sql_buscarp=mysqli_query($conexion,$busquedap);
$local= mysqli_fetch_row($sql_buscarp);
//echo $local[0];
$id_tipo=$local[0];

$nocolumna=mysqli_num_rows($sql_buscarp);
if($nocolumna!=0){
	
if($foto=="" || $foto==null)
{
	$foto=$local[4];
	}

if($x_descripcion=="" || $x_descripcion==null)
{
	$x_descripcion=$local[5];
	}

$query="UPDATE producto
	SET
	pro_nombre='$x_nombre_prod',
    pro_valor='$x_precio_prod',
    pro_tipo='$x_tipoprod',
   pro_foto='$foto',
    pro_descripcion='$x_descripcion',
	pro_presentacion='$x_presentacion',
    pro_variedad='$x_variedad',
    pro_peso='$x_peso',
   	pro_actualizado=now(),
	pro_user='$x_user'
	
   WHERE prod_id=$x_id";
$resultado=mysqli_query($conexion,$query);
}
else{
	echo "<script>
	alert('Registro No Existe');
		
	</script>";	}
//echo $query;



if($resultado){

    //echo "si se isnerto";
	desconexion($conexion);
	
	echo("<h1 class='titulo_h1' style='margin-top:100px;'> Ingreso Exitoso</h1>
			");
		echo "<script>
		 
			function r() { location.href='../lista_edicion_tprod.php'} 
			setTimeout ('r()', 3000);
		 
		 </script>";
	

}else

{

  //echo "no se inserto";
echo"<script>alert('Error en Guardar') ; window.location='../lista_edicion_tprod.php';</script>";

}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="../css/style.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="http://yui.yahooapis.com/2.9.0/build/reset/reset-min.css">
 <link rel="stylesheet" href="../css/stylesheet.css">
  <link rel="stylesheet" href="alertifyjs/css/alertify.css" />
    <link rel="stylesheet" href="alertifyjs/css/themes/default.css" />
 <script src="alertifyjs/alertify.js"></script>
 </head>
 <body>
 </body>
</html>