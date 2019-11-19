    <?php
 	/* Connect To Database*/
	require_once ("config/db.php"); 	require_once ("config/conexion.php"); 
	session_start();

	if (!isset($_SESSION['active']) AND $_SESSION['active'] != true) {
        include("loguot.php"); 
		exit;
        }        
$Rol_Id=$_SESSION['rol']; 

 date_default_timezone_set('America/Guayaquil'); 
 
	$active_productos="";
	$active_clientes="";
	$active_usuarios="";	
	$title="Facturas | Millennials Sistema";
?><?php
 
?>
<!DOCTYPE html>
<html  html lang="es-ES"> 
  <head>
	<?php include("head.php");?>

  </head>
  <body>
	<?php
	include("navbar.php");
	?>  
    <div class="container">
		<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<a  href="nueva_factura.php" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Nueva Factura</a>
			</div>
			<h4><i class=' '></i>Bienvenido </h4>
		</div>
			<div class="panel-body">
			 

				 <?php 
	 $rol=$_SESSION['rol'];
	 $sucur=$_SESSION['Sucur_Id'];
					 if ($rol==1){$r="Gerente";}
					  if ($rol==2){$r="Administrador";}
						if ($rol==3){$r="Secretario(a)";}
	 
 
        if($_SESSION['Sucur_Id'] >= 1){
    
  	$qa=mysqli_query($con,"select * from sucursales where Sucur_Id=$sucur ");
							while($rw=mysqli_fetch_array($qa))	{
						 
	                             $a=$rw['Sucur_Nombre'];
				 

							}	}
 

			  ?>
<span class="user"><?php echo $_SESSION['nombre'].' '.$_SESSION['apellido'].' -'.$r;?></span>
<br>
			 <?php    if($_SESSION['Sucur_Id'] == 0){  ?>

<span class="user"><?php echo  'Accesos: Todos' ;?></span>


			 <?php    }   ?>

 <?php    if($_SESSION['Sucur_Id'] >= 1){  ?>

<span class="user"><?php echo  'Accesos: '.$a ;?></span>


			 <?php    }  ?>
			</div>
		</div>	
		
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script> 
  </body>
</html>