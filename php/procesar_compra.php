<?php
session_start();
include("conexion.php");
$conexion=conexion();


$x_compra_num_compra=$_REQUEST['compra_num_compra'];
$x_compra_pago_total=$_REQUEST['compra_pago_total'];
$x_compra_id_user=$_REQUEST['compra_id_user'];
$x_cedula=$_SESSION['cedula'];

$sql_compro="INSERT INTO compras(compra_num_compra,compra_pago_total,compra_id_user,compra_fech_compra,compra_procesado) VALUES ('$x_compra_num_compra','$x_compra_pago_total','$x_compra_id_user',now(),'1')";
//echo $sql_compro;
$query_compra=mysqli_query($conexion,$sql_compro);

$sql_usuario="SELECT usu_email,usu_nombre,usu_apellido FROM usuario where usu_cedula='$x_cedula'";
$query_usuario=mysqli_query($conexion,$sql_usuario);
$x_email=mysqli_fetch_row($query_usuario);
$email=strtolower($x_email[0]);
/*
if($query_compra==1){
	echo "ingrreso correcto";
}else
{
	echo "ingreso fallido";}*/


/*INSERTAR DETALLE COMPRAS

echo $x_detalle_id_prod_compra=$_POST['detalle_id_prod_compra']."<br>";
echo $x_detalle_num_compra_detalle=$_POST['detalle_num_compra_detalle']."<br>";
echo $x_detalle_cant_prod_compra=$_POST['detalle_cant_prod_compra']."<br>";*/


$ban=0;
for($i=0;$i<count($_POST['detalle_subtotal_compra']);$i++)
{
//echo "<br> Contador:".$i;
$x_detalle_subtotal_compra= $_POST['detalle_subtotal_compra'][$i];
$x_detalle_id_prod_compra=$_POST['detalle_id_prod_compra'][$i];
$x_detalle_num_compra_detalle=$_POST['detalle_num_compra_detalle'][$i];
$x_detalle_cant_prod_compra=$_POST['detalle_cant_prod_compra'][$i];

$sql_carrito="INSERT INTO detalle_compras(detalle_id_prod_compra,detalle_num_compra_detalle,detalle_cant_prod_compra,detalle_subtotal_compra,detalle_creado) VALUES ('$x_detalle_id_prod_compra','$x_detalle_num_compra_detalle','$x_detalle_cant_prod_compra','$x_detalle_subtotal_compra',now())";

//echo $sql_carrito;
$query_carrito=mysqli_query($conexion,$sql_carrito);

//$sesion_usuario=$_SESSION['cedula'];
$sql_borrar_carrito="DELETE FROM orden
					where orden_producto='$x_detalle_id_prod_compra' and orden_cedula='$x_compra_id_user'";
$query_borrar_carrito=mysqli_query($conexion,$sql_borrar_carrito);

//echo $sql_borrar_carrito;
if($query_borrar_carrito==1)
	{$ban=1;
		}
else
{
	$ban=0;}

}

if($ban==1){
	echo("<h1 class='titulo_h1' style='margin-top:100px;'> Ingreso Exitoso</h1>
			");
			
 	include('enviarmailhtml.php');
 
		echo "<script>
		 
			function r() { location.href='../index.html'} 
			setTimeout ('r()', 2000);
		 
		 </script>";
//envio de mail
 $para="$email";
 $titulo="Envio de productos Langoquil";
 $mensaje='<html>'.
	'<head>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<title>Pedido de Productos</title>
	</head>'.
	'<body><h1>Pedido de Langoquil</h1>'.
	'<div class="container">'.
  	'	<div class="row">'.
    	'	<div class="col-md-4">'.
  		'		<img src="http://langoquils.000webhostapp.com/images/logo.png" longdesc="http://langoquils.000webhostapp.com/images/logo.png" width="20%">'.
          '   </div>'.
		  '<div class="col-md-8">
            <h1>Confirmacion de Pedido</h1>
            </div>'.
			' <div class="row">
        <div class="col-lg-12 text-center">'.
		'<h2> Estimado(a):'.$x_email[1]." ".$x_email[2].'<h2.<br>'.
        '	<h2> Su pedido ha sido enviado a nuestro departamendo de entrega. Nos comunicaremos con ustedes para confirmar el envio.</h2>
            <p>En caso de alguna duda, puede comunicarse a nuestros telefonos: (+593)4-2757199 </p>
			<p>Gerencia de Langoquil S.A.</p>
        </div>
        </div>'.
        '</div></div> </body></html>';
$cabeceras = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabeceras .= 'From: Departamento Ventas<langoquil@gmail.com>';

//Preparamos el mensaje a enviar
enviomailhtml($para, $titulo, $mensaje, $cabeceras);

//fin de envio de mail
//mail para ventas
$para="giovy_27@hotmail.com";
 $titulo="Pedido de productos Langoquil";
 $mensaje='<html>'.
	'<head>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<title>Pedido de Productos</title>
	</head>'.
	'<body><h1>Pedido de Langoquil</h1>'.
	'<p> Un nuevo pedido se ha solicitado. Revisar listado de ventas</p>';
$cabeceras = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabeceras .= 'From: Departamento Ventas<langoquil@gmail.com>';
enviomailhtml($para, $titulo, $mensaje, $cabeceras);




}else
{

	echo("<h1 class='titulo_h1' style='margin-top:100px;'> No se realizo la compra exitosamente</h1>
			");
		echo "<script>
		 
			function r() { location.href='../detalle_carrito.php'} 
			setTimeout ('r()', 2000);
		 
		 </script>";
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