<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT dm.id_detalle_materia, m.nombre_materia, dm.actividad, dm.estado  FROM materia_inicial2 m , detalle_materia_inicial dm where dm.fk_materia=m.id_materia";
$result=mysqli_query($conexion,$sql);
?>


<div class="table-responsive">

	<table class="table table-bordered table-striped table-sm "  width="100%" cellspacing="0"  id="iddatatable">
		<thead  style="color:#333 white; font-weight: bold;">
			<tr class="letras">
				<td>Item</td>	
				<td>Materia</td>
				<td>Detalle</td>
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
					<td><?php echo $mostrar[2] ?></td>
					<?php
					if($mostrar[3]==1)
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
						<span  onclick="eliminar('<?php echo $mostrar[0] ?>')">
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
<script type="text/javascript">
	$(document).ready(function() {
    $('#iddatatable').DataTable( {
       
    } );
} );
</script>


