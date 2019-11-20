<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$i=0;
$imgVer="";
$sql="SELECT img.ruta,	
			 img2.ruta,
			 img3.ruta,
			 img4.ruta,
    		 img5.ruta,	
   			 a.cedula_alumno,
			 a.nombre_alumno,
			 a.apellido_alumno,
			 d.id_documento	
			 FROM documentos_alumno2 d , sub_documentos img, sub_documentos2 img2, sub_documentos3 img3, 
			 sub_documentos4 img4, sub_documentos5 img5, datos_alumno a where d.documentos=img.id_imagen and
			 d.documentos2=img2.id_imagen and d.documentos3=img3.id_imagen and  d.documentos4=img4.id_imagen and
			 d.documentos5=img5.id_imagen
			 and d.fk_alumno=a.cedula_alumno";
$result=mysqli_query($conexion,$sql);
?>


<div class="table-responsive">
	<table class="table table-bordered table-striped  table-sm"  width="100%" cellspacing="0"  id="iddatatable">
		<thead  style="color:#333 white; font-weight: bold;">
			<tr >
				<td align="center">Nº</td>
				<td align="center">PDF Cédula</td>
				<td align="center">PDF Votación</td>
				<td align="center">PDF Promociones</td>
				<td align="center">PDF Partida de Nac.</td>
				<td align="center">PDF Servico Básico</td>
				
				<td align="center">Matrícula</td>
				<td align="center">Estudiante</td>
				
				
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

			<td align="center">
					<?php 
				$imgVer=explode("/", $mostrar[1]) ; 
				$imgruta=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3]."/".$imgVer[4];
			?>
			<a href="<?php echo $imgruta ?> " target="_blank"><span class="fa fa-file-pdf-o " style="color: red; font-size: 20px;"></span> </a>
			</td>
			<td align="center">
					<?php 
				$imgVer=explode("/", $mostrar[2]) ; 
				$imgruta=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3]."/".$imgVer[4];
			?>
			<a href="<?php echo $imgruta ?> " target="_blank"><span class="fa fa-file-pdf-o " style="color: red; font-size: 20px;"></span> </a>
			</td>
			<td align="center">
					<?php 
				$imgVer=explode("/", $mostrar[3]) ; 
				$imgruta=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3]."/".$imgVer[4];
			?>
			<a href="<?php echo $imgruta ?> " target="_blank"><span class="fa fa-file-pdf-o " style="color: red; font-size: 20px;"></span> </a>
			</td>
			<td align="center">
					<?php 
				$imgVer=explode("/", $mostrar[4]) ; 
				$imgruta=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3]."/".$imgVer[4];
			?>
			<a href="<?php echo $imgruta ?> " target="_blank"><span class="fa fa-file-pdf-o " style="color: red; font-size: 20px;"></span> </a>
			</td>
					<td><?php echo $mostrar[5]?></td>
					<td><?php echo $mostrar[7].' '.$mostrar[6] ?></td>
					
					<td style="text-align: center;""><a href="../vistas/Editar_Documento2.php?id=<?php echo $mostrar[5]?>">
						<span class="fa fa-pencil" aria-hidden="true"></span></a></td>
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

