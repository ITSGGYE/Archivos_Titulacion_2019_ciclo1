<?php
session_start();
include("php/conexion.php");
include("php/encripdecrip.php");
destruir_sesion();
$conexion=conexion();
$sql="select t1.prod_id,t1.pro_nombre,t1.pro_foto,t1.pro_presentacion
from producto t1
where t1.pro_visible='1'";
$sql_categoria="SELECT tipo_pro_id,tipo_pro_nombre,tipo_status,tipo_img from tipo_producto where tipo_status='1'";
//echo $sql_categoria;
$query=mysqli_query($conexion,$sql);
$query_categoria=mysqli_query($conexion,$sql_categoria);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css"> 
<link rel="stylesheet" href="css/templatemo_misc.css">
<link rel="stylesheet" href="css/templatemo_style.css">
<link href="css/all.css" rel="stylesheet">
<link rel="shortcut icon" href="favicon.ico" />
<script src="js/jquery-1.11.1.min.js"></script>  <!-- lightbox -->
	<script src="js/templatemo_custom.js"></script> <!-- lightbox -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.lightbox.js"></script>
    <script src="js/bootstrap-collapse.js"></script> 


<title>Catalogo</title>
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
            	
                <div class="templatemo_hometop_title">CATALOGO</div>
               
                
                <p class="parrafos">Camarones y Langostinos S.A. es una empresa dedicada a la compra y venta de camarones para su exportación. En la actualidad no solo nos enfocaremos en la venta de nuestros productos a las empacadoras para su respectiva exportacion, sino que tambien queremos ingresar al mercado local y ofrecer a los hogares ecuatorianos nuestros productos con calidad de exportacion. </p>
                
                  <!--Presentacion de categorias-->
            		<div class="row">
                    <?php
    while($data=mysqli_fetch_assoc($query_categoria))
			{
						
	?>		
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail" style="width:90%;">
						<img class="card-img-top" alt="Bootstrap Thumbnail First" src="images/<?php echo $data['tipo_img'];?>" style="height:250px;">
						<div class="card-block" align="center">
							<h5 class="templatemo_home_botsubheader">
								<?php echo $data["tipo_pro_nombre"]; ?>
							</h5>
							
							<p>
								<a class="btn btn-primary" href="productos.php?id=<?php echo $encriptar($data['tipo_pro_id']);?>">Ver Productos</a> 
							</p>
						</div>
					</div>
				</div>
		<?PHP
			}
			?>
            <!--fin Presentacion de categorias-->


  
            	</div>
            <div class="clear"></div>
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