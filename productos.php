<?php
session_start();

include("php/conexion.php");
include("php/encripdecrip.php");
$conexion=conexion();
$x_id=$desencriptar($_REQUEST['id']);
//echo $x_id;
$sql="select t1.prod_id,t1.pro_nombre,t1.pro_foto,t1.pro_presentacion,t1.pro_tipo,t1.pro_descripcion,t1.pro_valor,t1.pro_stock
from producto t1
where t1.pro_visible='1' and t1.pro_tipo='$x_id' and t1.pro_stock!=0 ";

//echo $sql;
$sql_categoria="SELECT tipo_pro_id,tipo_pro_nombre,tipo_status,tipo_img from tipo_producto where tipo_status='1' and tipo_pro_id='$x_id'";
//echo $sql_categoria;

$query=mysqli_query($conexion,$sql);
//$total_registros=mysqli_fetch_row($query);


$query_categoria=mysqli_query($conexion,$sql_categoria);
$fila=mysqli_fetch_row($query_categoria);

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
<link rel="stylesheet" href="css/styleProducto.css" />
<link href="css/all.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="shortcut icon" href="favicon.ico" />
<script src="js/jquery-1.11.1.min.js"></script>  <!-- lightbox -->
	<script src="js/templatemo_custom.js"></script> <!-- lightbox -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.lightbox.js"></script>
    <script src="js/bootstrap-collapse.js"></script> 


<title>Productos</title>
</head>

<body>
<!--INICIO MENU-->
<?php include("menu_catalogo.php");?>
<?php include("php/presentar_sesion.php");?>
<!--finINICIO MENU-->

<!--contenedor de categorias-->
	<div class="container">
        <!-- home start -->
        <div class="row">
        <div class="templatemo_homewrapper shadow">
        	<div class="templatemo_hometop_bg">
            	
            	<div class="col-md-12">
                
            	<div class="templatemo_hometop_title"><?php echo $fila[1];?></div>
               
                
                <p class="parrafos">Camarones y Langostinos S.A. es una empresa dedicada a la compra y venta de camarones para su exportación. En la actualidad no solo nos enfocaremos en la venta de nuestros productos a las empacadoras para su respectiva exportacion, sino que tambien queremos ingresar al mercado local y ofrecer a los hogares ecuatorianos nuestros productos con calidad de exportacion. </p>
                
                  <!--Presentacion de categorias-->
                  <div class="container-fluid">
            		<div class="row" >
                    <?php 
					$i=0;
    while($data=mysqli_fetch_assoc($query))
			{
					$i=$i+1;	
	?>		
				<div class="col-sm-6 col-md-4">
					<div class="">
						<a href="#" data-toggle="modal" data-target="#<?php echo $data["prod_id"]; ?>"><img class="img-responsive" alt="Productos Langoquil" src="images/producto/<?php echo $data['pro_foto'];?>" style=" width:250px; height:250px; object-fit:cover;"></a>
						<div class="card-block text-justify" >
							<h5 style="color: #00000 ; font-weight:bold; font-size:18px;">
								<?php echo $data["pro_nombre"]; ?>
							</h5>
							
                            <p class="precio">
                            	<?php echo "Precio: $".$data["pro_valor"]; ?>
                            </p>
                            <p class="existencia">
                            	<?php echo "Presentacion: ".$data["pro_presentacion"]; ?>
                            </p>
                            <p class="existencia">
                            	<?php echo "Disponibilidad : ".$data["pro_stock"]; ?>
                            </p>
							<p class="text-left" >
								<a class="btn btn-primary" href="detalle_productos.php?id=<?php echo $encriptar($data['prod_id']);?>" >
 Ver Productos
</a>
							</p>
						</div>
					</div>
				</div>
           
    
                <!--presentacion de descripcion de producto-->
                <div class="modal fade" id="<?php echo $data["prod_id"]; ?>" role="dialog" >
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <center><b><h3 id="exampleModalLabel"><?php echo $data["pro_nombre"]; ?></h3></b></center>
                        
                      </div>
                      <div class="modal-body">
                      <center><img class="text-center img-responsive" alt="Productos Langoquil" src="images/producto/<?php echo $data['pro_foto'];?>" style=" width:350px; height:250px; object-fit:cover;"></center>
                      <p class="text-justify">
                            	<?php echo $data["pro_descripcion"]; ?>
                            </p>
                        <p class="precio">
                            	<?php echo "Precio: $".$data["pro_valor"]; ?>
                            </p>
                            <p class="existencia">
                            	<?php echo "Presentacion: ". $data["pro_presentacion"]; ?>
                            </p>
                            <p class="existencia">
                            	<?php echo "Disponibilidad : ".$data["pro_stock"]; ?>
                            </p>
                      </div>
                     
                    </div>
                  </div>
                </div>
                <!--fin presentacion de descripcion de producto-->
                
		<?PHP
			}
			?>
            </div>
            <!--fin Presentacion de categorias-->
            <?php
				
				
				if($i==0 ){?>
		<div class="alert alert-danger">
        	No existen productos para esta categoria
        </div>
			<?php }?>
  
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