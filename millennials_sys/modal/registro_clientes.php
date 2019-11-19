  <?php
  
	require_once ("config/db.php"); 
	require_once ("config/conexion.php"); 
?>
	<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo cliente</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_cliente" name="guardar_cliente">

			<div id="resultados_ajax"></div>

			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nombre" name="nombre" required>
				</div>
			  </div>

			  	  <div class="form-group">
				<label for="apellido" class="col-sm-3 control-label">Apellido</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nombre" name="apellido" required>
				</div>
			  </div>

			  <div class="form-group">
				<label for="telefono" class="col-sm-3 control-label">Teléfono</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="telefono" name="telefono" required>
				</div>
			  </div>
			  	 
			  	  <div class="form-group">
				<label for="edad" class="col-sm-3 control-label">Edad</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="edad" name="edad" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="email" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-8">
					<input type="email" class="form-control" id="email" name="email" required>
				  
				</div>
			  </div>
			  
			  	  <div class="form-group">
				<label for="genero" class="col-sm-3 control-label">Genero</label>
				<div class="col-sm-8">
				 <select class="form-control" id="genero" name="genero" required>
					<option value="">-- Selecciona Genero --</option>
					<option value="2" selected>Neutro</option>
					<option value="1" selected>Hombre</option>
					<option value="0">Mujer</option>
				  </select>
				</div>
			  </div>

			 
			  
	  
			  <div class="form-group">
				<label for="mod_estado" class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-8">
				 <select class="form-control" id="mod_estado" name="mod_estado" required>
					<option value="">-- Selecciona estado --</option>
					<option value="1" selected>Activo</option>
					<option value="0">Inactivo</option>
				  </select>
				</div>
			  </div>
			 
		<div class="form-group">
				<label for="marketing" class="col-sm-3 control-label">Como Llego</label>
				<div class="col-sm-8">
					<select class='form-control' name='marketing' id='marketing' required>
						<option value="">Selecciona una categoría</option>
							<?php 
							$query_categoria=mysqli_query($con,"select * from marketing order by Mar_Nombre");
							while($rw=mysqli_fetch_array($query_categoria))	{
								?>
							<option value="<?php echo $rw['Mar_Id'];?>"><?php echo $rw['Mar_Nombre'];?></option>			
								<?php
							}
							?>
					</select>			  
				</div>
			  </div>
				
				
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-info" id="guardar_datos">Guardar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	 