<?php 

	class profesor{
		public function agregaImagenProfesor($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');

			$sql="INSERT into img_profesor (nombre,
										ruta,
										fechaSubida)
							values ('$datos[0]',
									'$datos[1]',
									'$fecha')";
									
			$result=mysqli_query($conexion,$sql);

			return mysqli_insert_id($conexion);
		}

		public function agregarProfesor($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$fecha=date('Y-m-d');
			$sql="INSERT into   profesor ( nombre_profesor,				
										   direccion_profesor,			
										   telefono_profesor,				
										   celular_profesor,				
										   cedula_profesor,			
										   email_profesor,			
										   fechanac_profesor,			
										   titulo_profesor,			
										   genero_profesor,				
										   imagen_profesor,				
										   fechareg_profesor )			
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
								'$fecha')";
		return mysqli_query($conexion,$sql);
		}

		

		public function obtenDatosProfesor($idprofesor){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT 	
							nombre_profesor,				
							direccion_profesor,			
							telefono_profesor,				
							celular_profesor,				
							cedula_profesor,			
							email_profesor,			
							fechanac_profesor,			
							titulo_profesor,			
							genero_profesor,				
							imagen_profesor,
							id_profesor				
							FROM profesor  where  id_profesor='$idprofesor' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);
			

			$datos=array(
				'nombre' => $ver[0],
				'direccion' => $ver[1],
				'telefono' => $ver[2],
				'celular' => $ver[3],
				'cedula' => $ver[4],
				'email' => $ver[5],
				'fecha' => $ver[6],
				'titulo' => $ver[7],
				'genero' => $ver[8],
				'imagen' => $ver[9],
				'id_profesor' => $ver[10]
				
				);
			return $datos;
		}
		public function actualizarImgProfesor($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE img_profesor set nombre='$datos[1]',ruta='$datos[2]'				
							where id_imagen='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}

		public function actualizarProfesor($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE profesor set nombre_profesor='$datos[0]',				
							direccion_profesor='$datos[1]',			
							telefono_profesor='$datos[2]',				
							celular_profesor='$datos[3]',				
							cedula_profesor='$datos[4]',			
							email_profesor='$datos[5]',			
							fechanac_profesor='$datos[6]',			
							titulo_profesor='$datos[7]',			
							genero_profesor='$datos[8]',				
							imagen_profesor='$datos[9]'
							
							where id_profesor='$datos[10]'";
			return mysqli_query($conexion,$sql);
		}


		public function eliminaProfesor($idprofesor){
			$c=new conectar();
			$conexion=$c->conexion();

	$idimagen=self::obtenIdImgProfesor($idprofesor);
			
			$sql="DELETE from profesor
					where id_profesor='$idprofesor'";
			return mysqli_query($conexion,$sql);

			if($result){
				$ruta=self::obtenRutaImagenProfesor($idimagen);

				$sql="DELETE from img_profesor 
						where id_imagen='$idimagen'";
				return mysqli_query($conexion,$sql);
					if($result){
						if(unlink($ruta)){
							return 1;
						}
						return 1;
					}
			}
		}

		public function obtenIdImgProfesor($idimagen){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT imagen_profesor
					from profesor
					where id_profesor='$idimagen'";
			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}

		

		public function obtenRutaImagenProfesor($idImg){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT ruta 
					from img_profesor 
					where id_imagen='$idImg'";

			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}

	
	}
?>
 