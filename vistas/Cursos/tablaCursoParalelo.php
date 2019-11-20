	<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

               
$sql="SELECT cp.id_cursoparalelo, c.nombre_curso, p.nombre_paralelo ,cp.estado  FROM curso c , paralelo p, curso_paralelo cp where  cp.fk_curso=c.id_curso and cp.fk_paralelo=p.id_paralelo";
$result=mysqli_query($conexion,$sql);
?>


<div class="table-responsive">
	<table class="table table-bordered table-striped  table-sm"   cellspacing="0"   id="iddatatable" style=" text-align: center;">
		<thead  style="color:#333 white; font-weight: bold;">
			<tr class="letras">
				<td>#</td>	
				<td>Curso</td>
				<td>Paralelo</td>
				<td>Estado</td>
				<td> Alumnos </td>
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
						?> <td><?php echo "Deshabilitado" ?></td>
						<?php
					}?>
					
					<td style="text-align: center;""><a href="../vistas/Listado_Alumno.php?id=<?php echo $mostrar[0]?>">
						<span class="fa fa-address-book" aria-hidden="true"></span></a></td>
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
<script type="text/javascript">
$(document).ready(function() {
  $('#iddatatable').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});
</script>


