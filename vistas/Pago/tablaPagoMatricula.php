<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$i=0;
$imgVer="";
$sql="SELECT 	p.nombre_repre, a.direc_alumno, p.celular_repre, p.cedula_repre, a.nombre_alumno,co.fechareg, c.nombre_curso, co.id_cobromatricula, a.cedula_alumno, a.id_alumno, an.anio_lectivo FROM alumno a, curso_alumno cr, curso c, cobro_matricula co, datos_representante p, aniolectivo an  where   a.id_alumno=co.fk_alumno and
		cr.fk_alumno=p.fk_alumno and cr.fk_curso=c.id_curso and co.fk_alumno=p.fk_alumno and p.fk_alumno=a.id_alumno and co.fk_anio=an.id_aniolectivo";
$result=mysqli_query($conexion,$sql);
?>


<div class="table-responsive">
	<table class="table table-bordered table-striped  table-sm"  width="100%" cellspacing="0"  id="iddatatable">
		<thead  style="color:#333 white; font-weight: bold;">
			<tr >
				<td align="center">Factura</td>
				<td align="center">Anio Lectivo</td>
				<td align="center">Fecha</td>
				<td align="center">C. Alumno</td>
				<td align="center">Cliente</td>
				<td align="center">Dirección</td>
				<td align="center">Telefono</td>
				<td align="center">Ruc</td>
				<td align="center">Alumno</td>
				<td align="center">Curso</td>
				<td align="center">PDF</td>
				<td align="center">Editar</td>
				<td align="center">Eliminar</td>
			</tr>
		</thead>
		
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
					<td align="center"><?php echo $mostrar[7] ?></td>
					<td align="center"><?php echo $mostrar[10] ?></td>
					<td align="center"><?php echo $mostrar[5] ?></td>
					<td align="center"><?php echo $mostrar[8] ?></td>
					<td align="center"><?php echo $mostrar[0] ?></td>
					<td align="center"><?php echo $mostrar[1] ?></td>
					<td align="center"><?php echo $mostrar[2] ?></td>
					<td align="center"><?php echo $mostrar[3] ?></td>
					<td align="center"><?php echo $mostrar[4] ?></td>
					<td align="center"><?php echo $mostrar[6] ?></td>
					
					
					<td><a href="../procesos/Reportes/Matricula_Alumno.php?alumno=<?php echo $mostrar[9]?>" class="btn btn-danger btn-sm">
							PDF <span class="glyphicon glyphicon-list-alt"></span>
						</a></td>
					
					<td style="text-align: center;">
						<span  data-toggle="modal" data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[7] ?>')">
							<span class="fa fa-pencil" aria-hidden="true"></span>
						</span>
					</td>
					
					<td style="text-align: center;">
						<span  onclick="eliminarDatos('<?php echo $mostrar[7] ?>')">
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

