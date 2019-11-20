<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$i=0;
$sql="SELECT cr.id_curso_alumno, a.nombre_alumno, c.nombre_Curso,  anio.anio_lectivo, cr.estado, a.id_alumno ,p.nombre_paralelo from 
 alumno a , curso c, paralelo p, aniolectivo anio, curso_alumno cr where
 cr.fk_alumno=a.id_alumno and cr.fk_curso=c.id_curso and cr.fk_paralelo=p.id_paralelo and 
 cr.fk_anio=anio.id_aniolectivo order by cr.fk_curso";

$result=mysqli_query($conexion,$sql);

?>


<div class="table-responsive">
	<table class="table table-bordered table-striped  table-sm"   width="100%" cellspacing="0"  id="iddatatable">
		<thead  style="color:#333 white; font-weight: bold;">
			<tr >
				<td align="center">Nº </td>
				<td align="center">Matrícula</td>
				<td align="center">Estudiante</td>
				<td align="center">Curso</td>
				<td align="center">Paralelo</td>
				<td align="center">Año Lectivo</td>
				<td align="center">Estado</td>
				<td align="center">PDF</td>
				<td align="center">Editar</td>
				<td align="center">Eliminar</td>
			</tr>
		</thead>
		
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				$i++;
				?>
				<tr >

					<td><?php echo $i ?></td>
					<td align="center"><?php echo $mostrar[5] ?></td>
					<td align="center"><?php echo $mostrar[1] ?></td>
				

					
					<td align="center"><?php echo $mostrar[2] ?></td>
					<td align="center"><?php echo $mostrar[6] ?></td>
					<td align="center"><?php echo $mostrar[3] ?></td>
					<?php 
						if($mostrar[4]==1){
							$nombre_estado="Habilitado";
						}
						if($mostrar[4]==0){
							$nombre_estado="Desabilitado";
						}
						if($mostrar[4]==2){
							$nombre_estado="Retirado";
						}
						?>
						
						
					<td align="center"><?php echo $nombre_estado ?></td>
					
					
					<td style="text-align: center;">
						<a href="../procesos/Reportes/Ficha_Alumno.php?id=<?php echo $mostrar[5]?>&nombre=<?php echo  $mostrar[1]?>&curso=<?php echo  $mostrar[2]?>&paralelo=<?php echo  $mostrar[6]?>" class="btn btn-sm btn-danger "  >	PDF
					</td>
					
							
					<td style="text-align: center;">
						<span  data-toggle="modal" data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')">
							<span class="fa fa-pencil" aria-hidden="true"></span>
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
    	 "lengthMenu": [[25, 50, 100,-1], [25, 50, 100, "Todos"]]
       
    } );
} );
</script>

