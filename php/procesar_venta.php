<?php
session_start();
include("conexion.php");
$conexion=conexion();

$x_user=$_SESSION['usuario_mto'];
$x_compra_num_compra=$_REQUEST['id_venta'];


$sql_compro="UPDATE compras
			SET compra_procesado='0',
				compra_user='$x_user',
				compra_actualizacion=now()
			where compra_num_compra='$x_compra_num_compra'";
$query_compra=mysqli_query($conexion,$sql_compro);


$x_cedula=$_REQUEST['cedula'];
$sql_usuario="SELECT usu_email,usu_nombre,usu_apellido FROM usuario where usu_cedula='$x_cedula'";
$query_usuario=mysqli_query($conexion,$sql_usuario);
$x_email=mysqli_fetch_row($query_usuario);
$email=strtolower($x_email[0]);
$usuario=$x_email[1]." " .$x_email[2];


if($query_compra==1){
	echo("<h1 class='titulo_h1' style='margin-top:100px;'> Ingreso Exitoso</h1>
			");
		
		echo "<script>
		 
			function r() { location.href='../lista_atencion_pedidos.php'} 
			setTimeout ('r()', 2000);
		 
		 </script>";
		$para="$email";
$titulo="Envio de productos Langoquil";
$mensaje='<html>'.
	'<head>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<title>Procesar Compra</title>
	</head>'.
	'<body><h1>Compra de Productos Langoquil S.A.</h1>'.
	'<div class="container">'.
  	'	<div class="row">'.
    	'	<div class="col-md-4">'.
  		'		<img src="http://langoquils.000webhostapp.com/images/logo.png" longdesc="http://langoquils.000webhostapp.com/images/logo.png" width="20%">'.
          '   </div>'.
		  '<div class="col-md-8">
            <h2>Confirmacion de Pedido</h2>
            </div>'.
			' <div class="row">
        <div class="col-lg-12 text-center">'.
		'<h3>Estimado(a): '. $usuario .'</h3>'.
        '	<h3> Su pedido ha sido despachado, en el transcurso del día estará llegando. </h3>
            <p>En caso de alguna duda, puede comunicarse a nuestros telefonos: (+593)4-2757199 </p>
        </div>
        </div>'.
        '</div></div> </body></html>';
		$cabeceras = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$cabeceras .= 'From: Ventas Langoquil <giovanna.faustos@gmail.com>';
		
		//Preparamos el mensaje a enviar
		
		enviomailhtml($para, $titulo, $mensaje, $cabeceras);


}else
{

	echo("<h1 class='titulo_h1' style='margin-top:100px;'> No se realizo la compra exitosamente</h1>
			");
		echo "<script>
		 
			function r() { location.href='../detalle_venta.php'} 
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