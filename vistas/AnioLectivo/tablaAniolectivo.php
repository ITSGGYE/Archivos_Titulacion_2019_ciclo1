<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();




$sql="SELECT 
			id_aniolectivo,	
			anio_lectivo,				
			estado_aniolectivo	
 from  aniolectivo  ";
$result=mysqli_query($conexion,$sql);
?>



<div class="table-responsive">
	<table class="table table-bordered table-striped table-sm "  width="100%" cellspacing="0"  id="iddatatable" style="text-align: center;">
		<thead  align="center" style="color:#333 white; font-weight: bold;">
			<tr >
				<td>Codigo</td>	
				<td>Año Lectivo</td>
				
				<td>Estado</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
				
					<td><?php echo $mostrar[0] ?></td>
					<td><?php echo $mostrar[1] ?></td>
					<?php 
					if($mostrar[2]==1){
						$estado='Habilitado';
					} else{
						if($mostrar[2]==0) {
							$estado='Deshabilitado';
						}
					else {
						if($mostrar[2]==2) {
							$estado='En Espera';
						}
					}
				}
						?>
						<td><?php echo $estado ?></td>
					
					
					
								
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
