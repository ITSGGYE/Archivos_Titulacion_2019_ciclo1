<style type="text/css">
	p{
		font-size: 14px;
	}
	table{
		margin: 0px;
	}
	h5{
	color: black; margin-top:1px; margin-bottom: 2px; padding: 1px;
	}
</style>
<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();



?>

<div class="row">
	<div class="col-lg-4">
		<center>
			<img width="100" height="100" src="../../Imagenes/logo/logo.png">
		</center>
	</div>
 <div class="col-lg-8">
				<div class="card ">
					<div  style="text-align: center; padding: 3px;">
						<h3 style="color: green; margin-bottom: 2px; padding: 2px;">ESCUELA DE EDUCACION BASICA "JULIO PEÑA BERMEO" </h3>
						<h4 style="color: red; margin-bottom: 2px; padding: 2px;">REPORTE DE ALUMNOS MATRICULADOS  </h4>
						<?php 
						
							
											$sql="SELECT id_aniolectivo, anio_lectivo from aniolectivo  where estado_aniolectivo=1";
							$result=mysqli_query($conexion,$sql);
							while($mostrar=mysqli_fetch_row($result)){
								$idanio=$mostrar[0];
								$anio=$mostrar[1];
								?>
								<h4> Periodo Lectivo: <?php echo $mostrar[1];?> </h4>
								
							<?php
							}
							?>
					</div>
				</div>
			</div>
			<table  boder=1 class="table   table-stripe table-sm table-bordered table-hover"  style="text-align: center; width: 100%; ">
						<tr>
				<td align="center"> Nº </td>
				<td align="center">Matrícula</td>
				<td align="center" width="200px" >Estudiante</td>
				
				<td align="center">Curso</td>
				
				<td align="center">Estado</td>
							
							
							
						</tr>
							
			<?php 

$i=0;
						$sql="SELECT cr.id_curso_alumno, a.cedula_alumno, a.apellido_alumno,a.nombre_alumno, 
 (Select c.nombre_curso from curso c ,curso_paralelo cp where  cp.id_cursoparalelo=cr.fk_cursoparalelo and cp.fk_curso=c.id_curso) as curso , (Select pa.nombre_paralelo from paralelo pa ,curso_paralelo cp where  cp.id_cursoparalelo=cr.fk_cursoparalelo and cp.fk_paralelo=pa.id_paralelo) as paralelo, anio.anio_lectivo, cr.estado from 
 datos_alumno a ,  aniolectivo anio, curso_alumno cr where cr.fk_alumno=a.cedula_alumno  and  cr.fk_anio=anio.id_aniolectivo order by cr.fk_cursoparalelo";

						$result=mysqli_query($conexion,$sql);
						while($mostrar=mysqli_fetch_row($result)){
							$i++;
							
							
	?>
					<tr >

					<td><?php echo $i ?></td>
					<td align="center"><?php echo $mostrar[1] ?></td>
					<td align="center"><?php echo $mostrar[2].' '.$mostrar[3] ?></td>
				

					
					<td align="center"><?php echo $mostrar[4].' '.$mostrar[5] ?></td>
					
					<?php if ($mostrar[7]==1){
						$estado="Habilitado"; 
					} else {
						if($mostrar[7]==2){
							$estado="Desabilitado";
						}
					else{
						if($mostrar[7]==3){
						$estado="Retirado";
	
						}
											}
					}
					?>
					<td align="center"><?php echo $estado ?></td>
						

</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
</div>






