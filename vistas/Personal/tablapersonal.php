<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$imgVer="";
$sql="SELECT 
			 p.nombre_profesor,				
			 p.direccion_profesor,			
			 p.telefono_profesor,				
			 p.celular_profesor,				
			 p.cedula_profesor,			
			 p.email_profesor,					
			 p.titulo_profesor,
			 img.ruta,			
			 p.id_profesor				
			 FROM profesor p inner join img_profesor img on p.imagen_profesor=img.id_imagen ";
$result=mysqli_query($conexion,$sql);
?>


<div class="table-responsive">
	<table class="table table-bordered table-striped table-sm "  width="100%" cellspacing="0"  id="iddatatable" style="font-size: 14px;">
		<thead  style="color:#333 white; font-weight: bold;">
			<tr>
				<td>Foto</td>	
				<td>Nombre</td>
				<td align="center">Dirección</td>
				<td align="center">Teléfono</td>
				<td align="center">Movil</td>
				<td align="center">Cargo</td>	
			
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
				<tr >
				<td>
			<?php 
			$imgVer=explode("/", $mostrar[7]) ; 
			$imgruta=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3]."/".$imgVer[4];
			?>
			<img width="50" height="50" src="<?php echo $imgruta ?>">
		</td>
					<td><?php echo $mostrar[0] ?></td>
					<td><?php echo $mostrar[1] ?></td>
					<td align="center"><?php echo $mostrar[2] ?></td>
					<td align="center"><?php echo $mostrar[3] ?></td>
					
					<?php switch ($mostrar[6]) {
						case '1':
							$titulo="Rector/a";
							break;
						case '2':
							$titulo="Docente";
							break;
						case '3':
							$titulo="Auxiliar";
							break;
						
						default:
							# code...
							break;
					}
				?>
					<td align="center"><?php echo $titulo ?></td>
					
					
				
								
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
  $('#iddatatable').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});
</script>
