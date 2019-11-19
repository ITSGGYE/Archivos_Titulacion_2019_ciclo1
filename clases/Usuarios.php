<?php 

	class usuario{

		public function agregausuario($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$fecha=date('Y-m-d');
			$sql="INSERT into usuarios 	(fk_profesor,usuario,contrasena,privilegio,fecha_registro)
						values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$fecha')";
					mysqli_query($conexion,$sql);
		}

		public function obtenDatosusuario($idusuario){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT  id_usuario, fk_profesor, usuario,contrasena,privilegio
							FROM usuarios where  id_usuario='$idusuario' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'idusuario' => $ver[0],
				'profesor' => $ver[1],
				'usuario' => $ver[2],
				'password' => $ver[3],
				'estado' => $ver[4]
					);
			return $datos;
		}
		public function actualizausuario($datos){ 
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE usuarios set fk_profesor='$datos[1]', usuario='$datos[2]',
			privilegio='$datos[4]'
											where id_usuario='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}

			public function actualizausuariopass($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE usuarios set fk_profesor='$datos[1]', usuario='$datos[2]', 
			 privilegio='$datos[3]'
											where id_usuario='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}


		public function actualizaclave($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE usuarios set contrasena='$datos[1]'where fk_profesor='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}

		public function eliminausuario($idusuario){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from usuarios
					where id_usuario='$idusuario'";
			return mysqli_query($conexion,$sql);
		}


	}

 ?>