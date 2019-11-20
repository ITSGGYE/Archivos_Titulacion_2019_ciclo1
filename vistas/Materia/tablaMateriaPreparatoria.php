<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT id_materia, nombre_materia, estado_materia  FROM materia_preparatoria";
$result=mysqli_query($conexion,$sql);
?>


<div class="row justify-content-md-center">
<div class="col-md-auto">
	<table class="table table-bordered table-striped table-sm "  width="100%" cellspacing="0"  id="iddatatable">
		<thead  style="color:#333 white; font-weight: bold;">
			<tr class="letras">
				<td>#</td>	
				<td>Ámbito</td>
				<td>Estado</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
				
					<td><?php echo $mostrar[0] ?></td>
					<td><?php echo $mostrar[1] ?></td>
					<?php
					if($mostrar[2]==1)
					{
						?> <td><?php echo "Habilitado" ?></td>
					<?php
					}
					 
					else {
						?> <td><?php echo "Desabilitado" ?></td>
						<?php
					}?>
					
					
					
								
					<td style="text-align: center;">
						<span  data-toggle="modal" data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')">
							<span class="fa fa-pencil" ></span>
						</span>
					</td>
					<td style="text-align: center;">
						<span  onclick="eliminarDatos('<?php echo $mostrar[0] ?>')">
							<span class="fa fa-trash"></span>
						</span>
					</td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
    $('#iddatatable').DataTable( {
       
    } );
} );
</script>


