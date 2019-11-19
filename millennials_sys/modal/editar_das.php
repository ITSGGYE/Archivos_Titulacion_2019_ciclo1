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
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Fatura</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_producto" name="editar_producto">
			<div id="resultados_ajax2"></div>

				   <div style="display: none ;" class="form-group">
				<label for="mod_id" class="col-sm-3 control-label">Numero</label>
				<div class="col-sm-8">
				  <textarea class="form-control" id="mod_id"  name="mod_id" placeholder="Numero"  required></textarea>
				</div>
			  </div>
			 
			   <div class="form-group">
				<label for="mod_nombre" class="col-sm-3 control-label">Estilistas</label>
				<div class="col-sm-8">
					<select class='form-control' name='mod_nombre' id='mod_nombre' required > 
 
							<?php 
							$query_categoria=mysqli_query($con,"select * from estilistas order by Esti_Nombre");
							while($rw=mysqli_fetch_array($query_categoria))	{
								?>
							<option value="<?php echo $rw['Esti_Id'];?>"><?php echo $rw['Esti_Nombre'];?></option>			
								<?php
							}	 
							?>
					</select>			  
				</div>
			  </div>

			   <div class="form-group">
				<label for="mod_servicio" class="col-sm-3 control-label">Servicios</label>
				<div class="col-sm-8">
					<select class='form-control' name='mod_servicio' id='mod_servicio' required > 
							<?php 
							$query_categoria=mysqli_query($con,"select * from servicios order by Servi_Nombre");
							while($rw=mysqli_fetch_array($query_categoria))	{
								?>
							<option value="<?php echo $rw['Servi_Id'];?>"><?php echo $rw['Servi_Nombre'];?></option>			
								<?php
							}	 
							?>
					</select>			  
				</div>
			  </div>
			 
			  <div class="form-group">
				<label for="mod_precio" class="col-sm-3 control-label">Precio</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_precio" name="mod_precio" placeholder="Precio de venta del producto" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa s¨®lo n¨²meros con 0 ¨® 2 decimales" maxlength="8">
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