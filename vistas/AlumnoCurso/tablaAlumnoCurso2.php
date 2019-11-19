<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$i=0;
$sql="SELECT cr.id_curso_alumno, a.id_alumno ,a.nombre_alumno, c.nombre_Curso, anio.anio_lectivo, cr.estado from 
 alumno a , curso c, aniolectivo anio, curso_alumno cr where
 cr.fk_alumno=a.id_alumno and cr.fk_curso=c.id_curso and 
 cr.fk_anio=anio.id_aniolectivo ";

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
    			<td align="center">Registrar Cobro Matricula</td>
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
					<td align="center"><?php echo $mostrar[2] ?></td>
							
					<td align="center"><?php echo $mostrar[3] ?></td>
					<td align="center"><?php echo $mostrar[4] ?></td>
					<?php switch ($mostrar[5]) {
						case '1':
							$estado="Habilitado";
							break;
						case '2':
							$estado="Becado";
							break;
						case '3':
							$estado="Desabilitado";
							break;
						case '4':
							$estado="Retirado";
							break;
						default:
							# code...
							break;
					} 
					?>
					<td align="center"><?php echo $estado ?></td>
					
					
					<td align="center"><a href="../vistas/Cobro_Matricula2.php?alumno=<?php echo $mostrar[1]?>" >
							<span class="fa fa-money" style="color: green; font-size:30px ;" aria-hidden="true"></span>
						</a></td>
					
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

