<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$i=0;
$imgVer="";
$sql="SELECT 			
			 a.id_alumno,	
			 a.nombre_alumno,				
			 d.nombre_padre,
			 d.cedula_padre,			
			 d.celular_padre,				
			 d.nombre_madre,				
			 d.cedula_madre,
			 d.celular_madre,
			 d.id_datosfamiliares			
			 FROM alumno a inner join  datos_familiares d on a.id_alumno=d.fk_alumno";
$result=mysqli_query($conexion,$sql);
?>


<div class="table-responsive">
	<table class="table table-bordered table-striped  table-sm table-hover"  width="100%" cellspacing="0"  id="iddatatable">
		<thead  style="color:#333 white; font-weight: bold;">
			<tr >
				<td align="center">Matricula</td>
				<td align="center">Estudiante</td>
				<td align="center">Padre</td>
				<td align="center">Cédula</td>
				<td align="center">Celular</td>
				<td align="center">Madre</td>
				<td align="center">Cédula</td>
				<td align="center">Celular</td>
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
					<td align="center"><?php echo $mostrar[2] ?></td>
					<td align="center"><?php echo $mostrar[3] ?></td>
					<td align="center"><?php echo $mostrar[4] ?></td>
					<td align="center"><?php echo $mostrar[5] ?></td>
					<td align="center"><?php echo $mostrar[6] ?></td>
					<td align="center"><?php echo $mostrar[7] ?></td>
					
					
					
					<td style="text-align: center;">
						<span  data-toggle="modal" data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[8] ?>')">
							<span class="fa fa-pencil" aria-hidden="true"></span>
						</span>
					</td>
					
					<td style="text-align: center;">
						<span  onclick="eliminarDatos('<?php echo $mostrar[8] ?>')">
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
    	"lengthMenu": [[25, 50, 100,-1], [25, 50, 100, "Todos"]]
        
    } );
} );
</script>

