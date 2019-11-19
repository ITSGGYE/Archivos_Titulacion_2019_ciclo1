<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT 	u.id_usuario, img.ruta, p.nombre_profesor,  u.usuario,  u.privilegio from usuarios u, profesor p, img_profesor img where u.fk_profesor=p.id_profesor and p.imagen_profesor=img.id_imagen  ";
$result=mysqli_query($conexion,$sql);
?>

<div class="table-responsive">
	<table class="table table-bordered table-striped table-sm "  width="100%" cellspacing="0"  id="iddatatable">
		<thead  style="color:#333 white; font-weight: bold;">
			<tr class="letras">
				<td align="center">Código</td>
				<td align="center">Foto</td>
				<td align="center">Profesor</td>
				<td align="center">Usuario</td>
				
				<td align="center">Privilegio</td>
				<td align="center">Editar</td>
				<td align="center">Eliminar</td>
			</tr>
		</thead>
		
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
				
					<td align="center"><?php echo $mostrar[0] ?></td>
					<?php 
			$imgVer=explode("/", $mostrar[1]) ; 
			$imgruta=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3]."/".$imgVer[4];
			?>
					<td align="center"><img width="50" height="50" src="<?php echo $imgruta?>"></td>
					<td align="center"><?php echo $mostrar[2] ?></td>
					
					<td align="center"><?php echo $mostrar[3] ?></td>
					<?php if($mostrar[4]==1){
						$privilegio='Secretaria';
					}
					?>
					
					<td style="text-align: center;"><?php echo $privilegio ?></td>
					
					
								
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
    $('#iddatatable').DataTable( {
        "scrollX": true
    } );
} );
</script>