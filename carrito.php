<?php
session_start();
include("php/conexion.php");
include("php/encripdecrip.php");
destruir_sesion();
$conexion=conexion();
if(isset($_SESSION['cedula'])){
$x_user_con=$_SESSION['cedula'];
}else{
	$x_user_con=0;
}

$sql_variedad="SELECT orden_id,
    orden_producto,
    orden_cedula,
    orden_cantidad,
    orden_creado,
    orden_modificado,
    orden_status
FROM orden
WHERE orden_cedula='$x_user_con';";
//echo $sql_variedad;
$query_variedad=mysqli_query($conexion,$sql_variedad);
//$fila_variedad=mysqli_fetch_row($query_variedad);

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
	<script src="js/carrito.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
   <script type="text/javascript" src=" https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

<title>Carrito de Compras</title>
</head>

<body>
<!--INICIO MENU-->
<?php include("menu_catalogo.php");?>
<?php include("php/presentar_sesion.php");?>

<!--FIN MENU-->
<div class="container">
	<div class="row">
        <div class="templatemo_homewrapper_carrito">
		 <?php
			$fila_variedad=mysqli_fetch_row($query_variedad);
			if($fila_variedad==0){
		?>
		        <br />
				<div class="alert alert-danger">
        			Carrito esta vacio
        		</div>
          <?php
			}
			else
			{?>
            	<div class="table-responsive">
        	<table id="mytable" class="table table-bordred table-striped" width="100%">
  				<thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>                    
                    <th scope="col">Cantidad</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Borrar</th>
                  </tr>
				</thead>
                <tbody> 
                
				   <?php
                    $numero=1;
                    $total=0;
                    $query_variedad=mysqli_query($conexion,$sql_variedad);
                    while($data=mysqli_fetch_assoc($query_variedad))
                            {
                             $datos=$data['orden_id']."||".$data['orden_cantidad']."||".$data['orden_producto'];
                                        
                    ?>	
                    	 <tr>
    <td><?php 
			echo $numero;?></td>
    <?php
	$x_nompro=$data['orden_producto'];
	$sql="select t1.prod_id,t1.pro_nombre,t1.pro_foto,t1.pro_presentacion,t1.pro_tipo,t1.pro_descripcion,t1.pro_valor,t1.pro_stock,t1.pro_peso,t1.pro_variedad
from producto t1
where t1.pro_visible='1' and t1.prod_id='$x_nompro'";

$query=mysqli_query($conexion,$sql);
$total_registros=mysqli_fetch_row($query);
//Calculo del Subtotal
$subtotal= $data['orden_cantidad']*$total_registros[6];
?>
    <td><img src="images/producto/<?php echo $total_registros[2]?>" class="img-responsive img-thumbnail" width="100" height="100" /></td>
    
    <td><?php echo $total_registros[1]; ?></td>
    <td><?php echo "$".$total_registros[6]; ?></td>
    <td>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="agregaform('<?php echo $datos ?>')">
 		 <?php echo $data['orden_cantidad'];?>
		</button>       
		
        
     </td>
    <td><?php echo "$".$subtotal; ?></td>
    <td><a href="php/borrar_carrito.php?id=<?php echo $data['orden_id'];?>" class="btn btn-danger">X</a></td>
  </tr>
	
    
    <?php
							
						$numero=$numero+1;
			$total=$total+$subtotal;
					}
							?>
                </tbody>
                	
  <tr>
  
    <td>&nbsp;</td>
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
        	<div class="col-lg-12" align="left">
            	<a class="btn btn-info btn-lg text-right" href="detalle_carrito.php">Revisar Pedido</a>
            </div>
            
        </div>

			<?php	
			}?>
         
         </div>
      </div>
</div>

<!-- Button to Open the Modal -->


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Acrualizar Cantidad Pedido</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <label>Id</label>
        <input type="text" name="id" id="id_var" class="form-control input-sm" disabled="disabled"/>
        <label>Cantidad</label>
        <input type="number" name="nombre" id="nvariedadu" class="form-control input-sm" onkeydown="if ( !(event.keyCode=='8') && isNaN( String.fromCharCode(event.keyCode) ) ) return false;"/>
        <input type="hidden" name="producto" id="producto" class="form-control input-sm"/>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="actualizadatos">Actualizar</button>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#guardarnuevo').click(function() {
		nombre=$('#nvariedad').val();
	
       agregardatos(nombre,'e'); 
	   
    });
	$('#actualizadatos').click(function() {
        actualizadatos();
    });
	
});

</script>
<!-- footer start -->
       <?php include("foot_catalogo.php");?>
        <!-- footer end -->
 <!---->
  <script type="text/javascript">
$(document).ready(function() {
    $('#mytable').DataTable({
		language:{
   				 "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Carrito de compras vacio",
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
</script>
<script>
$(document).ready(function() {
    var table = $('#mytable').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
</script>
</body>
</html>