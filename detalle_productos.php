<?php
session_start();
include("php/conexion.php");
include("php/encripdecrip.php");
$conexion=conexion();
$x_id=$desencriptar($_REQUEST['id']);
$sql="select t1.prod_id,t1.pro_nombre,t1.pro_foto,t1.pro_presentacion,t1.pro_tipo,t1.pro_descripcion,t1.pro_valor,t1.pro_stock,t1.pro_peso,t1.pro_variedad
from producto t1
where t1.pro_visible='1' and t1.prod_id='$x_id'";


$query=mysqli_query($conexion,$sql);
$total_registros=mysqli_fetch_row($query);


$sql_categoria="SELECT tipo_pro_id,tipo_pro_nombre,tipo_status,tipo_img from tipo_producto where tipo_status='1' and tipo_pro_id='$total_registros[4]'";


$query_categoria=mysqli_query($conexion,$sql_categoria);
$fila=mysqli_fetch_row($query_categoria);

$sql_variedad="SELECT variedad_id,variedad_nombre from variedad where variedad_id='$total_registros[9]'";
$query_variedad=mysqli_query($conexion,$sql_variedad);
$fila_variedad=mysqli_fetch_row($query_variedad);

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
<link rel="stylesheet" href="alertifyjs/css/alertify.css" />
<link rel="stylesheet" href="alertifyjs/css/themes/default.css" />
<link href="css/all.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="shortcut icon" href="favicon.ico" />
<script src="js/jquery-1.11.1.min.js"></script>  <!-- lightbox -->
	<script src="js/templatemo_custom.js"></script> <!-- lightbox -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.lightbox.js"></script>
      <script src="alertifyjs/alertify.js"></script>
    <script src="js/bootstrap-collapse.js"></script> 


<title>Productos</title>
</head>

<body>
<!--INICIO MENU-->
<?php include("menu_catalogo.php");?>
<?php include("php/presentar_sesion.php");?>
<!--FIN MENU-->
<div class="container">
        <!-- home start -->
        <div class="row">
        <div class="templatemo_homewrapper shadow">

        	<div class="templatemo_hometop_bg">
            	<!--mostrar datos del producto-->
<div class="container-fluid">
	
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6" align="center">
					<img alt="Bootstrap Image Preview" class="img-thumbnail"src="images/producto/<?php echo $total_registros[2]?>" width="50%"/>
						<h2><?php echo $total_registros[1]?></h2>
				</div>
				<div class="col-md-5 bg-success" style=" box-shadow:1px 3px 9px #061E6B; padding:15px;">
                	<p style="font-size:18px;"> Detalle de los productos que ofrece Langoquil para nuestros selectos clientes</p>
                    
					<dl style="font-size:16px;">
						<dt>
							<p class=" text-primary">Descripcion:</p>
							
						</dt>
						<dd>
							<p style="font-size:14px;"><?php echo $total_registros[5]?></p>
						</dd>
						<dt>
							<p class="text-primary">Precio:</p>
						</dt>
						<dd>
							<p style="font-size:14px;"> <?php echo "$".$total_registros[7]?></p>
						</dd>
						<dd>
							<p class="text-primary">Tipo Producto:</p>
						</dd>
						<dt>
							<p style="font-size:14px;"><?php echo $fila[1]?></p>
						</dt>
						<dd>
							<p class="text-primary">Presentacion:</p>
						</dd>
						<dt>
							<p style="font-size:14px;"><?php echo $total_registros[3]?></p>
						</dt>
						<dd>
							<div class="row">
                            	<div class="col-sm-6">
                                <p class="text-primary">Peso:</p>
                                <p><?php echo $total_registros[8]. " lbs"?></p>
                                </div>
                                <div class="col-sm-6">
                                <p class="text-primary">Variedad:</p>
                                <p><?php echo $fila_variedad[1]; ?></p>
                                </div>
                            </div>
                            
						</dd>
						
												
					</dl>
                    <div class="row">
                    	<div class="col-lg-12">
                        	<?php
								if((isset($_SESSION['cedula'])) && ($_SESSION['cedula']!=NULL)){
									
							?> 
                        	<form action="php/cantidad_stock_validar.php" method="post" name="formcarrito">
                            	<input type="text" value="<?php echo $total_registros[0]?>" hidden  name="id"/>
                                <input type="text" value="<?php echo $_SESSION['cedula'];?>" hidden=""  name="user"/>
                            	<br /><input type="hidden" value="1" placeholder="Cantidad" name="cantidad" />
                            	<button type="submit" class="btn btn-group-sm btn-primary"><span class="fa fa-shopping-cart"></span>Carrito</button>
                                
                            </form>
                            <?PHP
								}else{
							?>
								<div class="alert alert-info text-center" style="margin-right:50px; width:80%;">
                                	Inicie Sesión para realizar compra
                                </div>
							<?PHP
								}?>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--fin mostrar datos-->
        	</div>
        </div>
    </div>
</div>
<!-- footer start -->
       <?php include("foot_catalogo.php");?>
       
        <!-- footer end -->
 <script>
 	
 </script>
</body>
</html>