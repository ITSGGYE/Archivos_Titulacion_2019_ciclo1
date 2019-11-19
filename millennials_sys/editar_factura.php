    <?php
 
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
 
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos


	$id_factura=$_POST['a']; 
	
	if (isset($id_factura))
	{
		$id_factura=intval($id_factura);
		$campos="clientes.Cli_Id, clientes.Cli_Nombre,clientes.Cli_Apellido, clientes.Cli_Numero, clientes.Cli_Correo, factura.User_Id, factura.Fac_Fecha, factura.Fac_Estado, factura.Det_Numero,sucursales.Sucur_Nombre,factura.Sucur_Id";
		$sql_factura=mysqli_query($con,"select $campos from factura, clientes,sucursales where factura.Sucur_Id=sucursales.Sucur_Id and  factura.Cli_Id=clientes.Cli_Id and Fac_Id='".$id_factura."'");
		$count=mysqli_num_rows($sql_factura);
		if ($count==1)
		{
				$rw_factura=mysqli_fetch_array($sql_factura);
				$id_cliente=$rw_factura['Cli_Id'];
				$nombre_cliente=$rw_factura['Cli_Nombre'];
				$apellido_cliente=$rw_factura['Cli_Apellido'];
				$telefono_cliente=$rw_factura['Cli_Numero'];
				$email_cliente=$rw_factura['Cli_Correo'];
				$id_vendedor_db=$rw_factura['User_Id'];
				$fecha_factura=date("d/m/Y", strtotime($rw_factura['Fac_Fecha']));
				
				$estado_factura=$rw_factura['Fac_Estado'];
				$numero_factura=$rw_factura['Det_Numero'];
				$sucursal=$rw_factura['Sucur_Nombre'];
				$Sucur_Id=$rw_factura['Sucur_Id'];
				$a=$id_factura;
				$x=$numero_factura; 
		}	
		else
		{ 
			exit;	
		}
	} 
	else 
	{ 
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
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
			<h4><i class='glyphicon glyphicon-edit'></i> Editar Factura</h4>
		</div>
		<div class="panel-body">
 
			<form class="form-horizontal" method="POST" action="ajax/editar_factura.php" role="form" id="datos_factura">
				<div class="form-group row">


				  <label for="nombre_cliente" class="col-md-3 control-label">Buscar Cliente</label>
				  <div class="col-md-3">
					  <input type="text" class="form-control input-sm" id="nombre_cliente" placeholder="Selecciona un cliente" required value="<?php echo $nombre_cliente;?>">
					  <input id="id_cliente" name="id_cliente" type='hidden' value="<?php echo $id_cliente;?>">	
				  </div>
<br><hr><br>
	 </div>
<div class="form-group row">
		  <label for="cliente" class="col-sm-1 control-label">Nombre</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="cliente" placeholder="Nombre" value="<?php echo $nombre_cliente;?>" readonly>
							</div>	  
				 <label for="apellido_cliente" class="col-sm-1 control-label">Apellido</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="apellido_cliente" placeholder="Apellido" value="<?php echo $apellido_cliente;?>" readonly>
							</div>
 	<label for="mail" class="col-sm-1 control-label">Email</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm" id="mail" placeholder="Email" readonly value="<?php echo $email_cliente;?>">

							</div>
				
	 </div>
			
         <div class="form-group row">

							
 

						<label for="id_vendedor" class="col-sm-1 control-label">Sucursales</label>
				<div class="col-sm-3">
					<select class='form-control' name='id_vendedor' id='id_vendedor' required>
										<?php 
							$query_categoria=mysqli_query($con,"select * from sucursales where Sucur_Id=$Sucur_Id");
							while($rw=mysqli_fetch_array($query_categoria))	{
								?>
							<option value="<?php echo $Sucur_Id;?>"><?php echo $rw['Sucur_Nombre'];?></option>			
							
 
							<?php 
							$query_categoria=mysqli_query($con,"select * from sucursales where Sucur_Estado=1   order by Sucur_Nombre");
							while($rw=mysqli_fetch_array($query_categoria))	{
								?>
							<option value="<?php echo $rw['Sucur_Id'];?>"><?php echo $rw['Sucur_Nombre'];?></option>			
								<?php
							}
							?>	<?php
							}
							?>
					</select>			  
				</div>
	 		
					</div>		 
         <div class="form-group row">

							
								<label for="tel2" class="col-md-1 control-label">Fecha</label>
									<div class="col-md-2">
									<input type="text" class="form-control input-sm" id="fecha" value="<?php echo $fecha_factura;?>" readonly >
								
									<input type="date" class="form-control input-sm" name="fecha" id="fecha" value="<?php echo $fecha_factura;?>"  >
								</div>
								<label for="tel1" class="col-md-1 control-label">Factura_N</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="tel1" placeholder="id_factura" value="<?php echo $id_factura;?>" name="id_factura" readonly>
							</div>
						  	<label for="tel2" class="col-md-1 control-label"> </label>
								<div class="col-md-2">
									<span class="pull-right">
				<input class="btn btn-info" type="submit" name="submit" value="Guardar Factura"></span>

</form>	
								</div>							</div>
  

			 
		 
				







			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
			 		<th>#</th>
					<th>Estilista</th>
					<th>servicio</th>
				    <th>Costo</th>
	 
				 
					<th  >Acciones</th>
					
				</tr>
				<?php 

			include("modal/editar_das.php");
			?>
		 	<form class="form-horizontal" role="form" id="datos_cotizacion">

			<?php  
$q=mysqli_query($con,"select * from detfactura,estilistas,servicios where Det_Numero=$x and estilistas.Esti_Id=detfactura.Esti_Id
and servicios.Servi_Id=detfactura.Servi_Id");
							while($rrw=mysqli_fetch_array($q))	{
						 $id_producto =$rrw['Det_Id'];
						       $Esti_Id =$rrw['Esti_Id'];
 
                               $precio_producto =$rrw['Det_Costo'];
                               $nombre_producto =$rrw['Esti_Nombre']; 
                               $servicio_producto =$rrw['Servi_Nombre']; 
      
 
  
						       ?> 
		
				
					 
				
				
		            <input type="hidden" value="<?php echo $id_producto;?>" id="codigo_producto<?php echo $id_producto;?>">
					<input type="hidden" value="<?php echo $nombre_producto;?>" id="nombre_producto<?php echo $id_producto;?>">
					<input type="hidden" value="<?php echo $servicio_producto;?>" id="servicio_producto<?php echo $id_producto;?>">
				    <input type="hidden" value="<?php echo number_format($precio_producto,2,'.','');?>" id="precio_producto<?php echo $id_producto;?>">
			 
					<tr>
						
						 <td ><?php echo $x; ?></td>
						
						<td><?php echo ($nombre_producto);?></td>
						<td><?php echo ($servicio_producto);?></td>
	 <td ><?php echo number_format( $precio_producto,2); ?></td>
				<td ><span  >
					<a href="#" class='btn btn-info' title='Editar producto' onclick="obtener_datos('<?php echo $id_producto;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
					<a href="eliminar.php?id=<?php echo $id_producto?>" class='btn btn-info' title='Borrar producto'  ><i class="glyphicon glyphicon-trash"></i> </a></span></td>
						
					</tr>
					<?php
				}  
				?>
	 
			  </table>
			</div>



 


			</form>
			 
			
		</div>
	</div>		
		 
	</div>
	<hr>
	<?php
	include("footer.php");
	?>

 

 

	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 

<script>
 	 
		

$( "#editar_producto" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_das.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

	function obtener_datos(id){
			var codigo_producto = $("#codigo_producto"+id).val();
			var nombre_producto = $("#nombre_producto"+id).val();
			var servicio_producto = $("#servicio_producto"+id).val();
			var estado = $("#estado"+id).val();
			var precio_producto = $("#precio_producto"+id).val();
			$("#mod_id").val(codigo_producto); 
			$("#mod_nombre").val(nombre_producto);
			$("#mod_servicio").val(servicio_producto);
			$("#mod_precio").val(precio_producto);
		}
</script>
	<script>
		$(function() {
						$("#nombre_cliente").autocomplete({
							source: "./ajax/autocomplete/clientes.php",
							minLength: 2,
							select: function(event, ui) {
								event.preventDefault();
								$('#id_cliente').val(ui.item.id_cliente);
								$('#nombre_cliente').val(ui.item.nombre_cliente);
								$('#tel1').val(ui.item.telefono_cliente);
								$('#mail').val(ui.item.email_cliente);
																
								
							 }
						});
						 
						
					});
					
	$("#nombre_cliente" ).on( "keydown", function( event ) {
						if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
						{
							$("#id_cliente" ).val("");
							$("#tel1" ).val("");
							$("#mail" ).val("");
											
						}
						if (event.keyCode==$.ui.keyCode.DELETE){
							$("#nombre_cliente" ).val("");
							$("#id_cliente" ).val("");
							$("#tel1" ).val("");
							$("#mail" ).val("");
						}
			});	
	</script>

  </body>
</html>