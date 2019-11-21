<?php
session_start();
include("php/conexion.php");
include("php/encripdecrip.php");
$conexion=conexion();

if(isset($_SESSION['cedula'])){
$x_user=$_SESSION['cedula'];}
else
{
    $x_user="";
}
//$x_id=$_REQUEST['id'];
//$x_cedula=$_REQUEST['ced'];
//echo "usuario:".$x_user;
if(!($x_user==null || $x_user=="")){
$sql_usuario="SELECT usu_cedula,
					usu_nombre,
					usu_apellido,
					usu_direccion,
					usu_email,
					usu_telefcel,
					usu_telefcon
			FROM usuario
			WHERE usu_cedula='$x_user'";
//echo $sql_usuario;
$query_usuario=mysqli_query($conexion,$sql_usuario);
$result_usuario=mysqli_fetch_row($query_usuario);



//obtener el numero de compra

$sql_compra="SELECT compra_num_compra,compra_procesado,compra_fech_compra from compras where compra_id_user=$x_user";
$query_compra=mysqli_query($conexion,$sql_compra);
$data_compra=mysqli_fetch_row($query_compra);

//Obtener el detalle de la compra
$sql_variedad="SELECT detalle_id,
    detalle_num_compra_detalle,
    detalle_id_prod_compra,
    detalle_cant_prod_compra,
    detalle_subtotal_compra,
    detalle_creado,
    detalle_actualizado,
    detalle_status,
    pro_nombre,
    compra_id_user,
	compra_fech_compra
FROM detalle_compras
INNER JOIN producto
ON detalle_id_prod_compra = producto.prod_id
INNER JOIN compras
on compra_num_compra=detalle_num_compra_detalle
WHERE compra_id_user=$x_user;";
//echo $sql_variedad;
$query_variedad=mysqli_query($conexion,$sql_variedad);
//$fila_variedad=mysqli_fetch_row($query_variedad);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css"> 
<link rel="stylesheet" href="css/templatemo_misc.css">
<link rel="stylesheet" href="css/templatemo_style.css">
<link rel="stylesheet" href="css/styleProducto.css" />

<link href="css/all.css" rel="stylesheet">
<link rel="stylesheet" href="alertifyjs/css/alertify.css" />
<link rel="stylesheet" href="alertifyjs/css/themes/default.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<link rel="stylesheet" href="css/contact-form.css" type="text/css">	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="alertifyjs/alertify.js"></script>
<link rel="shortcut icon" href="favicon.ico" />
<script src="js/jquery-1.11.1.min.js"></script>  <!-- lightbox -->
	<!--<script src="js/templatemo_custom.js"></script>
    
      lightbox -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.lightbox.js"></script>
    <script src="js/bootstrap-collapse.js"></script> 
<script src="js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
   <script type="text/javascript" src=" https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script src="js/contact-form.js"></script>

<title>Detalle Carrito</title>
</head>

<body>
<!--INICIO MENU-->
<?php include("menu_catalogo.php");?>
<?php include("php/presentar_sesion.php");?>
<!--fin MENU-->

<section id="contact-form-section" class="form-content-wrap">
		<div class="container">
			<div class="row">
				<div class="tab-content">
					<div class="col-sm-12">
						<div class="item-wrap">
							<div class="row">
								
								<div class="col-sm-12">
									<div class="item-content colBottomMargin">
										<div class="item-info">
											<h2 class="titulo_h1" style="margin-top:130px;">DATOS USUARIO</h2>
										<?php
												
												if($x_user==0 || $x_user=""){
											?>
													<br />
													<div class="alert alert-danger templatemo_hometop_bg">
														No hay datos de usuarios. Debe iniciar sesion para revisar.
													</div>
											  <?php
												}
												else
												{?>
											
										</div><!--End item-info -->	
										
								   </div><!--End item-content -->
								</div><!--End col -->
                                
                                
								<div class="col-md-12">
								
								
								<form id="contactForm" name="contactform" data-toggle="validator" class="popup-form">
												<div class="row">
													<div id="msgContactSubmit" class="hidden"></div>
													
													<div class="form-group col-sm-5 ">
														
														<input name="fname" id="fname"  class="form-control" type="text" disabled="disabled" value=<?php echo $result_usuario[0];?> > 
														<div class="input-group-icon"><i class="fa fa-user"></i></div>
													</div>
                                                    <div class="form-group col-sm-6 ">
														
														<input name="fname" id="fname"  class="form-control" type="text" disabled="disabled" value=<?php echo $result_usuario[1];?> > 
														<div class="input-group-icon"><i class="fa fa-user"></i></div>
													</div><!-- end form-group -->
                                                    <div class="form-group col-sm-5 ">
														
														<input name="fname" id="fname"  class="form-control" type="text" disabled="disabled" value=<?php echo $result_usuario[2];?> > 
														<div class="input-group-icon"><i class="fa fa-user"></i></div>
													</div>
													<div class="form-group col-sm-6">
														<div class="help-block with-errors"></div>
														<input name="email" id="email"  pattern=".*@\w{2,}\.\w{2,}" class="form-control" type="email" value="<?php echo $result_usuario[4];?>" disabled="disabled">
														<div class="input-group-icon"><i class="fa fa-envelope"></i></div>
													</div><!-- end form-group -->
													<div class="form-group col-sm-5">
														
														<input name="phone" id="phone" disabled="disabled" class="form-control" type="text" value="<?php echo $result_usuario[5]." / ". $result_usuario[6];?>" >
														<div class="input-group-icon"><i class="fa fa-phone"></i></div> 
													</div><!-- end form-group -->
													<div class="form-group col-sm-6">
														<div class="help-block with-errors"></div>
														<input name="subject" id="subject" class="form-control" type="text" value="<?php echo $result_usuario[3];?>"  disabled="disabled">
														<div class="input-group-icon"><i class="fa fa-book"></i></div> 
													</div><!-- end form-group -->
													
											
													
													<div class="clearfix"></div>
												</div><!-- end row -->
											</form><!-- end form -->
											
											
									
									
								  
								
								</div>
							</div><!--End row -->
							
						
								
							
							<!-- Popup end -->
							
						</div><!-- end item-wrap -->
					</div><!--End col -->
				</div><!--End tab-content -->
			</div><!--End row -->
		</div><!--End container -->
	</section>

<!--FIN MENU-->
<div class="container">
	
        <!-- home start -->
       
        	
        
        
        <div class="row">
        
        <div class="templatemo_homewrapper_detalle">
       
        	<h1>DETALLE COMPRAS</h1>
            <form action="php/procesar_venta.php" method="post" name="form_detalle_carrito" id="form_detalle_carrito">
        	<div class="table-responsive">
            <table id="mytable" class="table table-bordred table-striped" width="100%" >
  				<thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha Compra</th>
                    <th scope="col">Precio</th>                    
                    <th scope="col">Subtotal</th>
                    
                  </tr>
				</thead>
                <tbody>  
   <?php
   	$numero=1;
	$total=0;
    while($data=mysqli_fetch_assoc($query_variedad))
			{
				
						
	?>	
   
  <tr>
    <td><?php 
			echo $numero;?></td>
    <?php
			//Calculo del Subtotal
			$subtotal= $data['detalle_cant_prod_compra']*$data['detalle_subtotal_compra'];
?>
    <td><?php echo $data['pro_nombre']?></td>
    
    <td><?php echo $data['detalle_cant_prod_compra']; ?></td>
    <td><?php  
				$fecha=date_create($data['compra_fech_compra']);
				echo date_format($fecha, 'd/m/Y'); ?></td>
    <td><?php echo "$".$data['detalle_subtotal_compra']; ?></td>
    <td>
		      
		<?php echo "$".$subtotal;?>
        
     </td>
    
    
  </tr>
  
  <?php
			$numero=$numero+1;
			$total=$total+$subtotal;
			$id_compra=$data['detalle_num_compra_detalle'];
			//datos para enviar a tabla detalle_compra
			
			}?>
  </tbody>
  <tr>
  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
    <td>&nbsp;</td>
    <td>TOTAL</td>
    <td><?php echo "$".$total ?></td>
  </tr>
 
   
</table>
</div>


    </form>
   	</div>
        </div>
         <?php
		}
		?>	
         <div class="col-md-12"  style="left:-50px;">
	  
       </div>
        </div>
       
  
		
        									

<!-- footer start -->
        <?php include("foot_catalogo.php");?>
        <!-- footer end -->
 <!--
  <script type="text/javascript">
$(document).ready(function() {
    $('#mytable').DataTable({
		language:{
   				 "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
}
	});
} );
</script>-->

    
</body>
</html>