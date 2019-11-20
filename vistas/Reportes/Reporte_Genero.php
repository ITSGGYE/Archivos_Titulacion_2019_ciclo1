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
$curso=$_GET["curso"];


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
						
							$sql="SELECT c.nombre_curso, p.nombre_paralelo  FROM curso c , paralelo p, curso_paralelo cp where  cp.fk_curso=c.id_curso and cp.fk_paralelo=p.id_paralelo and cp.id_cursoparalelo='$curso'";							
					$result=mysqli_query($conexion,$sql);
					while ($mostrar=mysqli_fetch_row($result)) {
						$ncurso=$mostrar[0];
						$paralelo=$mostrar[1];
					}
											$sql="SELECT id_aniolectivo, anio_lectivo from aniolectivo  where estado_aniolectivo=1";
							$result=mysqli_query($conexion,$sql);
							while($mostrar=mysqli_fetch_row($result)){
								$idanio=$mostrar[0];
								$anio=$mostrar[1];
								?>
								<h4> Periodo Lectivo: <?php echo $mostrar[1];?> </h4>
								<h4> Curso: <?php echo $ncurso.' '.$paralelo;?> </h4>
							<?php
							}
							?>
					</div>
				</div>
			</div>
			<table  boder=1 class="table   table-stripe table-sm table-bordered table-hover"  style="text-align: center; width: 90%; margin-left: 5%;">
						<tr>
							<th> <p> Nº </p> </th>
							
							<th> <p>  Matrícula </p> </th>
							<th width=300> <p> Estudiantes </p></th>
							<th > Género  </td>
							
						</tr>
							
			<?php 

$i=0;
$imgVer="";


						$sql="SELECT a.cedula_alumno, a.nombre_alumno, a.apellido_alumno, a.sexo_alumno, img.nombre  from datos_alumno a , curso_alumno ca, img_datosalumno img where
						    ca.fk_cursoparalelo='$curso' and ca.fk_alumno=a.cedula_alumno and ca.fk_anio='$idanio' and img.id_imagen=a.imagen_alumno order by a.apellido_alumno and a.sexo_alumno";
						$result=mysqli_query($conexion,$sql);
						while($mostrar=mysqli_fetch_row($result)){
							$i++;
							
							
	?>
				<tr>
				<td> <p><?php echo $i;?></p> </td>
				<td> <p><?php echo $mostrar[0];?></p> </td>
 				<td> <p><?php echo $mostrar[2].' '.$mostrar[1];?></p> </td>
  				<td> <p><?php echo $mostrar[3];?></p> </td>
				
				
				</tr>

<?php
}
?>

</table>

</div>






