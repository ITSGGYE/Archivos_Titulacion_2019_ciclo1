
<?php 

	class Cursos{

		public function agregarCurso($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="INSERT into curso(nombre_Curso, estado_Curso)
						values ('$datos[0]','$datos[1]')";
								
								
			return mysqli_query($conexion,$sql);
		}
		
		public function obtenDatosCurso($id_curso){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT  id_curso, nombre_Curso, estado_Curso
							FROM curso  where  id_curso='$id_curso' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'id_curso' => $ver[0],
				'nombre' => $ver[1],
				'estado' => $ver[2]
				
				);
			return $datos;
		}
		
		public function actualizaCurso($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE curso set nombre_Curso='$datos[1]', estado_Curso='$datos[2]'
								where id_curso='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}

			public function actualizaAlumnoCurso2($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE curso_alumno set fk_curso='$datos[3]',fk_anio='$datos[2]'
			  where fk_curso='$datos[0]' and fk_anio='$datos[1]'";
			echo mysqli_query($conexion,$sql);
		}


		
		public function eliminaCurso($id_curso){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from curso
					where id_curso='$id_curso'";
			return mysqli_query($conexion,$sql);
		}

		

	}

 ?>