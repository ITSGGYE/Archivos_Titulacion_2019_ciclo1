<?php 

	class Alumno{
		public function agregaImagenAlumno($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');

			$sql="INSERT into img_alumno (nombre,
										ruta,
										fechaSubida)
							values ('$datos[0]',
									'$datos[1]',
									'$fecha')";
									
			$result=mysqli_query($conexion,$sql);

			return mysqli_insert_id($conexion);
		}

		public function agregarDocumentoAlumno($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');

			$sql="INSERT into sub_documentos (nombre,
										ruta,
										fechaSubida)
							values ('$datos[0]',
									'$datos[1]',
									'$fecha')";
									
			$result=mysqli_query($conexion,$sql);

			return mysqli_insert_id($conexion);
		}


		public function agregaImagenDatosAlumno($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');

			$sql="INSERT into img_datosalumno (nombre,
										ruta,
										fechaSubida)
							values ('$datos[0]',
									'$datos[1]',
									'$fecha')";
									
			$result=mysqli_query($conexion,$sql);

			return mysqli_insert_id($conexion);
		}
		public function agregarAlumno($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$fecha=date('Y-m-d');
			$sql="INSERT into   alumno (nombre_alumno,
										lugnacimiento_alumno,
										fechanac_alumno,
										nacionalidad_alumno,
										repite_alumno,
										cedula_alumno,
										nescuela_alumno,
										lescuela_alumno,
										imagen_alumno,
										npadre_alumno,
										opadre_alumno,
										nmadre_alumno,
										omadre_alumno,
										nrepresentante_alumno,
										crepresentante_alumno,
										drepresentante_alumno,
										trepresentante_alumno,
										rfamiliar_alumno,
										fechareg_alumno)
					values (	'$datos[0]',
								'$datos[1]',
								'$datos[2]',
								'$datos[3]',
								'$datos[4]',
								'$datos[5]',
								'$datos[6]',
								'$datos[7]',
								'$datos[8]',
								'$datos[9]',
								'$datos[10]',
								'$datos[11]',
								'$datos[12]',
								'$datos[13]',
								'$datos[14]',
								'$datos[15]',
								'$datos[16]',
								'$datos[17]',
								'$fecha')";
		return mysqli_query($conexion,$sql);
		}

		public function agregarDocumentos($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$fecha=date('Y-m-d');
			$sql="INSERT into   documentos_alumno (
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
								documentos,
								fk_alumno)
					values (	'$datos[0]',
								'$datos[1]',
								'$datos[2]',
								'$datos[3]',
								'$datos[4]',
								'$datos[5]',
								'$datos[6]',
								'$datos[7]',
								'$datos[8]',
								'$datos[9]',
								'$datos[10]',
								'$datos[11]',
								'$datos[12]',
								'$datos[13]',
								'$datos[14]',
								'$datos[15]',
								'$datos[16]')";
		return mysqli_query($conexion,$sql);
		}

		public function obtenDatosDocumento($id_documento){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT  		id_documento
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
								documentos,
								fk_alumno
										
							FROM documentos_alumno where  id_documento='$id_documento' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);
			

			$datos=array(
				'id_documento' => $ver[0],
				'promocion' => $ver[1],
				'promocion2' => $ver[2],
				'promocion3' => $ver[3],
				'planilla' => $ver[4],
				'informe' => $ver[5],
				'informe2' => $ver[6],
				'partida' => $ver[7],
				'fotos' => $ver[8],
				'carnet' => $ver[9],
				'croquis' => $ver[10],
				'cedula1' => $ver[11],
				'cedula2' => $ver[12],
				'cedula3' => $ver[13],
				'certificado1' => $ver[14],
				'certificado2' => $ver[15],
				'imagen' => $ver[16],
				'alumno' => $ver[17]
				);
			return $datos;
		}


		public function agregarDatosAlumno($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$fecha=date('Y-m-d');
			$sql="INSERT into   datos_alumno (
										cedula_alumno,
										apellido_alumno,
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
										estado_alumno,
										observa_alumno,
										fechareg_alumno)
					values (	'$datos[0]',
								'$datos[1]',
								'$datos[2]',
								'$datos[3]',
								'$datos[4]',
								'$datos[5]',
								'$datos[6]',
								'$datos[7]',
								'$datos[8]',
								'$datos[9]',
								'$datos[10]',
								'$datos[11]',
								'$datos[12]',
								'$datos[13]',
								'$datos[14]',
								'$datos[15]',
								'$datos[16]',
								'$datos[17]',
								'$fecha')";
		return mysqli_query($conexion,$sql);
		}

		public function agregarAlumnoCurso2($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="INSERT into   curso_alumno (
								fk_alumno, 
								fk_cursoparalelo, 
								fk_anio, 
								estado 
								)
					values (	'$datos[0]',
								'$datos[1]',
								'$datos[2]',
								'$datos[3]'
					)";
		return mysqli_query($conexion,$sql);
		}


		public function agregarDatosRepresentante($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$fecha=date('Y-m-d');
			$sql="INSERT into   datos_representante (
										nombre_padre,
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
										fk_cedulaalumno)
					values (	'$datos[0]',
								'$datos[1]',
								'$datos[2]',
								'$datos[3]',
								'$datos[4]',
								'$datos[5]',
								'$datos[6]',
								'$datos[7]',
								'$datos[8]',
								'$datos[9]',
								'$datos[10]',
								'$datos[11]',
								'$datos[12]',
								'$datos[13]',
								'$datos[14]',
								'$datos[15]',
								'$datos[16]',
								'$datos[17]',
								'$datos[18]',
								'$datos[19]')";
		return mysqli_query($conexion,$sql);
		}

		public function agregarOtrosDatos($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$fecha=date('Y-m-d');
			$sql="INSERT into   otros_datos (
										nombre_plantel,
										tipo_plantel,
										comportamiento,
										promedio,
										escala,
										examen,
										fk_cedulaalumno)
					values (	'$datos[0]',
								'$datos[1]',
								'$datos[2]',
								'$datos[3]',
								'$datos[4]',
								'$datos[5]',
								'$datos[6]')";
		return mysqli_query($conexion,$sql);
		}






		
		
		public function obtenDatosAlumno($id_alumno){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT 	id_alumno,	
										nombre_alumno,
										lugnacimiento_alumno,
										fechanac_alumno,
										nacionalidad_alumno,
										repite_alumno,
										cedula_alumno,
										nescuela_alumno,
										lescuela_alumno,
										imagen_alumno,
										npadre_alumno,
										opadre_alumno,
										nmadre_alumno,
										omadre_alumno,
										nrepresentante_alumno,
										crepresentante_alumno,
										drepresentante_alumno,
										trepresentante_alumno,
										rfamiliar_alumno
										
							FROM alumno  where  id_alumno='$id_alumno' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);
			

			$datos=array(
				'id_alumno' => $ver[0],
				'nombre' => $ver[1],
				'lugar' => $ver[2],
				'fecha' => $ver[3],
				'nacionalidad' => $ver[4],
				'repite' => $ver[5],
				'cedula' => $ver[6],
				'nescuela' => $ver[7],
				'lescuela' => $ver[8],
				'imagen' => $ver[9],
				'npadre' => $ver[10],
				'opadre' => $ver[11],
				'nmadre' => $ver[12],
				'omadre' => $ver[13],
				'nrepre' => $ver[14],
				'crepre' => $ver[15],
				'drepre' => $ver[16],
				'trepre' => $ver[17],
				'rfrepre' => $ver[18]
				
				
				);
			return $datos;
		}
		
		public function actualizarImgAlumno($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE img_datosalumno  set nombre='$datos[1]',ruta='$datos[2]'				
							where id_imagen='$datos[0]'";
			return mysqli_query($conexion,$sql); 
		}

		public function actualizarDocAlumno($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE sub_documentos  set nombre='$datos[1]',ruta='$datos[2]'				
							where id_imagen='$datos[0]'";
			return mysqli_query($conexion,$sql); 
		}


		public function actualizarDatosAlumno($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE datos_alumno  set    apellido_alumno='$datos[0]',
										nombre_alumno='$datos[1]',
										direccion_alumno='$datos[2]',
										expreso_alumno='$datos[3]',
										emerg_alumno='$datos[4]',
										telefono_alumno='$datos[5]',
										parroquia_alumno='$datos[6]',
										telefono2_alumno='$datos[7]',
										tipo_alumno='$datos[8]',
										imagen_alumno='$datos[9]',
										observa_alumno='$datos[10]'	,
										estado_alumno='$datos[11]'
										where cedula_alumno='$datos[12]'";
			return mysqli_query($conexion,$sql);
		}

		public function actualizaAlumnoCurso2($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE curso_alumno set fk_cursoparalelo='$datos[1]',  fk_anio='$datos[0]', 
			 estado='$datos[2]' where fk_alumno='$datos[3]'";
			echo mysqli_query($conexion,$sql);
		}


		public function actualizarDocumentos($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE documentos_alumno  set    
								promocion1='$datos[0]',
								promocion2='$datos[1]',
								promocion3='$datos[2]',
								planilla='$datos[3]',
								informe1='$datos[4]',
								informe2='$datos[5]',
								partida='$datos[6]',
								fotos='$datos[7]',
								carnet='$datos[8]',
								croquis='$datos[9]',
								cedula1='$datos[10]',
								cedula2='$datos[11]',
								cedula3='$datos[12]',
								certificado1='$datos[13]',
								certificado2='$datos[14]',
								documentos='$datos[15]' 									
								where fk_alumno='$datos[16]'";
			return mysqli_query($conexion,$sql);
		}


		public function actualizarDatosRepresentante($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE datos_representante  set   	
										nombre_padre='$datos[0]',
										cedula_padre='$datos[1]',
										nivel_padre='$datos[2]',
										estado_padre='$datos[3]',
										ocupacion_padre='$datos[4]',
										empresa_padre='$datos[5]',
										nombre_madre='$datos[6]',
										cedula_madre='$datos[7]',
										nivel_madre='$datos[8]',
										estado_madre='$datos[9]',
										ocupacion_madre='$datos[10]',
										empresa_madre='$datos[11]',
										email='$datos[12]',
										separados='$datos[13]',
										nombre_conyugue='$datos[14]',
										nombre_representante='$datos[15]',
										cedula_representante='$datos[16]',
										relacionf='$datos[17]',
										autorizo='$datos[18]'
										
										where id_datosrepre	='$datos[19]'";
			return mysqli_query($conexion,$sql);
		}

		public function actualizarOtrosDatos($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE otros_datos  set   	
										nombre_plantel='$datos[0]',
										tipo_plantel='$datos[1]',
										comportamiento='$datos[2]',
										promedio='$datos[3]',
										escala='$datos[4]',
										examen='$datos[5]'
										
										where fk_cedulaalumno	='$datos[6]'";
			return mysqli_query($conexion,$sql);
		}









		public function actualizarDAlumno($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE datos_alumno  set    nombre_alumno ='$datos[0]',
										lugnacimiento_alumno ='$datos[1]',
										fechanac_alumno ='$datos[2]',
										nacionalidad_alumno ='$datos[3]',
										repite_alumno ='$datos[4]',
										cedula_alumno ='$datos[5]',
										nescuela_alumno ='$datos[6]',
										lescuela_alumno ='$datos[7]',
										imagen_alumno ='$datos[8]',
										npadre_alumno ='$datos[9]',
										opadre_alumno ='$datos[10]',
										nmadre_alumno ='$datos[11]',
										omadre_alumno ='$datos[12]',
										nrepresentante_alumno ='$datos[13]',
										crepresentante_alumno ='$datos[14]',
										drepresentante_alumno ='$datos[15]',
										trepresentante_alumno ='$datos[16]',
										rfamiliar_alumno ='$datos[17]'
										where id_alumno='$datos[18]'";
			return mysqli_query($conexion,$sql);
		}



		public function eliminar($idalumno){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from alumno where id_alumno='$idalumno'";
			return mysqli_query($conexion,$sql);
		}

		public function eliminar_datosalumno($idalumno){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from datos_alumno where cedula_alumno='$idalumno'";
			return mysqli_query($conexion,$sql);
		}

		public function eliminar_datosrepre($cedula){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from datos_representante where fk_cedulaalumno='$cedula'";
			return mysqli_query($conexion,$sql);
		}
		
		public function eliminar_otrosdatos($cedula){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from otros_datos where fk_cedulaalumno='$cedula'";
			return mysqli_query($conexion,$sql);
		}
	
	public function eliminarDocumento($id){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from documentos_alumno where id_documento='$id'";
			return mysqli_query($conexion,$sql);
		}

	public function eliminar_datoscurso($idalumno){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from curso_alumno where fk_alumno='$idalumno'";
			return mysqli_query($conexion,$sql);
		}
	


	

	
	}
?>
 