<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$i=0;
$imgVer="";
$sql="SELECT 	r.nombre_repre, a.nombre_alumno,p.fechareg, c.nombre_curso, p.id_cobro, p.tipo,p.mes, a.cedula_alumno, a.id_alumno, an.anio_lectivo  FROM alumno a, curso_alumno cr, curso c, cobro_pensiones p, datos_representante r, aniolectivo an
where   a.id_alumno=p.fk_alumno and
		cr.fk_alumno=p.fk_alumno and cr.fk_curso=c.id_curso and r.fk_alumno=p.fk_alumno and p.fk_anio=an.id_aniolectivo";
$result=mysqli_query($conexion,$sql);
?>


<div class="table-responsive">
	<table class="table table-bordered table-striped  table-sm"  width="100%" cellspacing="0"  id="iddatatable">
		<thead  style="color:#333 white; font-weight: bold;">
			<tr >
				<td align="center">Factura</td>
				<td align="center">Año Lectivo</td>
				<td align="center">Fecha</td>
				<td align="center">C.Alumno</td>
				
				<td align="center">Cliente</td>
				<td align="center">Alumno</td>
				<td align="center">Curso</td>
				<td align="center">Tipo</td>
				<td align="center">Mes</td>
				<td align="center">PDF</td>
				
				<td align="center">Editar</td>
				<td align="center">Eliminar</td>
			</tr>
		</thead>
		
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
					<td align="center"><?php echo $mostrar[4] ?></td>
					<td align="center"><?php echo $mostrar[9] ?></td>
					<td align="center"><?php echo $mostrar[2] ?></td>
					<td align="center"><?php echo $mostrar[7] ?></td>
					<td align="center"><?php echo $mostrar[0] ?></td>
					<td align="center"><?php echo $mostrar[1] ?></td>
					<td align="center"><?php echo $mostrar[3] ?></td>
					
					<?php 
					if ($mostrar[5]==1){
						$tipo="Pensión";
					}  else {
						if($mostrar[5]==2){
						 $tipo="Adicional";
						}
					}
					 ?>
					<td align="center"><?php echo $tipo ?></td>
					<?php 
					switch ($mostrar[6]) {
						case '1':
							$mes="Enero";
							break;
						case '2':
							$mes="Febrero";
							break;
						case '3':
							$mes="Marzo";
							break;
						case '4':
							$mes="Abril";
							break;
						case '5':
							$mes="Mayo";
							break;
						case '6':
							$mes="Junio";
							break;
						case '7':
							$mes="Julio";
							break;
						case '8':
							$mes="Agosto";
							break;
						case '9':
							$mes="Septiembre";
							break;
						case '10':
							$mes="Octubre";
							break;
						case '11':
							$mes="Noviembre";
							break;
						case '12':
							$mes="Diciembre";
							break;
						default:
							# code...
							break;
					}
					?>
					<td align="center"><?php echo $mes?></td>
					
					<td><a href="../procesos/Reportes/Pension_Alumno.php?alumno=<?php echo $mostrar[8]?>" class="btn btn-danger btn-sm">
							PDF <span class="glyphicon glyphicon-list-alt"></span>
						</a></td>
					
					<td style="text-align: center;">
						<span  data-toggle="modal" data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[4] ?>')">
							<span class="fa fa-pencil" aria-hidden="true"></span>
						</span>
					</td>
					
					<td style="text-align: center;">
						<span  onclick="eliminarDatos('<?php echo $mostrar[4] ?>')">
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

