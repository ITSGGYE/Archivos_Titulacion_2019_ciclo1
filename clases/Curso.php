
<?php 

	class Cursos{

		public function agregarCurso($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="INSERT into curso(nombre_Curso, estado_Curso)
						values ('$datos[0]','$datos[1]')";
								
								
			return mysqli_query($conexion,$sql);
		}

		public function agregarCursoParalelo($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="INSERT into curso_paralelo(fk_curso,fk_paralelo, estado)
						values ('$datos[0]','$datos[1]', '$datos[2]')";
								
								
			return mysqli_query($conexion,$sql);
		}


		public function agregartutor($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="INSERT into tutor(fk_profesor, fk_curso, estado)
						values ('$datos[0]','$datos[1]','$datos[2]')";
								
								
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

		public function obtenDatosCursoParalelo($id_curso){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT  id_cursoparalelo, fk_curso, fk_paralelo, estado
							FROM curso_paralelo  where  id_cursoparalelo='$id_curso' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'id_curso' => $ver[0],
				'curso' => $ver[1],
				'paralelo' => $ver[2],
				'estado' => $ver[3]
				);
			return $datos;
		}
		public function obtenDatostutor($id){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT  id_tutor, fk_profesor, fk_curso, estado
							FROM tutor where  id_tutor='$id' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'id' => $ver[0],
				'profesor' => $ver[1],
				'curso' => $ver[2],
				'estado' => $ver[3]
				
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


		public function actualizaCursoParalelo($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE curso_paralelo set fk_curso='$datos[1]', fk_paralelo='$datos[2]' , estado='$datos[3]'
								where id_cursoparalelo='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}

		public function actualizatutor($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE tutor set fk_profesor='$datos[1]', fk_curso='$datos[2]', estado='$datos[3]'
								where id_tutor='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}


		public function eliminaCurso($id_curso){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from curso
					where id_curso='$id_curso'";
			return mysqli_query($conexion,$sql);
		}

		public function eliminaCursoParalelo($id_curso){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from curso_paralelo
					where id_cursoparalelo='$id_curso'";
			return mysqli_query($conexion,$sql);
		}

		public function eliminatutor($id){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from tutor
					where id_tutor='$id'";
			return mysqli_query($conexion,$sql);
		}


	}

 ?>