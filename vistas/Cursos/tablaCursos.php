	<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

               
$sql="SELECT id_curso, nombre_Curso, estado_Curso  FROM curso";
$result=mysqli_query($conexion,$sql);
?>


<div class="table-responsive">
	<table class="table table-bordered table-striped  table-sm"   cellspacing="0"   id="iddatatable" style=" text-align: center;">
		<thead  style="color:#333 white; font-weight: bold;">
			<tr class="letras">
				<td align="center">#</td>	
				<td align="center">Curso</td>
				<td align="center">Estado</td>
				<td align="center">Estudiantes </td>
				<td align="center">Tranferencia </td>
				<td align="center">Editar</td>
				<td align="center">Eliminar</td>
			</tr>
		</thead>
		
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
				
					<td align="center"><?php echo $mostrar[0] ?></td>
					<td align="center"><?php echo $mostrar[1] ?></td>
					<?php
					if($mostrar[2]==1)
					{
						?> <td align="center"><?php echo "Habilitado" ?></td>
					<?php
					}
					 
					else {
						?> <td align="center"><?php echo "Deshabilitado" ?></td>
						<?php
					}?>
					
					
					<td align="center"><a href="../vistas/Nomina_Alumno.php?curso=<?php echo $mostrar[0]?>"   ><span class="fa fa-address-card" style="font-size: 20px; color: blue;" ></span></a></td>
					<td align="center"><a href="../vistas/Cambiar_Curso.php?curso=<?php echo $mostrar[0]?>"   ><span class="fa fa-share" style="font-size: 20px; color: green;" ></span></a></td>
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
    $('#iddatatable').DataTable( {
       
    } );
} );
</script>


