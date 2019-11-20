<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$i=0;
$imgVer="";
$sql="SELECT img.ruta,			
			 a.cedula_alumno,	
			 a.apellido_alumno,	
			 a.nombre_alumno,			
			 a.fechanac_alumno,			
			 a.direccion_alumno,				
			 a.telefono_alumno,	
			 a.emerg_alumno,
			 a.telefono2_alumno,
			 a.sexo_alumno,
			 a.estado_alumno

			 FROM datos_alumno a inner join img_datosalumno img on a.imagen_alumno=img.id_imagen ";
$result=mysqli_query($conexion,$sql);
?>


<div class="table-responsive">
	<table class="table table-bordered table-striped  table-sm"  width="100%" cellspacing="0"  id="iddatatable">
		<thead  style="color:#333 white; font-weight: bold;">
			<tr >
				<td align="center">Nº</td>
				<td align="center">Foto</td>
				<td align="center">Matricula</td>
				<td align="center">Nombre</td>
				<td align="center">Fecha Nac.</td>
				<td align="center">Dirección</td>
				<td align="center">Teléfono</td>
				<td align="center">Emergencia</td>
				<td align="center">Teléfono</td>
				<td align="center">Sexo</td>
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
					<td align="center"><?php echo $i ?></td>
					<td align="center">
					<?php 
				$imgVer=explode("/", $mostrar[0]) ; 
				$imgruta=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3]."/".$imgVer[4];
			?>
			<img width="50" height="50" src="<?php echo $imgruta ?>">
			</td>
					<td align="center"><?php echo $mostrar[1] ?></td>
					<td align="center"><?php echo $mostrar[2].' '.$mostrar[3] ?></td>
					<td align="center"><?php echo $mostrar[4] ?></td>
					<td align="center"><?php echo $mostrar[5] ?></td>
					<td align="center"><?php echo $mostrar[6] ?></td>	
					<?php if($mostrar[7]==1){
						echo '<td align="center">Padre</td>';
					} else {
						if($mostrar[7]==2){
						echo '<td align="center">Madre</td>';
					}
					else {
						if($mostrar[7]==3){
						echo '<td align="center">Representante</td>';
					}
					}

					}
					?>
					
					<td align="center"><?php echo $mostrar[8] ?></td>
					<?php switch ($mostrar[9]) {
						case 'M':
							$genero="Masculino";
							break;
						case 'F':
							$genero="Femenino";
							break;
						
						default:
							# code...
							break;
					}
					?>
					<td align="center"><?php echo $genero ?></td>
					<?php switch ($mostrar[10]) {
						case '1':
							$estado="Matriculado";
							break;
						case '2':
							$estado="Aprobado";
							break;
						case '3':
							$estado="Reprobado";
							break;
						case '4':
							$estado="Supletorio";
							break;
							
						
						default:
							# code...
							break;
					}
					?>
					<td align="center"><?php echo $estado ?></td>
					
					
					
					
					
					<td style="text-align: center;""><a href="../vistas/Editar_FichaMatricula.php?cedula=<?php echo  $mostrar[1] ;?>">
						<span class="fa fa-pencil" aria-hidden="true"></span></a></td>
					<td style="text-align: center;">
						<span  onclick="eliminarDatos('<?php echo $mostrar[1]?>')">
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
