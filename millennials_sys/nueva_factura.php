    <?php
 
	session_start();

	if (!isset($_SESSION['active']) AND $_SESSION['active'] != true) {
        include("loguot.php"); 
		exit;
        }        
$Rol_Id=$_SESSION['rol'];
  $User_Id=$_SESSION['idUser'];

 date_default_timezone_set('America/Guayaquil'); 
 
	$active_productos="";
	$active_clientes="";
	$active_usuarios="";	
	$title="Facturas | Millennials Sistema";
?><?php
  
	require_once ("config/db.php"); 
	require_once ("config/conexion.php"); 
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
			<h4><i class='glyphicon glyphicon-edit'></i> Nueva Factura</h4>
		</div>
		<div class="panel-body">
		<?php 
			include("modal/buscar_productos.php");
			include("modal/registro_clientes.php");
			include("modal/registro_productos.php");
		?>


<div style="position: relative; left: 526px">
	
<script type="text/javascript">
             function procesar(xform){
             window.open(xform, 'nventana', 'width=800,height=250,top=250,left=250,status=yes,resizable=yes,scrollbars=yes');
           } </script>
					    	
					    	 <form action="modal/vi_facturas.php" method="post" target="nventana" onsubmit="procesar(this.action);"> 
					    	 <input type="hidden" name="a"value="" id="cli_cliente">
					    	 <input type="submit" class="btn btn-info" value="Historial de facturas">  
					    	 </form>	

</div>



			<form class="form-horizontal" role="form" id="datos_factura">
				 <div class="form-group row">
				  <label for="nombre_cliente" class="col-md-1 control-label">Cliente</label>
				     <div class="col-md-3">
					  <input type="text" class="form-control input-sm" id="nombre_cliente"  placeholder="Selecciona un Cliente" required="registre nuevo usuario">
					  <input id="id_cliente" type='hidden'>	 			
					
					

				     </div><!-- Carga los datos ajax -->					
		         </div>
   <div id="resultados" class='col-md-12' style="margin-top:10px"> 

	     </div>
	      




				  <br><hr>


                     <div class="col-md-12">
		
			 <?php 
        if($_SESSION['rol'] == 1){
    
 
      
       ?>
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevoProducto">
						 <span class="glyphicon glyphicon-plus"></span> Nuevo Servicio
						</button>  <?php } ?>
			 
	 
						 
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
						 <span class="glyphicon glyphicon-search"></span>Agregar Pedido
						</button>
					

								

 

				  <br> <hr>
 
	<div class="form-group row">
				  <label for="cliente" class="col-md-1 control-label">Nombre</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="cliente" placeholder="Nombre" readonly>
							</div>	  
				 <label for="apellido_cliente" class="col-md-1 control-label">Apellido</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="apellido_cliente" placeholder="Apellido" readonly>
							</div>
			 

				 </div>


		<div class="form-group row">
						    
                            	<label for="usuario" class="col-md-1 control-label">Digitador</label>
							<div class="col-md-2">
									<?php 
							$query_categoria=mysqli_query($con,"select * from usuarios where User_Id=$User_Id");
							while($rw=mysqli_fetch_array($query_categoria))	{
								?>
										<input type="hidden" class="form-control input-sm" id="usuario" value="<?php echo $rw['User_Id']; ?>" readonly>
										<input type="Text" class="form-control input-sm" id="a" value="<?php echo $rw['User_Nombre']; ?>" readonly>
								<?php 
							}
							?>
					
							</div>
                            

                           <label for="tel2" class="col-md-1 control-label">Fecha</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>
							</div>

						 
  
						</div>


	 <div class="form-group row">
						    
        
				<label for="id_vendedor" class="col-sm-1 control-label">Sucursales</label>
				<div class="col-sm-3">
					<select class='form-control' name='id_vendedor' id='id_vendedor' required>
						<option value="">Seleccione Sucursal</option>
							<?php 
							$query_categoria=mysqli_query($con,"select * from sucursales where Sucur_Estado=1  order by Sucur_Nombre");
							while($rw=mysqli_fetch_array($query_categoria))	{
								?>
							<option value="<?php echo $rw['Sucur_Id'];?>"><?php echo $rw['Sucur_Nombre'];?></option>			
								<?php
							}
							?>
					</select>			  
				</div>
	 
 
						</div>
				
				            	 <div class="pull-right">  	
					</div>	
	 
					              </div>	
			<button type="submit" class="btn btn-info">
						  <span class="glyphicon glyphicon-save"></span>Guardar
						</button>
			</form>	
			
		
	</div>		
		  <div class="row-fluid">
			<div class="col-md-12">
			
	

			
			</div>	
		 </div>
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/nueva_factura.js"></script>
	<link rel="stylesheet" href="assests/bootstrap/css/jquery-ui.css"> 
    <script src="assests/jquery/jquery-ui.js"></script>
	<script>
		$(function() { 
						$("#nombre_cliente").autocomplete ({

							source: "./ajax/autocomplete/clientes.php",
							minLength: 1 ,
                             

							select: function(event, ui) {
                               
								event.preventDefault();

                                 	$("#resultados").html('');
								$('#id_cliente').val(ui.item.id_cliente);
								$('#nombre_cliente').val(ui.item.nombre_cliente);
								$('#apellido_cliente').val(ui.item.apellido_cliente);
								$('#id_vendedor').val(ui.item.id_vendedor);
								$('#cliente').val(ui.item.cliente);
								$('#tel1').val(ui.item.telefono_cliente);
								$('#mail').val(ui.item.email_cliente);
$('#cli_cliente').val(ui.item.cli_cliente);		
															
								
							 }
						});
						 
						
					});	
				$("#nombre_cliente" ).on( "keydown", function( event ) {
		 $("#resultados").html('<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">	 <span class="glyphicon glyphicon-user"></span> Nuevo cliente  </button> ');	

						if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
						{  if (event.keyCode==""){	
		    	
                    	   $("#resultados").html('<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">	 <span class="glyphicon glyphicon-user"></span> Nuevo cliente  </button> ');	
						 $("#nombre_cliente" ).val("");
                          $('#apellido_cliente').val("");
							$('#id_vendedor').val("");
								$('#cliente').val("");
							$("#id_cliente" ).val("");
							$("#tel1" ).val("");
							$("#mail" ).val("");	
$('#cli_cliente').val("");	 
							 		}
					
						if (event.keyCode==$.ui.keyCode.DELETE){
                      $("#resultados").html('<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">	 <span class="glyphicon glyphicon-user"></span> Nuevo cliente  </button> ');	
							$("#nombre_cliente" ).val("");  
							$('#apellido_cliente').val("");
							$('#sucursales_cliente').val("");
							$("#id_cliente" ).val("");
							$("#cliente" ).val("");
							$("#tel1" ).val("");
							$("#mail" ).val("");
$('#cli_cliente').val("");	
							if (event.keyCode==$.ui.keyCode.LEFT){
                                    $("#resultados").html('<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">	 <span class="glyphicon glyphicon-user"></span> Nuevo cliente  </button> ');		

						}

						}		if (event.keyCode==$.ui.keyCode.BACKSPACE){
                                 $("#resultados").html('<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">	 <span class="glyphicon glyphicon-user"></span> Nuevo cliente  </button> ');	

						}	if (event.keyCode==$.ui.keyCode.RIGHT){
                                    $("#resultados").html('<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">	 <span class="glyphicon glyphicon-user"></span> Nuevo cliente  </button> ');		

						}	
					
	                       if (event.keyCode==$.ui.keyCode.DOWN){
                                   $("#resultados").html('<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">	 <span class="glyphicon glyphicon-user"></span> Nuevo cliente  </button> ');		

						}
			 
						if (event.keyCode==$.ui.keyCode.UP){
                                    $("#resultados").html('<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">	 <span class="glyphicon glyphicon-user"></span> Nuevo cliente  </button> ');		

						}




					}	 
			});	
	</script>
 
  </body>
</html>