<?php
session_start();
include("php/conexion.php");
include("php/encripdecrip.php");
$conexion=conexion();


$x_user=$_SESSION['cedula'];

//echo "usuario:".$x_user;



$sql_variedad="SELECT orden_id,
    orden_producto,
    orden_cedula,
    orden_cantidad,
    orden_creado,
    orden_modificado,
    orden_status
FROM orden
where orden_cedula=$x_user
;";
//echo $sql_variedad;
$query_variedad=mysqli_query($conexion,$sql_variedad);
//$fila_variedad=mysqli_fetch_row($query_variedad);

//obtener el numero de compra
$sql_num_compra="SELECT comprascol_id,
    compra_num_compra    
FROM compras;";
$query_num_compra=mysqli_query($conexion,$sql_num_compra);
$fila_num_compra=mysqli_num_rows($query_num_compra);



if($fila_num_compra==0)
{
	$fila_num_compra=1;
}else
{
	$sql_max="SELECT max(compra_num_compra)as maximo FROM compras;";
	$max_query=mysqli_query($conexion,$sql_max);
	$fila_max=mysqli_fetch_row($max_query);
	$fila_num_compra=$fila_max[0]+1;
	}
	

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
<link rel="stylesheet" href="alertifyjs/css/alertify.css" />
<link rel="stylesheet" href="alertifyjs/css/themes/default.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
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

<title>Detalle Carrito</title>
</head>

<body>
<!--INICIO MENU-->
<?php include("menu_catalogo.php");?>
<?php include("php/presentar_sesion.php");?>
<!--FIN MENU-->
<div class="container">
	
        <!-- home start -->
        <div class="row">
        
        <div class="templatemo_homewrapper_carrito">
        	<h1>DETALLE COMPRAS</h1>
            <form action="php/procesar_compra.php" method="post" name="form_detalle_carrito" id="form_detalle_carrito">
        	<div class="table-responsive">
            <table id="mytable" class="table table-bordred table-striped" width="100%" >
  				<thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>                    
                    <th scope="col">Cantidad</th>
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
			$x_nompro=$data['orden_producto'];
			$sql="select 	t1.prod_id,t1.pro_nombre,t1.pro_foto,t1.pro_presentacion,t1.pro_tipo,t1.pro_descripcion,t1.pro_valor,t1.pro_stock,t1.pro_peso,t1.pro_variedad FROM producto t1 WHERE t1.pro_visible='1' and t1.prod_id='$x_nompro'";
			

			$query=mysqli_query($conexion,$sql);
			$total_registros=mysqli_fetch_row($query);
			//Calculo del Subtotal
			$subtotal= $data['orden_cantidad']*$total_registros[6];
?>
    <td><img src="images/producto/<?php echo $total_registros[2]?>" class="img-responsive img-thumbnail" width="100" height="100" /></td>
    
    <td><?php echo $total_registros[1]; ?></td>
    <td><?php echo "$".$total_registros[6]; ?></td>
    <td>
		      
		<?php echo $data['orden_cantidad'];?>
        
     </td>
    <td><?php echo "$".$subtotal; ?></td>
    
  </tr>
  
  <input name="detalle_num_compra_detalle[]" id="detalle_num_compra_detalle" value="<?php echo $fila_num_compra;?>" type="hidden"/>
   <input name="detalle_id_prod_compra[]" id="detalle_id_prod_compra" value="<?php echo $total_registros[0]; ?>"  type="hidden" />
   <input name="detalle_cant_prod_compra[]" id="detalle_cant_prod_compra" value="<?php echo $data['orden_cantidad'];?>" type="hidden" />
   <input name="detalle_subtotal_compra[]" id="detalle_subtotal_compra" value="<?php echo $subtotal;?>" type="hidden"/>
   <?php
			$numero=$numero+1;
			$total=$total+$subtotal;
			//datos para enviar a tabla detalle_compra
			
			}?>
  </tbody>
  <tr>
  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
    <td>TOTAL</td>
    <td><?php echo "$".$total?></td>
  </tr>
 
   
</table>
</div>
	<div class="row">
    	<div class="col-sm-12 text-left">
        <input name="compra_num_compra" id="compra_num_compra" value="<?php echo $fila_num_compra;?>" hidden="" />
        <input name="compra_pago_total" id="compra_pago_total" value="<?php echo $total;?>" hidden=""/>
        <input name="compra_id_user" id="compra_id_user" value="<?php echo $x_user;?>" type="text" hidden="" />
        <input type="submit" class="btn btn-success btn-lg"  value="Realizar Compra" align="right"/> 
        </div>
    </div>
    </form>
    
        </div>
        
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