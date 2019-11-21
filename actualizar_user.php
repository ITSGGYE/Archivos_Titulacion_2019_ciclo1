<?php
session_start();
include("php/conexion.php");
include("php/encripdecrip.php");
$conexion=conexion();
$x_id=$desencriptar($_REQUEST['id']);
$sql="SELECT usu_cedula,usu_nombre,usu_apellido,usu_email,usu_direccion,usu_telefcel,usu_telefcon,usu_creado,CAST(AES_DECRYPT(usu_password,'llave') AS CHAR) AS content FROM usuario  where usu_cedula='$x_id'";
$query_sql=mysqli_query($conexion,$sql);
$query_filas=mysqli_fetch_row($query_sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css"> 
<link rel="stylesheet" href="css/templatemo_misc.css">
<link rel="stylesheet" href="css/templatemo_style.css">
<link rel="stylesheet" href="css/form_recuperar.css">
<link rel="stylesheet" href="alertifyjs/css/alertify.css" />
<link rel="stylesheet" href="alertifyjs/css/themes/default.css" />
<link href="css/all.css" rel="stylesheet">
<link rel="shortcut icon" href="favicon.ico" />
  <!-- lightbox  -->
	<script src="js/templatemo_custom.js"></script> <!-- lightbox -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.lightbox.js"></script>
    <script src="js/bootstrap-collapse.js"></script> 
    <script src="alertifyjs/alertify.js"></script>


<title>Actualizar Usuario</title>
</head>

<body>
<!--INICIO MENU-->
<?php include("menu_catalogo.php");?>
<?php include("php/presentar_sesion.php");?>
      <!--FIN MENU-->    
<!--contenedor de categorias-->
	<div class="container">
        <!-- home start -->
        <div class="row">
        <div class="templatemo_homewrapper shadow">
        	<div class="templatemo_hometop_bg">
            	
            	<div class="col-md-12">
            	
                
               	 <p class="parrafos">Camarones y Langostinos S.A. es una empresa dedicada a la compra y venta de camarones para su exportación. En la actualidad no solo nos enfocaremos en la venta de nuestros productos a las empacadoras para su respectiva exportacion, sino que tambien queremos ingresar al mercado local y ofrecer a los hogares ecuatorianos nuestros productos con calidad de exportacion. </p>
               	
                	<div class="col-sm-6 col-sm-offset-3">
                	<div class="">
	                  <!--Presentacion de form-->
                      <div class="templatemo_hometop_title"><h1>EDITAR USUARIO</h1></div>
            		<div class="testbox">
  <h1>Actualizar Datos</h1>

  <form action="php/actualizar_datos_user.php" method="post" id="formUser" name="formUser">
      <hr>
   <label id="icon" for="cedula"><i class="icon-user"></i></label>
  <input type="text" name="cedula" id="cedula1" placeholder="Cedula" onKeyPress='return soloNumeros(event)' onblur='validar()' maxlength="10" required value="<?php echo $query_filas[0];?>" readonly/>
  <label id="icon" for="name"><i class="icon-user "></i></label>
  <input type="text" name="nombre" id="name" placeholder="Nombre" onKeyUp='mayus(this)'  onKeyPress='return soloLetras(event)' value="<?php echo $query_filas[1];?>" required/>
  <label id="icon" for="apellidos"><i class="icon-user"></i></label>
  <input type="text" name="apellido" id="apellido" placeholder="Apellido" onKeyUp='mayus(this)'  onKeyPress='return soloLetras(event)' required value="<?php echo $query_filas[2];?>"/>
  <label id="icon" for="direccion"><i class="icon-globe"></i></label>
  <input type="text" name="direccion" id="direccion" placeholder="Direccion" onKeyUp='mayus(this)' required value="<?php echo $query_filas[4];?>"/>
  <label id="icon" for="telefcon"><i class="fa fa-phone" aria-hidden="true"></i></label>
  <input type="tel" name="telefono" id="telefcon" placeholder="Telefono"  required maxlength="9" value="<?php echo $query_filas[5];?>"/>
  <label id="icon" for="telefcel"><i class="fa fa-mobile" aria-hidden="true"></i></label>
  <input type="tel" name="celular" id="telefcel" placeholder="Celular" maxlength="10"  required value="<?php echo $query_filas[6];?>" />
  <label id="icon" for="email"><i class="icon-envelope"></i></label>
  <input type="email" name="correo" id="correo" placeholder="E-Mail"  required value="<?php echo $query_filas[3];?>"/>
  
  <input type="submit" class="btn btn-deep-orange" value="Grabar" > 
  
  </form>
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
       <?php include("foot_catalogo.php");?>
       
        <!-- footer end -->
        
 
</body>
</html>