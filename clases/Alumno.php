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
		public function agregarAlumno($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$fecha=date('Y-m-d');
			$sql="INSERT into   alumno (nombre_alumno,
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
										obser_alumno,
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
								'$fecha')";
		return mysqli_query($conexion,$sql);
		}

		public function agregarDatosFamiliares($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$fecha=date('Y-m-d');
			$sql="INSERT into   datos_familiares(fk_alumno,
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
										celular_madre,
										fechareg)
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
								'$datos[19]',
								'$datos[20]',
								'$datos[21]',
								'$datos[22]',
								'$fecha')";
		return mysqli_query($conexion,$sql);
		}

		public function agregarDatosRepresentante($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$fecha=date('Y-m-d');
			$sql="INSERT into   datos_representante (
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
										relacionf_repre,
										fechareg)
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
								'$fecha')";
		return mysqli_query($conexion,$sql);
		}


		
		
		public function obtenDatosAlumno($id){
			$obj= new conectar();
			$conexion=$obj->conexion();
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
							FROM alumno  where  id_alumno='$id' ";
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
			return $datos;
		}

		public function obtenDatosFamiliares($id){
			$obj= new conectar();
			$conexion=$obj->conexion();
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
										FROM datos_familiares  where  id_datosfamiliares='$id'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);
			

			$datos=array(
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
			return $datos;
		}
		
		public function obtenDatosRepresentante($id){
			$obj= new conectar();
			$conexion=$obj->conexion();
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
										FROM datos_representante  where  id_datosrepresentante='$id'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);
			

			$datos=array(
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
			return $datos;
		}

		public function actualizarImgAlumno($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE img_alumno set nombre='$datos[1]',ruta='$datos[2]'				
							where id_imagen='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}

		public function actualizarAlumno($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE alumno  set    nombre_alumno ='$datos[0]',
										fechanac_alumno ='$datos[1]',
										nacionalidad_alumno ='$datos[2]',
										cedula_alumno ='$datos[3]',
										nescuela_alumno ='$datos[4]',
										imagen_alumno ='$datos[5]',
										telf_alumno= '$datos[7]',
										direc_alumno= '$datos[8]',
										emg_alumno='$datos[9]',
										docum_alumno='$datos[10]',
										cond_alumno='$datos[11]',
										obser_alumno='$datos[12]'
										
										where id_alumno='$datos[6]'";
			return mysqli_query($conexion,$sql);
		}

			public function actualizarDatosFamiliares($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE datos_familiares  set    fk_alumno='$datos[0]',
										nombre_padre='$datos[1]',
										cedula_padre='$datos[2]',
										fecha_padre='$datos[3]',
										nacionalidad_padre='$datos[4]',
										estadocivil_padre='$datos[5]',
										email_padre='$datos[6]',
										niveleducacion_padre='$datos[7]',
										ocupacion_padre='$datos[8]',
										restudiante_padre='$datos[9]',
										auto_padre='$datos[10]',
										celular_padre='$datos[11]',
										nombre_madre='$datos[12]',
										cedula_madre='$datos[13]',
										fecha_madre='$datos[14]',
										nacionalidad_madre='$datos[15]',
										estadocivil_madre='$datos[16]',
										email_madre='$datos[17]',
										niveleducacion_madre='$datos[18]',
										ocupacion_madre='$datos[19]',
										restudiante_madre='$datos[20]',
										auto_madre='$datos[21]',
										celular_madre='$datos[22]'
										where id_datosfamiliares='$datos[23]'";
			return mysqli_query($conexion,$sql);
		}

		public function actualizarDatosRepresentante($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE datos_representante  set    fk_alumno='$datos[0]',
										nombre_repre='$datos[1]',
										cedula_repre='$datos[2]',
										fecha_repre='$datos[3]',
										nacionalidad_repre='$datos[4]',
										estadocivil_repre='$datos[5]',
										email_repre='$datos[6]',
										niveleducacion_repre='$datos[7]',
										ocupacion_repre='$datos[8]',
										restudiante_repre='$datos[9]',
										auto_repre='$datos[10]',
										celular_repre='$datos[11]',
										relacionf_repre='$datos[12]'
										where id_datosrepresentante='$datos[13]'";
			return mysqli_query($conexion,$sql);
		}




		public function eliminar($idalumno){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from alumno where id_alumno='$idalumno'";
			return mysqli_query($conexion,$sql);
		}
	
		public function eliminarDatosFamiliares($id){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from datos_familiares where id_datosfamiliares='$id'";
			return mysqli_query($conexion,$sql);
		}
	public function eliminarDatosRepresentante($id){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from datos_representante where id_datosrepresentante='$id'";
			return mysqli_query($conexion,$sql);
		}
	
	
	}
?>
 