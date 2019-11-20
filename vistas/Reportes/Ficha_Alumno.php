<style type="text/css">
	p{
		font-size: 12px;
		line-height: 2px;
	}
	table{
		margin: 0px;
	}
	td{
		line-height: 2px;
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
						<h4 style="color: red; margin-bottom: 2px; padding: 2px;">REPORTE DE ALUMNOS MATRICULADOS  </h4>
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
								?>
								<h4> Periodo Lectivo: <?php echo $mostrar[0];?> </h4>
								<h4> Curso: <?php echo $ncurso.' '.$paralelo;?> </h4>
							<?php
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
										observa_alumno			
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


					}
			$sql="SELECT 		nombre_padre,
										cedula_padre,
										nivel_padre,
										estado_padre,
										ocupacion_padre,
										empresa_padre,
										nombre_madre,
										cedula_madre,
										nivel_madre,
										estado_madre,
										ocupacion_madre,
										empresa_madre,
										email,
										separados,
										nombre_conyugue,
										nombre_representante,
										cedula_representante,
										relacionf,
										autorizo,
										id_datosrepre	
			 							FROM datos_representante  where fk_cedulaalumno='$alumno'   ";
					$result=mysqli_query($conexion,$sql);
					while ($mostrar=mysqli_fetch_row($result)) {
						$nombre_padre=$mostrar[0];
						$cedula_padre=$mostrar[1];
						$nivel_padre=$mostrar[2];
						$estado_padre=$mostrar[3];
						$ocupacion_padre=$mostrar[4];
						$empresa_padre=$mostrar[5];
						$nombre_madre=$mostrar[6];
						$cedula_madre=$mostrar[7];
						$nivel_madre=$mostrar[8];
						$estado_madre=$mostrar[9];
						$ocupacion_madre=$mostrar[10];
						$empresa_madre=$mostrar[11];
						$email=$mostrar[12];
						$separados=$mostrar[13];
						$nombre_conyugue=$mostrar[14];
						$nombre_representante=$mostrar[15];
						$cedula_representante=$mostrar[16];
						$relacionf=$mostrar[17];
						$autorizo=$mostrar[18];
						$idrepre=$mostrar[19];
					}

			$sql="SELECT  		id_documento,
							fk_alumno,
								promocion1,
								promocion2,
								promocion3,
								planilla,
								informe1,
								informe2,
								partida,
								fotos,
								carnet,
								croquis,
								cedula1,
								cedula2,
								cedula3,
								certificado1,
								certificado2,
								documentos
										
							FROM documentos_alumno where  fk_alumno='$alumno'";
							$result=mysqli_query($conexion,$sql);
					while ($mostrar=mysqli_fetch_row($result)) {
						$id_documento=$mostrar[0];
						$fk_alumno=$mostrar[1];
						$promocion=$mostrar[2];
						$promocion2=$mostrar[3];
						$promocion3=$mostrar[4];
						$planilla=$mostrar[5];
						$notas=$mostrar[6];
						$informe2=$mostrar[7];
						$partida=$mostrar[8];
						$fotos=$mostrar[9];
						$carnet=$mostrar[10];
						$croquis=$mostrar[11];
						$cedula1=$mostrar[12];
						$cedula2=$mostrar[13];
						$cedula3=$mostrar[14];
						$certificado1=$mostrar[15];
						$certificado2=$mostrar[16];
						$documentos=$mostrar[17];

					}
					$sql="SELECT 		nombre_plantel,
										tipo_plantel,
										comportamiento,
										promedio,
										examen,
										escala,
										id_otrosdatos
			 							FROM otros_datos  where fk_cedulaalumno='$alumno'   ";
					$result=mysqli_query($conexion,$sql);
					while ($mostrar=mysqli_fetch_row($result)) {
						$nombre_plantel=$mostrar[0];
						$tipo_plantel=$mostrar[1];
						$comportamiento=$mostrar[2];
						$promedio=$mostrar[3];
						$examen=$mostrar[4];
						$escala=$mostrar[5];
						
						
					}

				

?>
<div class="table-responsive">

<h5> DATOS DEL ALUMNO </h5>
<table>
	<tr>
		<td> <p><b> Apellidos: </b> <?php echo $apellido_alumno; ?></p> </td>
		<td> <p><b> C.I: </b> <?php echo $cedula_alumno; ?></p> </td>
	</tr>
	<tr>
		<td> <p><b> Nombres: </b> <?php echo $nombre_alumno; ?></p> </td>
		<td> <p><b> Sexo: </b> <?php echo $sexo_alumno; ?></p> </td>
		<?php
		
		switch ($etnia_alumno) {
			case '1':
				$etnia="Indigena";
				break;
			case '2':
				$etnia="Mestiza";
				break;
			case '3':
				$etnia="Negra";
				break;
			case '4':
				$etnia="Blanca";
				break;
						default:
				# code...
				break;
		}
		?>
		<td> <p><b> Etnia: </b> <?php echo $etnia; ?></p> </td>
	</tr>
	<tr>
		<td> <p><b> Fecha de nacimiento: </b> <?php echo $fechanac_alumno; ?></p> </td>
		<td> <p><b> Lugar de nacimiento: </b> <?php echo $lugarnac_alumno; ?></p> </td>
		<td> <p><b> Nacionalidad: </b> <?php echo $nacionalidad_alumno; ?></p> </td>
	</tr>
	<tr>
		<td> <p><b> Dirección: </b> <?php echo $direccion_alumno; ?></p> </td>
		<td> <p><b> Parroquia: </b> <?php echo $parroquia_alumno; ?></p> </td>
		
	</tr>
	<tr>
		<?php
		
		switch ($tipo_alumno) {
		 	case '1':
		 		$tipo="Nuevo";
		 		break;
		 	case '2':
		 		$tipo="Antiguo";
		 		break;
		 	default:
		 		# code...
		 		break;
		 } 
		?>
		<td> <p><b> Tipo de Alumno: </b> <?php echo $tipo; ?></p> </td>
		<?php
		
		switch ($expreso_alumno) {
		 	case '1':
		 		$expreso="Si";
		 		break;
		 	case '2':
		 		$expreso="No";
		 		break;
		 	default:
		 		# code...
		 		break;
		 } 
		 ?>
		<td> <p><b> Usa Expreso: </b> <?php echo $expreso; ?></p> </td>
	</tr>
	<tr>
		<?php 

		switch ($emerg_alumno) {
			case '1':
				$emergencia="Padre";
				break;
			case '2':
				$emergencia="Madre";
				break;
			case '3':
				$emergencia="Representante";
				break;
			
			default:
				# code...
				break;
		}

		?>
		<td> <p><b> Llamar en caso de emergencia: </b> <?php echo $emergencia; ?></p> </td>
		<td> <p><b> Celular: </b> <?php echo $telefono_alumno; ?></p> </td>
		<td> <p><b> Teléfono Convecional: </b> <?php echo $telefono2_alumno; ?></p> </td>
	</tr>

</table>

<h5> DATOS DEL PADRE Y LA MADRE </h5>
<table>
	<tr>
		<td> <p><b> Nombre del padre: </b> <?php echo $nombre_padre; ?></p> </td>
		<td> <p><b> C.I: </b> <?php echo $cedula_padre; ?></p> </td>
	</tr>
	<tr>
		<?php
		switch ($nivel_padre) {
			
		 	case '1':
		 		$nivelp="Primaria";
		 		break;
		 	case '2':
		 		$nivelp="Secundaria";
		 		break;
		 	case '3':
		 		$nivelp="Bachillerato";
		 		break;
		 	case '4':
		 		$nivelp="Tecnológico";
		 		break;
		 	case '5':
		 		$nivelp="Tercer Nivel";
		 		break;
		 	case '6':
		 		$nivelp="Otro";
		 		break;
		 	
		 	default:
		 		# code...
		 		break;
		 }
		 
		switch ($estado_padre) {
		 	case '1':
		 		$estadop="Casado";
		 		break;
		 	case '2':
		 		$estadop="Divorciado";
		 		break;
		 	case '3':
		 		$estadop="Soltero";
		 		break;
		 	case '4':
		 		$estadop="Unión libre";
		 		break;
			case '5':
		 		$estadop="Unión de hecho";
		 		break;
		 	
		 	default:
		 		# code...
		 		break;
		 } 
		
		switch ($ocupacion_padre) {
			case '1':
				$ocupacionp="Laboral con relación de dependencia";
				break;
			case '2':
				$ocupacionp="Negocio Propio";
				break;
			case '3':
				$ocupacionp="Estudiante";
				break;
			case '4':
				$ocupacionp="No se especifica";
				break;
			
			default:
				# code...
				break;
		}
		switch ($nivel_madre) {
			
		 	case '1':
		 		$nivelm="Primaria";
		 		break;
		 	case '2':
		 		$nivelm="Secundaria";
		 		break;
		 	case '3':
		 		$nivelm="Bachillerato";
		 		break;
		 	case '4':
		 		$nivelm="Tecnológico";
		 		break;
		 	case '5':
		 		$nivelp="Tercer Nivel";
		 		break;
		 	case '6':
		 		$nivelp="Otro";
		 		break;
		 	
		 	default:
		 		# code...
		 		break;
		 }
		 
		switch ($estado_madre) {
		 	case '1':
		 		$estadom="Casado";
		 		break;
		 	case '2':
		 		$estadom="Divorciado";
		 		break;
		 	case '3':
		 		$estadom="Soltero";
		 		break;
		 	case '4':
		 		$estadom="Unión libre";
		 		break;
			case '5':
		 		$estadom="Unión de hecho";
		 		break;
		 	
		 	default:
		 		# code...
		 		break;
		 } 
		
		switch ($ocupacion_madre) {
			case '1':
				$ocupacionm="Laboral con relación de dependencia";
				break;
			case '2':
				$ocupacionm="Negocio Propio";
				break;
			case '3':
				$ocupacionm="Estudiante";
				break;
			case '4':
				$ocupacionm="No se especifica";
				break;
			
			default:
				# code...
				break;
		}
		?>
		<td> <p><b>Nivel de Instrucción: </b> <?php echo $nivelp; ?></p> </td>
		<td> <p><b> Estado Civil: </b> <?php echo $estadop; ?></p> </td>
	</tr>
	<tr>
		<td> <p><b> Ocupación : </b> <?php echo $ocupacionp; ?></p> </td>
		<td> <p><b> Empresa: </b> <?php echo $empresa_padre; ?></p> </td>
		
	</tr>

	<tr>
		<td> <p><b> Nombre de la madre: </b> <?php echo $nombre_madre; ?></p> </td>
		<td> <p><b> C.I: </b> <?php echo $cedula_madre; ?></p> </td>
	</tr>
	<tr>
		<td> <p><b>Nivel de Instrucción: </b> <?php echo $nivelm; ?></p> </td>
		<td> <p><b> Estado Civil: </b> <?php echo $estadom; ?></p> </td>
	</tr>
	<tr>
		<td> <p><b> Ocupación : </b> <?php echo $ocupacionm; ?></p> </td>
		<td> <p><b> Empresa: </b> <?php echo $empresa_madre; ?></p> </td>
		
	</tr>

	<tr>
		<td> <p><b> Email: </b> <?php echo $email; ?></p> </td>		
	</tr>
	<tr>
		<?php
		
		switch ($separados) {
		 	case '1':
		 		$separados2="Si";
		 		break;
		 	case '2':
		 		$separados2="No";
		 		break;
		 	default:
		 		# code...
		 		break;
		 } 
		 ?>
		<td> <p><b> Padres Separados: </b> <?php echo $separados2; ?></p> </td>
		<td> <p><b> Nombre de cónyugue actual: </b> <?php echo $nombre_conyugue; ?></p> </td>
	</tr>
	<tr>
		<td> <p><b> Representante: </b> <?php echo $nombre_representante; ?></p> </td>
		<td> <p><b> C.I: </b> <?php echo $cedula_representante; ?></p> </td>
		
		<?php
		switch ($relacionf) {
			case '1':
				$relacion="Padre";
				break;
			case '2':
				$relacion="Madre";
				break;
			case '3':
				$relacion="Tios";
				break;
			case '4':
				$relacion="Abuelos";
				break;
			case '5':
				$relacion="Otros";
				break;
			
			default:
				# code...
				break;
		}
		?>
		<td> <p><b> Parentesco: </b> <?php echo $relacion; ?></p> </td>
	</tr>
	<tr>
		<td> <p><b> Autorizados para retirar al estudiante: </b> <?php echo $autorizo; ?></p> </td>		
	</tr>

</table>

<!--<h5> DOCUMENTOS </h5>
<table>
	<tr>
		<td width="150px"> <p><b> Promoción: </b> <?php echo $promocion; ?></p> </td>
		<td width="150px"> <p><b> Informe de notas: </b> <?php echo $notas; ?></p> </td>
		<td width="150px"> <p><b> C.I Padre: </b> <?php echo $cedula1; ?></p> </td>
	</tr>
	<tr>
		<td width="150px"> <p><b> Promocion: </b> <?php echo $promocion2; ?></p> </td>
		<td width="150px"> <p><b> Partida de nacimiento: </b> <?php echo $partida; ?></p> </td>
		<td width="150px"> <p><b> C.I. Madre: </b> <?php echo $cedula2; ?></p> </td>
	</tr>
	<tr>
		<td width="150px"> <p><b> Promocion: </b> <?php echo $promocion3; ?></p> </td>
		<td width="150px"> <p><b> Fotos: </b> <?php echo $fotos; ?></p> </td>
		<td width="150px"> <p><b> C.I Estudiante: </b> <?php echo $cedula3; ?></p> </td>
	</tr>
	<tr>
		<td width="150px"> <p><b> Planilla de Luz: </b> <?php echo $direccion_alumno; ?></p> </td>
		<td width="150px"> <p><b> Carnet de vacunas: </b> <?php echo $parroquia_alumno; ?></p> </td>
		<td width="150px"> <p><b> C. no deuda: </b> <?php echo $certificado1; ?></p> </td>
	</tr>
	<tr>
		<td width="150px"> <p><b> Informe económico: </b> <?php echo $informe2; ?></p> </td>
		<td width="150px"> <p><b> Croquis: </b> <?php echo $croquis; ?></p> </td>
		<td width="150px"> <p><b> C. Matrícula: </b> <?php echo $certificado2; ?></p> </td>
		
	</tr>
	

</table>-->

<h5> PROCEDENCIA </h5>
<table>
	<tr>
		<td width="150px"> <p><b> Nombre del plantel: </b> <?php echo $nombre_plantel; ?></p> </td>
		<?php switch ($tipo_plantel) {
			case '1':
				$plantel='Particular';
				break;
			case '2':
				$plantel='Fiscal';
				break;
			case '3':
				$plantel='Otro';
				break;
			
			default:
				# code...
				break;
		}

		switch ($escala) {
			case '1':
				$nescala='D.A.R';
				break;
			case '2':
				$nescala='A.A.R';
				break;
			case '3':
				$nescala='E.P.A.A.R';
				break;
			
			default:
				# code...
				break;
		}

		switch ($examen) {
			case '1':
				$nexamen="Si";
				break;
			case '2':
				$nexamen="No";
				break;
			
			default:
				# code...
				break;
		}
?>

		<td width="150px"> <p><b> Plantel: </b> <?php echo $plantel; ?></p> </td>
		
	</tr>
	<tr>
		<td width="150px"> <p><b> Comporramiento: </b> <?php echo $comportamiento; ?></p> </td>
		<td width="150px"> <p><b> Promedio: </b> <?php echo $promedio; ?></p> </td>
		<td width="150px"> <p><b> Escala Cualitativa: </b> <?php echo $nescala; ?></p> </td>
		<td width="150px"> <p><b> Examen de admisión: </b> <?php echo $nexamen; ?></p> </td>
	</tr>
	
	

</table>

	
</div>
