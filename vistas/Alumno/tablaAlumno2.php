<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$i=0;
$imgVer="";
$sql="SELECT img.ruta,			
			 a.id_alumno,	
			 a.nombre_alumno,				
			 a.cedula_alumno,			
			 a.nrepresentante_alumno,				
			 a.trepresentante_alumno,				
			 a.rfamiliar_alumno			
			 FROM alumno a inner join img_alumno img on a.imagen_alumno=img.id_imagen ";
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
				<td align="center">Cedula</td>
				<td align="center">Representante</td>
				<td align="center">Teléfono</td>
				<td align="center">Relación Familiar</td>
				
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
					<td>
					<?php 
				$imgVer=explode("/", $mostrar[0]) ; 
				$imgruta=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3]."/".$imgVer[4];
			?>
			<img width="50" height="50" src="<?php echo $imgruta ?>">
			</td>
					<td><?php echo $mostrar[1] ?></td>
					<td><?php echo $mostrar[2] ?></td>
					<td><?php echo $mostrar[3] ?></td>
					<td><?php echo $mostrar[4] ?></td>
					<td><?php echo $mostrar[5] ?></td>
					<td><?php echo $mostrar[6] ?></td>
					
					
					<td style="text-align: center;">
						<span  data-toggle="modal" data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[1] ?>')">
							<span class="fa fa-pencil" aria-hidden="true"></span>
						</span>
					</td>
					<td style="text-align: center;">
						<span  onclick="eliminarDatos('<?php echo $mostrar[1] ?>')">
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

