<style type="text/css">
	p{
		font-size: 16px;
		
	}
	table{
		margin: 0px;
	}
	td{
		
	}
	h5{
	color: black; margin-top:1px; margin-bottom: 2px; padding: 1px;
	}
</style>
<?php 
require_once "../../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$alumno=$_GET["alumno"];
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
						
						<?php 
						
							$sql="SELECT c.nombre_curso, p.nombre_paralelo  FROM curso c , paralelo p, curso_paralelo cp where  cp.fk_curso=c.id_curso and cp.fk_paralelo=p.id_paralelo and cp.id_cursoparalelo='$curso'";							
					$result=mysqli_query($conexion,$sql);
					while ($mostrar=mysqli_fetch_row($result)) {
						$ncurso=$mostrar[0];
						$paralelo=$mostrar[1];
					}
											$sql="SELECT anio_lectivo from aniolectivo  where estado_aniolectivo=1";
							$result=mysqli_query($conexion,$sql);
							while($mostrar=mysqli_fetch_row($result)){
								$anio=$mostrar[0];
								
							}
							?>
					</div>
				</div>
			</div>
			<?php 

$i=0;
$imgVer="";




	
		$sql="SELECT 					apellido_alumno,
										cedula_alumno,
										nombre_alumno,
										sexo_alumno,
										etnia_alumno,
										lugarnac_alumno,
										fechanac_alumno,
										nacionalidad_alumno,
										direccion_alumno,
										expreso_alumno,
										emerg_alumno,
										telefono_alumno,
										parroquia_alumno,
										telefono2_alumno,
										tipo_alumno,
										imagen_alumno,
										observa_alumno,
										fechareg_alumno			
			 							FROM datos_alumno  where cedula_alumno='$alumno'   ";
					$result=mysqli_query($conexion,$sql);
					while ($mostrar=mysqli_fetch_row($result)) {
						$apellido_alumno=$mostrar[0];
						$cedula_alumno=$mostrar[1];
						$nombre_alumno=$mostrar[2];
						$sexo_alumno=$mostrar[3];
						$etnia_alumno=$mostrar[4];
						$lugarnac_alumno=$mostrar[5];
						$fechanac_alumno=$mostrar[6];
						$nacionalidad_alumno=$mostrar[7];
						$direccion_alumno=$mostrar[8];
						$expreso_alumno=$mostrar[9];
						$emerg_alumno=$mostrar[10];
						$telefono_alumno=$mostrar[11];
						$parroquia_alumno=$mostrar[12];
						$telefono2_alumno=$mostrar[13];
						$tipo_alumno=$mostrar[14];
						$imagen_alumno=$mostrar[15];
						$observa_alumno=$mostrar[16];
						$fecha=$mostrar[17];						


					}

					$sql="SELECT 	
										nombre_representante
										FROM datos_representante  where fk_cedulaalumno='$alumno'   ";
					$result=mysqli_query($conexion,$sql);
					while ($mostrar=mysqli_fetch_row($result)) {
						
						$nombre_representante=$mostrar[0];
						}

		

?>
<div class="table-responsive">
	<?php
	$dia=date("d");
	$mes=date("m");
	$anio=date("Y");
	$fechah = date("Y-m-d");
	?>
<h5>Guayaquil, <?php echo $dia.' de '.$mes.' del '.$anio;?> </h5>
<h4 style="text-align: center;"> CERTIFICADO DE MATRICULA </h4>
<h5> A QUIEN INTERESE: </h5>
<p style="margin-left: 20px;"> La Secretaría de la Escuela de educación Básica "Julio Peña Bermeo", certifica que: </p> <br>
<p style="margin-left: 100px"> <?php echo $apellido_alumno.' '.$nombre_alumno;?> </p> <br>
<p style="margin-left: 20px;"> Estudiante de este Plantel de <?php echo $ncurso;?> de educación general básica, paralelo "<?php echo $paralelo;?>", jornada matutina, año lectivo <?php echo $anio;?> previo al cumplimiento de los requisistos legales y reglamentarios, esta matriculado en esta Institución como consta los registros internos del plantel con fecha <?php echo $fecha;?>. Y asiste normalmente a clases.
</p>
<br>
<br>

<p style="margin-left: 20px;""> Es todo cuando puedo decir en honor a la verdad. El solicitante <?php echo $nombre_representante;?>, representante del estudiante, puede hacer uso de este certificado como estime conviviente. </p>

<p style="margin-left: 30px;""> De Usted. <br>  
	Atentamente </p>

<br>



<table>
	<tr>
		<td width="300px"> _____________________ <p> <b> Lcd. Julio Peña Escobar <br> DIRECTOR <br> Escuela de Educación Básica <br> "Julio Peña Bermeo" </b> <p>
		</td>
		<td width="300px"> _____________________ <p> <b> Adm. Susasa Peña Escobar <br> SECRETARIA  </b> </p>
		 <p style="color: white;">Hola</p><p style="color: white;">Hola</p>
		</td>
		

	</tr>
</table>




	
</div>
