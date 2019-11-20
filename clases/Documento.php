<?php 

	class Documento{
		

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

			public function agregarDocumentoAlumno2($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');

			$sql="INSERT into sub_documentos2 (nombre,
										ruta,
										fechaSubida)
							values ('$datos[0]',
									'$datos[1]',
									'$fecha')";
									
			$result=mysqli_query($conexion,$sql);

			return mysqli_insert_id($conexion);
		}

			public function agregarDocumentoAlumno3($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');

			$sql="INSERT into sub_documentos3 (nombre,
										ruta,
										fechaSubida)
							values ('$datos[0]',
									'$datos[1]',
									'$fecha')";
									
			$result=mysqli_query($conexion,$sql);

			return mysqli_insert_id($conexion);
		}

			public function agregarDocumentoAlumno4($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');

			$sql="INSERT into sub_documentos4 (nombre,
										ruta,
										fechaSubida)
							values ('$datos[0]',
									'$datos[1]',
									'$fecha')";
									
			$result=mysqli_query($conexion,$sql);

			return mysqli_insert_id($conexion);
		}

			public function agregarDocumentoAlumno5($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');

			$sql="INSERT into sub_documentos5 (nombre,
										ruta,
										fechaSubida)
							values ('$datos[0]',
									'$datos[1]',
									'$fecha')";
									
			$result=mysqli_query($conexion,$sql);

			return mysqli_insert_id($conexion);
		}






		
		public function agregarDocumentos2($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$fecha=date('Y-m-d');
			$sql="INSERT into   documentos_alumno2 (
								documentos,
								documentos2,
								documentos3,
								documentos4,
								documentos5,
								fk_alumno)
					values (	'$datos[0]',
								'$datos[1]',
								'$datos[2]',
								'$datos[3]',
								'$datos[4]',
								'$datos[5]')";
		return mysqli_query($conexion,$sql);
		}

		
		public function actualizarDocAlumno($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE sub_documentos  set nombre='$datos[1]',ruta='$datos[2]'				
							where id_imagen='$datos[0]'";
			return mysqli_query($conexion,$sql); 
		}

		public function actualizarDocAlumno2($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE sub_documentos2  set nombre='$datos[1]',ruta='$datos[2]'				
							where id_imagen='$datos[0]'";
			return mysqli_query($conexion,$sql); 
		}

		public function actualizarDocAlumno3($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE sub_documentos3  set nombre='$datos[1]',ruta='$datos[2]'				
							where id_imagen='$datos[0]'";
			return mysqli_query($conexion,$sql); 
		}

		public function actualizarDocAlumno4($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE sub_documentos4  set nombre='$datos[1]',ruta='$datos[2]'				
							where id_imagen='$datos[0]'";
			return mysqli_query($conexion,$sql); 
		}

		public function actualizarDocAlumno5($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE sub_documentos5  set nombre='$datos[1]',ruta='$datos[2]'				
							where id_imagen='$datos[0]'";
			return mysqli_query($conexion,$sql); 
		}


		
		public function actualizarDocumentos2($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE documentos_alumno2  set    
								documentos='$datos[0]',
								documentos2='$datos[1]',
								documentos3='$datos[2]',
								documentos4='$datos[3]',
								documentos5='$datos[4]',
								where fk_alumno='$datos[5]'";
			return mysqli_query($conexion,$sql);
		}


		
		public function eliminar($idalumno){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from alumno where id_alumno='$idalumno'";
			return mysqli_query($conexion,$sql);
		}

		
	public function eliminarDocumento($id){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from documentos_alumno where id_documento='$id'";
			return mysqli_query($conexion,$sql);
		}

	
	}
?>
 