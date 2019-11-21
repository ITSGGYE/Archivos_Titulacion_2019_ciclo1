<?php
session_start();
include("conexion.php");
$conexion=conexion();

$x_email=$_REQUEST['email'];
$x_psw=$_REQUEST['password'];

$query_usu="select * from usuario where usu_email='$x_email'";
$query_usu_slq=mysqli_query($conexion,$query_usu);
$total_fila=mysqli_fetch_row($query_usu_slq);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/bootstrap.min.css"> 
<link rel="stylesheet" href="../css/templatemo_misc.css">
<link rel="stylesheet" href="../css/templatemo_style.css">
<link rel="stylesheet" href="../css/form_registro.css">
<link rel="stylesheet" href="../alertifyjs/css/alertify.css" />
<link rel="stylesheet" href="../alertifyjs/css/themes/default.css" />
<link href="../css/all.css" rel="stylesheet">
<link rel="shortcut icon" href="../favicon.ico" />
<script src="../js/jquery-1.11.1.min.js"></script>  <!-- lightbox  -->
	<script src="../js/templatemo_custom.js"></script> <!-- lightbox -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.lightbox.js"></script>
    <script src="../js/bootstrap-collapse.js"></script> 
    <script src="../alertifyjs/alertify.js"></script>


<title>Catalogo</title>
</head>

<body>
<!--INICIO MENU-->
<?php include("../menu_catalogo.php");?>

      <!--FIN MENU-->    
<!--contenedor de categorias-->
	<div class="container">
        <!-- home start -->
        <div class="row">
        <div class="templatemo_homewrapper shadow">
        	<div class="templatemo_hometop_bg">
            	
            	<div class="col-md-12">
            	
                <h1>RECUPERAR CLAVE</h1>
               	 <p class="parrafos">Camarones y Langostinos S.A. es una empresa dedicada a la compra y venta de camarones para su exportación. En la actualidad no solo nos enfocaremos en la venta de nuestros productos a las empacadoras para su respectiva exportacion, sino que tambien queremos ingresar al mercado local y ofrecer a los hogares ecuatorianos nuestros productos con calidad de exportacion. </p>
               	
                	<div class="col-sm-6 col-sm-offset-3">
                	<div class="">
	                  <!--Presentacion de form-->
                      <div class="templatemo_hometop_title">
                      	<?PHP
							if ($total_fila[0]==null || $total_fila[0]==""){
									echo("<h1 class='titulo_h1' style='margin-top:100px;'> Correo Electronico No existe</h1>
									");
								echo "<script>
								 
									function r() { location.href='../index.html'} 
									setTimeout ('r()', 3000);
								 
								 </script>";}
									else
									{
										$sql="UPDATE usuario
									  SET usu_password=AES_ENCRYPT('$x_psw','llave')
									  WHERE usu_email='$x_email' AND usu_cedula='$total_fila[0]';"
									  ;
								//echo $sql;
								$query=mysqli_query($conexion,$sql);
								//enviar correo
								$para="$x_email";
								 $titulo="Cambio de Contraseña";
								 $mensaje='<html>'.
									'<head>
									<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
									<title>Cambio de Contraseña</title>
									</head>'.
									'<body><h1>Actualización de Contraseña</h1>'.
									'<p> Su contraseña se ha actualizado correctamente.</p>
									<p> Si usted no lo solicito, contactese al telefono :(+593)4-2757199</p> ';
								$cabeceras = 'MIME-Version: 1.0' . "\r\n";
								$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
								$cabeceras .= 'From: Administrador<langoquil@gmail.com>';
								enviomailhtml($para, $titulo, $mensaje, $cabeceras);

								//echo $query;
								echo("<h1 class='titulo_h1' style='margin-top:100px;'> Password Cambiado Correctamente</h1>
									");
								echo "<script>
								 
									function r() { location.href='../index.html'} 
									setTimeout ('r()', 3000);
								 
								 </script>";	
								 
							}
								
								
							
							
						?>
                        
                      </div>
            		</div>
                    </div>
            <!--fin Presentacion de form-->


  
            	</div>
            
            </div>       		
        </div>
        </div>
  </div>

<!--fin contenedor de categorias-->  


 <!-- footer start -->
       <?php include("../foot_catalogo.php");?>
        <!-- footer end -->
 
</body>
</html>