<?php

include('conexion.php');
$conexion=conexion();
session_start();

$x_cedula=$_REQUEST['cedula'];
$x_pass=$_REQUEST['password'];
$x_user=$_REQUEST['usuario'];
$x_nombre=$_REQUEST['nombre'];
$x_apellido=$_REQUEST['apellido'];
$x_email=$_REQUEST['email'];
$consulta="SELECT id_ingreso,
    pass_ingreso,
    user_ingreso,
    nombre_ingreso,
    apellido_ingreso,
    cedula_ingreso,
    email_ingreso,
   status_ingreso
FROM ingreso_adm
WHERE cedula_ingreso='$x_cedula';";


//echo $consulta;


$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);

if($filas>0){
	echo("<h1 class='titulo_h1'> Usuario ya Existe</h1>
			");
}
else
{
$sql_insertar="INSERT ingreso_adm(
	pass_ingreso,
    user_ingreso,
    nombre_ingreso,
    apellido_ingreso,
    cedula_ingreso,
    email_ingreso,
   status_ingreso) VALUES (AES_ENCRYPT('$x_pass','clip23er'),'$x_user','$x_nombre','$x_apellido','$x_cedula','$x_email','1');";
   echo $sql_insertar;
 $insertar_reg=mysqli_query($conexion,$sql_insertar);
}
	if($insertar_reg==1){
		echo("<h1 class='titulo_h1'> Ingreso Existoso</h1>
			");
		echo "<script> window.location='../presentacion_pantallas.html';</script>";
	}
	else
	{
		 printf("Errormessage: %s\n", mysqli_error($insertar_reg));
		     echo "<script type='text/javascript'>";
	echo "alert('Error Ingreso')";
    echo "window.history.back(-1)";

    echo "</script>";
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
 </head>
 <body>
 </body>
</html>