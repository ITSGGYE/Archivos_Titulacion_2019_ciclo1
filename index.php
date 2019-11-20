<?php
session_start();
include('admin/conexion.php');
if(isset($_SESSION['carnet']))
 {?>

<?php include ('admin/conexion.php');

//consulta para extraer la informacion de los libros en la base de datos
$cursos=mysqli_query($conexion, "SELECT anio From usuario_estudiante where  carnet=".$_SESSION['carnet']."");
$nro_regi=mysqli_num_rows($cursos);
if ($nro_regi==0){
	echo 'No Tienes Productos en la Base de Datos';
	}else{
		while($registro2 = mysqli_fetch_array($cursos)){
  $anios=$registro2['anio'];
  }
$consulta=mysqli_query($conexion," SELECT  * from libros where curso='$anios' limit 0,6");
$nro_reg=mysqli_num_rows($consulta);
if ($nro_reg==0){
	echo 'No Tienes Productos en la Base de Datos';
	}

    //consulta para contar las visitas de la pagina almacenadas en la base de datos
	$result=mysqli_query($conexion,"SELECT count(utc) as visitas from visitas");
   $row = mysqli_fetch_array($result);
    $numero_visitas = $row["visitas"];

    //consulta para contar las visitas del dia de hoy
	$result2=mysqli_query($conexion,"SELECT count(utc) as visitas from visitas WHERE fecha_visita = CURDATE( )");
   $row2 = mysqli_fetch_array($result2);
    $visitas_hoy = $row2["visitas"];


	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="biblioteca virtual UNI">
    <title>Biblioteca Virtual | Inicio</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/menu.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">     
    <link rel="shortcut icon" href="images/iconolibreria.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
<!--barra de correo, telefono y login-->
<?php include ('includes/header.php');?>
<!--slider de imagenes-->
<?php include ('includes/slider.php');?>	
	<section>
		<div class="container">
			<div class="row">
			<!--Menu lateral Izquierdo-->
				<?php include ('includes/sidebarIzquierdo.php'); ?>
				<div class="col-sm-9 padding-right">
					<!--Contenido Central donde se muestran los libros-->
					<!--Cuadros con los libros obtenidos de la base de datos-->
                    <div class="features_items">
						<h2 class="title text-center">AGREGADOS RECIENTEMENTE</h2>
						 <?php
			     	while($filas=mysqli_fetch_array($consulta)){ 
					$id=$filas['id_libro'];
					$foto=$filas['foto'];
					$nombre=$filas['nombre'];
					$descripcion=$filas['descripcion'];
					?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="admin/<?php echo $foto ?>" width="90" heigth="70">
											
											<p><b><?php echo $nombre ?><b></p>
											<p><?php echo $descripcion ?></p>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
											<img src="admin/<?php echo $foto ?>" width="90" heigth="70">
											
													<p><?php echo $nombre ?></p>
												<a href="<?php echo $filas['url_descarga']?>" class="btn btn-default add-to-cart">
												<i class="fa fa-download"></i>Ver y Descargar</a>
												<!--<a href="producto-detalle.php?id=<?php //echo $filas['id_libro']?>" class="btn btn-default add-to-cart">
												<i class="fa fa-download"></i>Detalles</a> -->
											</div>
										</div>
								</div>
							</div>
						</div>	
									     	<?php } ?>
						
					</div><!--Datos obtenidos de la base de datos-->
					<!--Tabs-->
			     	<?php include ('includes/tabs.php');?> 
					<!--slider de abajo-->
					<?php include ('includes/sliderInferior.php');?> 					
				</div>
			</div>
		</div>
	</section>
	<!--pie de pagina-->
<?php include ('includes/footer.php');?>
	 <!--Librerias de Jquery, Bootstrap y otras mas--> 
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <!--<style>
    	#div_menu{
				background-color: green;
    	}
    	#barra_navegacion{
    		background-color: red; 
    	}
    </style>-->
</body>
</html>

<?php include "log.php"; ?>
<?php
}else{
    echo '<script> window.location="login/estudiante.php"; </script>';
}
?>