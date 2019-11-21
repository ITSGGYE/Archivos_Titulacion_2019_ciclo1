<?php
session_start();
include("conexion.php");
$conexion=conexion();
$x_cedula=mysqli_real_escape_string($conexion,$_REQUEST['cedula']);
$x_nombre=mysqli_real_escape_string($conexion,strtoupper($_REQUEST['nombre']));
$x_apellido=mysqli_real_escape_string($conexion,strtoupper($_REQUEST['apellido']));
$x_direccion=mysqli_real_escape_string($conexion,strtoupper($_REQUEST['direccion']));
$x_correo=mysqli_real_escape_string($conexion,strtoupper($_REQUEST['correo']));
$x_celular=mysqli_real_escape_string($conexion,$_REQUEST['celular']);
$x_telefono=mysqli_real_escape_string($conexion,$_REQUEST['telefono']);
$x_user=mysqli_real_escape_string($conexion,$_REQUEST['nombre']);
$x_password=mysqli_real_escape_string($conexion,$_REQUEST['password']);


$consulta="SELECT usu_cedula,
    usu_nombre,
    	usu_apellido,
    	usu_email,
    	usu_direccion,
    	usu_telefcel,
    	usu_telefcon,
    	usu_creado,
    	usu_modificado,
    	usu_status,
    	usu_password,
    	usu_usuario
FROM 	usuario
WHERE usu_cedula='$x_cedula'
";
//CAST(AES_DECRYPT(usu_password,'llave') AS CHAR) AS content

//echo $consulta;
//$_SESSION['usuario']=$x_user;

$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);


if($filas>0){
		echo("<h1 class='titulo_h1' style='margin-top:100px;'> Usuario ya Existe</h1>
			");
		echo "<script>
		 
			function r() { location.href='../catalogo.php'} 
			setTimeout ('r()', 3000);
		 
		 </script>";
	
	}
else
{
	$consulta_email="SELECT usu_cedula,
    usu_nombre,
    	usu_apellido,
    	usu_email,
    	usu_direccion,
    	usu_telefcel,
    	usu_telefcon,
    	usu_creado,
    	usu_modificado,
    	usu_status,
    	usu_password,
    	usu_usuario
FROM 	usuario
WHERE usu_email='$x_correo'
";
	$resultado_email=mysqli_query($conexion,$consulta_email);
	$filas_mail=mysqli_num_rows($resultado_mail);	
	if($filas_mail==0){
	$query="INSERT INTO usuario
		(usu_cedula,
    	usu_nombre,
    	usu_apellido,
    	usu_email,
    	usu_direccion,
    	usu_telefcel,
    	usu_telefcon,
    	usu_creado,
    	usu_status,
    	usu_password,
    	usu_usuario)
		 VALUES('$x_cedula','$x_nombre','$x_apellido','$x_correo','$x_direccion','$x_celular','$x_telefono',now(),'1',AES_ENCRYPT('$x_password','llave'),'$x_user')";
		// echo $query;
	$resultado=mysqli_query($conexion,$query);
	
	
	echo("<h1 class='titulo_h1'> Ingreso Existoso</h1>
			");
	echo "<script> window.location='../catalogo.php';</script>";
	}
	else
	{
		echo("<h1 class='titulo_h1'> Correo Electronico ya existe para otro usuario.</h1>
			");
	echo "<script> window.location='../catalogo.php';</script>";
	}
	mysqli_free_result($resultado);
}

desconexion($conexion);

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