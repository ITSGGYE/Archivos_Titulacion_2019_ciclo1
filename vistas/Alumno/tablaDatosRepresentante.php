<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$i=0;
$imgVer="";
$sql="SELECT 			
			 a.id_alumno,	
			 a.nombre_alumno,				
			 d.nombre_repre,
			 d.cedula_repre,			
			 d.celular_repre,				
			 d.email_repre,				
			 d.ocupacion_repre,
			 d.relacionf_repre,
			 d.id_datosrepresentante			
			 FROM alumno a inner join  datos_representante d on a.id_alumno=d.fk_alumno order by a.id_alumno asc";
$result=mysqli_query($conexion,$sql);
?>


<div class="table-responsive">
	<table class="table table-bordered table-striped  table-sm table-hover"  width="100%" cellspacing="0"  id="iddatatable">
		<thead  style="color:#333 white; font-weight: bold;">
			<tr >
				<td align="center">Matricula</td>
				<td align="center">Estudiante</td>
				<td align="center">Representante</td>
				<td align="center">Cédula</td>
				<td align="center">Celular</td>
				<td align="center">Email</td>
				<td align="center">Ocupación</td>
				<td align="center">Relación</td>
				<td align="center">Editar</td>
				<td align="center">Eliminar</td>
			</tr>
		</thead>
		
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
					<td align="center"><p><?php echo $mostrar[0] ?></p></td>
					<td align="center"><p><?php echo $mostrar[1] ?></p></td>
					<td align="center"><p><?php echo $mostrar[2] ?></p></td>
					<td align="center"><p><?php echo $mostrar[3] ?></p></td>
					<td align="center"><p><?php echo $mostrar[4] ?></p></td>
					<td align="center"><p><?php echo $mostrar[5] ?></p></td>
					<td align="center"><p><?php echo $mostrar[6] ?></p></td>
					<?php switch ($mostrar[7]) {
						case '1':
							$relacion="Padre";
							break;
						case '2':
							$relacion="Madre";
							break;
						case '3':
							$relacion="Tio/a";
							break;
						case '4':
							$relacion="Abuelo/a";
							break;
						case '5':
							$relacion="Hermana/o";
							break;
						
						
						default:
							# code...
							break;
					}
					?>
					<td align="center"><p><?php echo $relacion ?></p></td>
					
					
					
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

