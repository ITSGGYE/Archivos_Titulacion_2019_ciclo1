	<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT t.id_tutor, p.nombre_profesor, c.nombre_Curso, t.estado FROM profesor p inner join tutor t on p.id_profesor=t.fk_profesor inner join curso c on t.fk_curso=c.id_curso ; 
";
$result=mysqli_query($conexion,$sql);
?>


<div class="table-responsive">
	<table class="table table-bordered table-striped table-sm "  width="80%" cellspacing="0"  id="iddatatable" align="center">
		<thead  style="color:#333 white; font-weight: bold;">
			<tr>
				<td>Nº</td>
				<td>Docente</td>
				<td>Curso</td>
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


