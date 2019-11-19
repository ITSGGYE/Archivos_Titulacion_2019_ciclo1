
<style type="text/css">
	p{
		font-size: 12px;
		line-height: 3px;
	}
	td{
		line-height: 2px;
	}
	h5{
		line-height: 2px;
	}
	}
</style>

<?php 
require_once "../../clases/conexion.php";
require_once "../dependencias.php";
$obj= new conectar();
$conexion=$obj->conexion();
$alumno=$_GET["alumno"];


?>

<div class="row">
	<div class="col-lg-4">
		<center>
			<img width="80" height="80" src="../../Imagenes/logo/logo.png">
		</center>
	</div>
 <div class="col-lg-8">
				<div class="card ">
					<div  style="text-align: center; padding: 3px;">
						<h3 style="color: green; margin-bottom: 2px; padding: 2px;">Centro de Educación Inicial C.E.I "Mundo de Colores" </h3>
						<h4 style="color: red; margin-bottom: 2px; padding: 2px;">FICHA DE MATRICULA  </h4>
						<?php 
						$sql="SELECT c.nombre_Curso from 
 alumno a , curso c, aniolectivo anio, curso_alumno cr where
 cr.fk_alumno='$alumno' and cr.fk_curso=c.id_curso and 
 cr.fk_anio=1";

$result=mysqli_query($conexion,$sql);
while ($mostrar=mysqli_fetch_row($result)) {
	$curso=$mostrar[0];
}






							$sql="SELECT anio_lectivo from aniolectivo  where estado_aniolectivo=1";
							$result=mysqli_query($conexion,$sql);
							while($mostrar=mysqli_fetch_row($result)){
								$anio=$mostrar[0];
							}
							?>
							<p> <b> Periodo Lectivo </b> <?php echo $anio;?> <b> Curso: </b> <?php echo $curso;?>  </p>
							
					</div>
				</div>
			</div>
			<?php 

$i=0;
$imgVer="";
$sql="SELECT 				id_alumno,
										nombre_alumno,
										fechanac_alumno,
										nacionalidad_alumno,
										cedula_alumno,
										nescuela_alumno,
										imagen_alumno,
										emg_alumno,
										telf_alumno,
										direc_alumno,
										docum_alumno,
										cond_alumno,
										obser_alumno
							FROM alumno  where  id_alumno='$alumno' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);
			

			$datos=array(
				'idalumno' => $ver[0],
				'nombre' => $ver[1],
				'fecha' => $ver[2],
				'nacionalidad' => $ver[3],
				'cedula' => $ver[4],
				'nescuela' => $ver[5],
				'imagen'=>$ver[6],
				'emergencia' => $ver[7],
				'telefono' => $ver[8],
				'direccion' => $ver[9],
				'documento' => $ver[10],
				'condicion' => $ver[11],
				'observacion' => $ver[12]
				
				
				);
	$sql="SELECT 				id_datosfamiliares,
										fk_alumno,
										nombre_padre,
										cedula_padre,
										fecha_padre,
										nacionalidad_padre,
										estadocivil_padre,
										email_padre,
										niveleducacion_padre,
										ocupacion_padre,
										restudiante_padre,
										auto_padre,
										celular_padre,
										nombre_madre,
										cedula_madre,
										fecha_madre,
										nacionalidad_madre,
										estadocivil_madre,
										email_madre,
										niveleducacion_madre,
										ocupacion_madre,
										restudiante_madre,
										auto_madre,
										celular_madre
										FROM datos_familiares  where  fk_alumno='$alumno'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);
			

			$datos2=array(
				'id' => $ver[0],
				'alumno' => $ver[1],
				'npadre' => $ver[2],
				'cedulap' => $ver[3],
				'fechap' => $ver[4],
				'nacionalidadp' => $ver[5],
				
				'estadop'=>$ver[6],
				'emailp' => $ver[7],
				'nivelp' => $ver[8],
				'ocupacionp' => $ver[9],
				'vivep' => $ver[10],
				'autorizop' => $ver[11],
				'celularp' => $ver[12],
				'nmadre' => $ver[13],
				'cedulam' => $ver[14],
				'fecham' => $ver[15],
				'nacionalidadm' => $ver[16],
				'estadom'=>$ver[17],
				'emailm' => $ver[18],
				'nivelm' => $ver[19],
				'ocupacionm' => $ver[20],
				'vivem' => $ver[21],
				'autorizom' => $ver[22],
				'celularm' => $ver[23]
				
				
				);

			$sql="SELECT 				id_datosrepresentante,
										fk_alumno,
										nombre_repre,
										cedula_repre,
										fecha_repre,
										nacionalidad_repre,
										estadocivil_repre,
										email_repre,
										niveleducacion_repre,
										ocupacion_repre,
										restudiante_repre,
										auto_repre,
										celular_repre,
										relacionf_repre
										FROM datos_representante  where  fk_alumno='$alumno'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);
			

			$datos3=array(
				'id' => $ver[0],
				'alumno' => $ver[1],
				'nombrer' => $ver[2],
				'cedular' => $ver[3],
				'fechar' => $ver[4],
				'nacionalidadr' => $ver[5],
				'estador'=>$ver[6],
				'emailr' => $ver[7],
				'nivelr' => $ver[8],
				'ocupacionr' => $ver[9],
				'viver' => $ver[10],
				'autorizor' => $ver[11],
				'celularr' => $ver[12],
				'relacionr' => $ver[13]
				
				
				);


				switch ($datos['emergencia']) {
					case '1':
						$emergencia='Padre';
						break;
					case '2':
						$emergencia='Madre';
						break;
					case '3':
						$emergencia='Representante';
						break;
										
					}
				switch ($datos2['estadop']) {
					case '1':
						$estadocp='Casado';
						break;
					case '2':
						$estadocp='Soltero';
						break;
					case '3':
						$estadocp='Divorciado';
						break;
										
					}
				switch ($datos2['estadom']) {
					case '1':
						$estadocm='Casado';
						break;
					case '2':
						$estadocm='Soltero';
						break;
					case '3':
						$estadocm='Divorciado';
						break;
										
					}
				switch ($datos3['estador']) {
					case '1':
						$estadocr='Casado';
						break;
					case '2':
						$estadocr='Soltero';
						break;
					case '3':
						$estadocr='Divorciado';
						break;
										
					}
				switch ($datos2['nivelp']) {
					case '1':
						$nivelp='Primaria';
						break;
					case '2':
						$nivelp='Secundaria';
						break;
					case '3':
						$nivelp='Bachillerato';
						break;
					case '4':
						$nivelp='Tercer Nivel';
						break;
										
					}
				switch ($datos2['nivelm']) {
					case '1':
						$nivelm='Primaria';
						break;
					case '2':
						$nivelm='Secundaria';
						break;
					case '3':
						$nivelm='Bachillerato';
						break;
					case '4':
						$nivelm='Tercer Nivel';
						break;
										
					}
				switch ($datos3['nivelr']) {
					case '1':
						$nivelr='Primaria';
						break;
					case '2':
						$nivelr='Secundaria';
						break;
					case '3':
						$nivelr='Bachillerato';
						break;
					case '4':
						$nivelr='Tercer Nivel';
						break;
										
					}

					
					
			
		
	?>
	<p> <b> Estudiante </b> </p>
	<table>
		<tr>
			<td>
			<p><b>Nombres y apellidos completos: </b> <?php echo $datos['nombre'];?> </p> 
			</td>
		</tr>
		<tr>
			<td>
			<p><b>Cédula:</b>  <?php echo $datos['cedula'];?></p> 
			</td>
			<td>
			<p><b>Fecha de Nacimiento: </b> <?php echo $datos['fecha'];?> </p>
			</td>
		</tr>
		<tr>
			<td>
			<p><b>Nacionalidad:</b> <?php echo $datos['nacionalidad'];?>  </p>
			</td>
			<td>
			<p><b> En caso de emergencia llamar a:</b> <?php echo $emergencia;?>
				



				
			</td>
		</tr>
		<tr>
			<td>	
			<p><b>Télefono de casa: </b> <?php echo $datos['telefono'];?> </p> 
			</td>
			<td>
			<p><b>Dirección completa: </b> <?php echo $datos['direccion'];?></p>
			</td>
		</tr>

	</table>
	<p> <b> Padre </b> </p>
	<table>
		<tr>
			<td>
			<p><b>Nombres y apellidos completos: </b> <?php echo $datos2['npadre'];?> </p> 
			</td>
		</tr>
		<tr>
			<td>
			<p><b>Cédula:</b>  <?php echo $datos2['cedulap'];?></p> 
			</td>
			<td>
			<p><b>Fecha de Nacimiento: </b> <?php echo $datos2['fechap'];?> </p>
			</td>
		</tr>
		<tr>
			<td>
			<p><b>Nacionalidad:</b> <?php echo $datos2['nacionalidadp'];?>  </p>
			</td>
			<td>
			<p><b> Estado Civil:</b><?php echo $estadocp;?></p>
			</td>
		</tr>
		<tr>
			<td>	
			<p><b>Email: </b> <?php echo $datos2['emailp'];?> </p> 
			</td>
			<td>
			<p><b>Nivel de Educación: </b> <?php echo $nivelp;?></p>
			</td>
		</tr>
		<tr>
			<td>	
			<p><b>Ocupación: </b> <?php echo $datos2['ocupacionp'];?> </p> 
			</td>
			<td>
			<p><b>Vive con el estudiante: </b> <?php echo $datos2['vivep'];?></p>
			</td>
		</tr>
		<tr>
			<td>	
			<p><b>Autorizado para retiar al estudiante: </b> <?php echo $datos2['autorizop'];?> </p> 
			</td>
			<td>
			<p><b>Celular: </b> <?php echo $datos2['celularp'];?></p>
			</td>
		</tr>

	</table>

	<b><p> Madre </p> </p>
	<table>
		<tr>
			<td>
			<p><b>Nombres y apellidos completos: </b> <?php echo $datos2['nmadre'];?> </p> 
			</td>
		</tr>
		<tr>
			<td>
			<p><b>Cédula:</b>  <?php echo $datos2['cedulam'];?></p> 
			</td>
			<td>
			<p><b>Fecha de Nacimiento: </b> <?php echo $datos2['fecham'];?> </p>
			</td>
		</tr>
		<tr>
			<td>
			<p><b>Nacionalidad:</b> <?php echo $datos2['nacionalidadm'];?>  </p>
			</td>
			<td>
			<p><b> Estado Civil:</b><?php echo $estadocm;?></p>
			</td>
		</tr>
		<tr>
			<td>	
			<p><b>Email: </b> <?php echo $datos2['emailm'];?> </p> 
			</td>
			<td>
			<p><b>Nivel de Educación: </b> <?php echo $nivelm;?></p>
			</td>
		</tr>
		<tr>
			<td>	
			<p><b>Ocupación: </b> <?php echo $datos2['ocupacionm'];?> </p> 
			</td>
			<td>
			<p><b>Vive con el estudiante: </b> <?php echo $datos2['vivem'];?></p>
			</td>
		</tr>
		<tr>
			<td>	
			<p><b>Autorizado para retiar al estudiante: </b> <?php echo $datos2['autorizom'];?> </p> 
			</td>
			<td>
			<p><b>Celular: </b> <?php echo $datos2['celularm'];?></p>
			</td>
		</tr>

	</table>
	<b><p>Representante </b> </p>
	<table>
		<tr>
			<td>
			<p><b>Nombres y apellidos completos: </b> <?php echo $datos3['nombrer'];?> </p> 
			</td>
		</tr>
		<tr>
			<td>
			<p><b>Cédula:</b>  <?php echo $datos3['cedular'];?></p> 
			</td>
			<td>
			<p><b>Fecha de Nacimiento: </b> <?php echo $datos3['fechar'];?> </p>
			</td>
		</tr>
		<tr>
			<td>
			<p><b>Nacionalidad:</b> <?php echo $datos3['nacionalidadr'];?>  </p>
			</td>
			<td>
			<p><b> Estado Civil:</b><?php echo $estadocr;?></p>
			</td>
		</tr>
		<tr>
			<td>	
			<p><b>Email: </b> <?php echo $datos3['emailr'];?> </p> 
			</td>
			<td>
			<p><b>Nivel de Educación: </b> <?php echo $nivelr;?></p>
			</td>
		</tr>
		<tr>
			<td>	
			<p><b>Ocupación: </b> <?php echo $datos3['ocupacionr'];?> </p> 
			</td>
			<td>
			<p><b>Vive con el estudiante: </b> <?php echo $datos3['viver'];?></p>
			</td>
		</tr>
		<tr>
			<td>	
			<p><b>Autorizado para retiar al estudiante: </b> <?php echo $datos3['autorizor'];?> </p> 
			</td>
			<td>
			<p><b>Celular: </b> <?php echo $datos3['celularr'];?></p>
			</td>
		</tr>

	</table>




</div>
