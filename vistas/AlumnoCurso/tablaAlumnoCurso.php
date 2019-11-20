<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$i=0;
$sql="SELECT cr.id_curso_alumno, a.cedula_alumno, a.apellido_alumno,a.nombre_alumno, 
 (Select c.nombre_curso from curso c ,curso_paralelo cp where  cp.id_cursoparalelo=cr.fk_cursoparalelo and cp.fk_curso=c.id_curso) as curso , (Select pa.nombre_paralelo from paralelo pa ,curso_paralelo cp where  cp.id_cursoparalelo=cr.fk_cursoparalelo and cp.fk_paralelo=pa.id_paralelo) as paralelo, anio.anio_lectivo, cr.estado from 
 datos_alumno a ,  aniolectivo anio, curso_alumno cr where cr.fk_alumno=a.cedula_alumno  and  cr.fk_anio=anio.id_aniolectivo order by cr.fk_cursoparalelo";

$result=mysqli_query($conexion,$sql);

?>


<div class="table-responsive">
	<table class="table table-bordered table-striped  table-sm"   width="100%" cellspacing="0"  id="iddatatable">
		<thead  style="color:#333 white; font-weight: bold;">
			<tr >
				<td align="center"> Nº </td>
				<td align="center">Matrícula</td>
				<td align="center">Estudiante</td>
				
				<td align="center">Curso</td>
				<td align="center">Año Lectivo</td>
				<td align="center">Estado</td>
				
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
					<td align="center"><?php echo $mostrar[1] ?></td>
					<td align="center"><?php echo $mostrar[2].' '.$mostrar[3] ?></td>
				

					
					<td align="center"><?php echo $mostrar[4].' '.$mostrar[5] ?></td>
					<td align="center"><?php echo $mostrar[6] ?></td>
					<?php if ($mostrar[7]==1){
						$estado="Habilitado"; 
					} else {
						if($mostrar[7]==2){
							$estado="Desabilitado";
						}
					else{
						if($mostrar[7]==3){
						$estado="Retirado";
	
						}
											}
					}
					?>
					<td align="center"><?php echo $estado ?></td>
						
					
					
								
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
  $('#iddatatable').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});
</script>

