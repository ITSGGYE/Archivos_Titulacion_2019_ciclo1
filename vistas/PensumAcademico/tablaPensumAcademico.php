<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$i=0;
$sql="SELECT p.id_pensum, d.nombre_profesor, (Select c.nombre_curso from curso c ,curso_paralelo cp where  cp.id_cursoparalelo=p.fk_curso and cp.fk_curso=c.id_curso) as curso , (Select pa.nombre_paralelo from paralelo pa ,curso_paralelo cp where  cp.id_cursoparalelo=p.fk_curso and cp.fk_paralelo=pa.id_paralelo) as paralelo ,
 a.anio_lectivo, p.estado, p.fecha_registro  from  aniolectivo a, pensum_academico p , profesor d  where p.fk_anio=a.id_aniolectivo  and p.fk_profesor=d.id_profesor";
$result=mysqli_query($conexion,$sql);
?>

<div class="table-responsive">
					
						<hr>
	<table class="table table-bordered table-striped table-sm "  width="100%" cellspacing="0"  id="iddatatable">
		<thead  style="color:#333 white; font-weight: bold;">
			<tr class="letras">
				<td align="center">Nª</td>
				<td align="center">Profesor</td>
				<td align="center">Curso</td>
				<td align="center">Año Lectivo</td>
				<td align="center">Estado</td>
				<td align="center">Fecha</td>
				<td align="center">Editar</td>
				<td align="center">Eliminar</td>
			</tr>
		</thead>
		
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				$i++
				?>
				
					<td align="center"><?php echo $i ?></td>
					<td align="center"><?php echo $mostrar[1] ?></td>

					<td align="center"><?php echo $mostrar[2].'-'.$mostrar[3] ?></td>
					<td align="center"><?php echo $mostrar[4] ?></td>
					
					<?php 
					if($mostrar[5]==1){
						$estado='Activo';
					} else{
						if($mostrar[5]==2) {
							$estado='Inactivo';
						}
					else {
						if($mostrar[5]==3) {
							$estado='Espera';
						}
					}
				}
				?>
					<td align="center"><?php echo $estado ?></td>
					<td align="center"><?php echo $mostrar[6] ?></td>
								
					<td style="text-align: center;">
						<span  data-toggle="modal" data-target="#modalEditar"onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')">
							<span class="fa fa-pencil" ></span>
						</span>
					</td>
					<td style="text-align: center;">
						<span  onclick="eliminar('<?php echo $mostrar[0] ?>')">
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

