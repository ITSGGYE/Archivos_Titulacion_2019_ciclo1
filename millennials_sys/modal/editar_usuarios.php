 	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar usuario</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_usuario" name="editar_usuario">
			<div id="resultados_ajax2"></div>
			<div class="form-group">
				<label for="firstname2" class="col-sm-3 control-label">Nombres</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="firstname2" name="firstname2" placeholder="Nombres" required>
				  <input type="hidden" id="mod_id" name="mod_id">
				</div>
			  </div>
			  <div class="form-group">
				<label for="lastname2" class="col-sm-3 control-label">Apellidos</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="lastname2" name="lastname2" placeholder="Apellidos" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="user_name2" class="col-sm-3 control-label">Usuario</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="user_name2" name="user_name2" placeholder="Usuario" pattern="[a-zA-Z0-9]{2,64}" title="Nombre de usuario ( sólo letras y números, 2-64 caracteres)"required>
				</div>
			  </div>
	  	  <div class="form-group">
				<label for="mod_rol" class="col-sm-3 control-label">Rol</label>
				<div class="col-sm-8">
				 <select class="form-control" id="mod_rol" name="mod_rol"  >
				 	 
					<option value="mod_rol">-- Seleccione --</option>
					<option value="1" selected>Gerente</option>
					<option value="2">Administrador</option>
					<option value="3">Secretaria(o)</option>
				  </select>
				</div>
			  </div>
			  
	  
		  	  <div class="form-group">
				<label for="status_cliente" class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-8">
				 <select class="form-control" id="status_cliente" name="status_cliente"  >
				 	 
					<option value="status_cliente">-- Seleccione --</option>
					<option value="1" selected>Activo</option>
					<option value="0" >inactivo</option> 
				  </select>
				</div>
			  </div>
				

					  <div class="form-group">
				<label for="sucursal_cliente" class="col-sm-3 control-label">Sucursal</label>
				<div class="col-sm-8">
				 <select class="form-control" id="sucursal_cliente" name="sucursal_cliente"  >
				 	 
					<option value="sucursal_cliente">-- Seleccione --</option>
					<option value="0" selected>Todos</option>
			<?php 
							$query_categoria=mysqli_query($con,"select * from sucursales where Sucur_Estado=1 order by Sucur_Id");
							while($rw=mysqli_fetch_array($query_categoria))	{
								?>
							<option value="<?php echo $rw['Sucur_Id'];?>"><?php echo $rw['Sucur_Nombre'];?></option>			
								<?php
							}
							?>
					</select>			  
				  </select>
				</div>
			  </div>		 	 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-info" id="actualizar_datos">Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>