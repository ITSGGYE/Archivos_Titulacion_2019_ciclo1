<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css"> 
<link rel="stylesheet" href="css/templatemo_misc.css">
<link rel="stylesheet" href="css/templatemo_style.css">
<link rel="stylesheet" href="css/form_registro.css">
<link rel="stylesheet" href="alertifyjs/css/alertify.css" />
<link rel="stylesheet" href="alertifyjs/css/themes/default.css" />
<link href="css/all.css" rel="stylesheet">
<link rel="shortcut icon" href="favicon.ico" />
<script src="js/jquery-1.11.1.min.js"></script>  <!-- lightbox  -->
	<script src="js/templatemo_custom.js"></script> <!-- lightbox -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.lightbox.js"></script>
    <script src="js/bootstrap-collapse.js"></script> 
    <script src="alertifyjs/alertify.js"></script>


<title>Recuperar Password</title>
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
                      <div class="templatemo_hometop_title"><h1>RECUPERAR CLAVE</h1></div>
            		<form class="form-horizontal" name="form_recuperar" id="form_recuperar" method="post" action="php/recuperar_password.php">
                    <div class="form-group">
                    	<div class="col-xs-12">
                        <label id="icon" for="email"><i class="fas fa-envelope"></i></label>
                   		 <input type="email" name="email" id="email" placeholder="Email" required />
                         </div>
                    </div>
                    <div class="form-group">
                    	<div class="col-xs-12">
                        <label id="icon" for="password"><i class="fas fa-lock"></i></label>
                   		 <input type="password" name="password" id="password" placeholder="Contraseña" required />
                         </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                        <input type="submit" name="ingresar" value="Recuperar" />
                        </div>
		       		 </div>
                	</form>
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