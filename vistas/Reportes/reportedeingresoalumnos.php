<?php 
require_once "../../clases/conexion.php";
require_once "../dependencias.php";
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
							$sql="SELECT anio_lectivo from aniolectivo  where estado_aniolectivo=1";
							$result=mysqli_query($conexion,$sql);
							while($mostrar=mysqli_fetch_row($result)){
								?>
								<h4> Periodo Lectivo <?php echo $mostrar[0];?> </h4>
							<?php
							}
							?>
					</div>
				</div>
			</div>
			<?php 

$i=0;
$imgVer="";
$sql="SELECT id_alumno,	
			 nombre_alumno,				
			 cedula_alumno,	
			 fechanac_alumno, 
			 npadre_alumno,
			 nmadre_alumno,		
			 nrepresentante_alumno,				
			 trepresentante_alumno,				
			 rfamiliar_alumno			
			 FROM alumno  ";
$result=mysqli_query($conexion,$sql);
?>


<div class="table-responsive">
	<table class="table table-bordered table-striped  table-sm"  width="100%" cellspacing="0" border="1" >
		<thead  style="color:#333 white; font-weight: bold;">
			<tr >
				<td align="center">Nº</td>
				<td align="center">Matricula</td>
				<td align="center">Nombre</td>
				<td align="center">Cédula</td>
				<td align="center">F. Nacimiento</td>
				<td align="center">N. Padre</td>
				<td align="center">N. Madre</td>
				<td align="center">Representante</td>
				<td align="center">Teléfono</td>
				<td align="center">Relación Familiar</td>
				</tr>
		</thead>
		
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				$i++;
				?>
				<tr >
					<td align="center"><?php echo $i ?></td>
					<td align="center"><?php echo $mostrar[0] ?></td>
					<td align="center"><?php echo $mostrar[1] ?></td>
					<td align="center"><?php echo $mostrar[2] ?></td>
					<td align="center"><?php echo $mostrar[3] ?></td>
					<td align="center"><?php echo $mostrar[4] ?></td>
					<td align="center"><?php echo $mostrar[5] ?></td>
					<td align="center"><?php echo $mostrar[6] ?></td>
					<td align="center"><?php echo $mostrar[7] ?></td>
					<td align="center"><?php echo $mostrar[8] ?></td>
					
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
</div>


