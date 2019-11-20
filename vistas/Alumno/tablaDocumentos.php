<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$i=0;
$imgVer="";
$sql="SELECT img.ruta,	
			 a.cedula_alumno,
			 a.nombre_alumno,
			 a.apellido_alumno,
			 d.informe1,
			 d.informe2,
			 d.fotos,
			 d.cedula3,
			 d.planilla,
			 d.id_documento	
			 	
			 FROM documentos_alumno d , sub_documentos img, datos_alumno a where d.documentos=img.id_imagen and d.fk_alumno=a.cedula_alumno";
$result=mysqli_query($conexion,$sql);
?>


<div class="table-responsive">
	<table class="table table-bordered table-striped  table-sm"  width="100%" cellspacing="0"  id="iddatatable">
		<thead  style="color:#333 white; font-weight: bold;">
			<tr >
				<td align="center">Nº</td>
				<td align="center">PDF</td>
				<td align="center">Matrícula</td>
				<td align="center">Estudiante</td>
				<td align="center">I. Económico</td>
				<td align="center">I. Notas</td>
				<td align="center">Fotos</td>
				<td align="center">C.I. Estudiante</td>
				<td align="center">Planilla</td>
				
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
					<td align="center"><?php echo $i ?></td>
					<td align="center">
					<?php 
				$imgVer=explode("/", $mostrar[0]) ; 
				$imgruta=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3]."/".$imgVer[4];
			?>
			<a href="<?php echo $imgruta ?> " target="_blank"><span class="fa fa-file-pdf-o " style="color: red; font-size: 20px;"></span> </a>
			</td>
					<td><?php echo $mostrar[1]?></td>
					<td><?php echo $mostrar[3].' '.$mostrar[2] ?></td>
					<?php if($mostrar[4]==1){
						echo '<td align="center">Si</td>';
					} else {
						if($mostrar[4]==2){
						echo '<td align="center" >No</td>';
						}
					}
					?>
					<?php if($mostrar[5]==1){
						echo '<td align="center">Si</td>';
					} else {
						if($mostrar[5]==2){
						echo '<td align="center">No</td>';
						}
					}
					?>
					<?php if($mostrar[6]==1){
						echo '<td align="center">Si</td>';
					} else {
						if($mostrar[6]==2){
						echo '<td align="center">No</td>';
						}
					}
					?>
					<?php if($mostrar[7]==1){
						echo '<td align="center">Si</td>';
					} else {
						if($mostrar[7]==2){
						echo '<td align="center">NO¡o</td>';
						}
					}
					?>
					<?php if($mostrar[8]==1){
						echo '<td align="center">Si</td>';
					} else {
						if($mostrar[8]==2){
						echo '<td align="center">No</td>';
						}
					}
					?>
					
					
					
					<td style="text-align: center;""><a href="../vistas/Editar_Documento.php?id=<?php echo $mostrar[1]?>">
						<span class="fa fa-pencil" aria-hidden="true"></span></a></td>
					<td style="text-align: center;">
						<span  onclick="eliminarDatos('<?php echo $mostrar[9] ?>')">
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

