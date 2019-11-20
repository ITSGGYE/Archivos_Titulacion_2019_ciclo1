<?php 
class calificaciones{
		public function agregarnotas($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="INSERT into   notas (fk_alumno, fk_materia, fk_profesor, fk_curso, fk_anio, nota, nota2) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]')";
								
				
	$result= mysqli_query($conexion,$sql);
		if($result==1){
			return 1;
		} else  {
		return 0;
		}
	}

	public function agregarnotasingles($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="INSERT into   notas_ingles (fk_alumno, fk_materia, fk_profesor, fk_curso,fk_parcial, fk_anio, nota, nota2, nota3, nota4, nota5) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]','$datos[9]','$datos[10]')";
								
				
	$result= mysqli_query($conexion,$sql);
		if($result==1){
			return 1;
		} else  {
		return 0;
		}
	}

	public function agregarnotasartistica($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="INSERT into   notas_artistica (fk_alumno, fk_materia, fk_profesor, fk_curso,fk_parcial, fk_anio, nota, nota2, nota3, nota4, nota5) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]','$datos[9]','$datos[10]')";
								
				
	$result= mysqli_query($conexion,$sql);
		if($result==1){
			return 1;
		} else  {
		return 0;
		}
	}

	public function agregarnotasproyecto($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="INSERT into   notas_proyecto (fk_alumno, fk_materia, fk_profesor, fk_curso,fk_parcial, fk_anio, nota) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]')";
								
				
	$result= mysqli_query($conexion,$sql);
		if($result==1){
			return 1;
		} else  {
		return 0;
		}
	}

public function agregarnotasproyecto2($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="INSERT into   proyecto_escolar (fk_alumno,  fk_profesor, fk_curso,fk_parcial, fk_anio, nota) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]')";
								
				
	$result= mysqli_query($conexion,$sql);
		if($result==1){
			return 1;
		} else  {
		return 0;
		}
	}

	

		public function agregarnotasinicial2($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="INSERT into   notas_inicial2 (fk_alumno, fk_materia, fk_submateria, fk_profesor, fk_curso, fk_periodo, fk_anio, parcial1, parcial2, parcial3,examen, promedio) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]','$datos[9]','$datos[10]','$datos[11]')";
								
				
	$result= mysqli_query($conexion,$sql);
		if($result==1){
			return 1;
		} else  {
		return 0;
		}
	}

	public function agregarnotaspreparatoria($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="INSERT into   notas_preparatoria (fk_alumno, fk_materia, fk_submateria, fk_profesor, fk_curso, fk_periodo, fk_anio, parcial1, parcial2, parcial3,examen, promedio) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]','$datos[9]','$datos[10]','$datos[11]')";
								
				
	$result= mysqli_query($conexion,$sql);
		if($result==1){
			return 1;
		} else  {
		return 0;
		}
	}
		public function agregarnotasconducta($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="INSERT into  comportamiento (fk_alumno, fk_profesor, fk_curso, fk_parcial, fk_anio, nota) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]')";
								
				
	$result= mysqli_query($conexion,$sql);
		if($result==1){
			return 1;
		} else  {
		return 0;
		}
	}

	/*public function agregarnotasproyecto($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="INSERT into  proyecto_escolar (fk_alumno, fk_profesor, fk_curso, fk_parcial, fk_anio, nota) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]')";
								
				
	$result= mysqli_query($conexion,$sql);
		if($result==1){
			return 1;
		} else  {
		return 0;
		}
	}*/



	public function agregarnotasasistencia($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="INSERT into  asistencia (fk_alumno, fk_profesor, fk_curso, fk_parcial, fk_anio, fj, fi, fa) values ('$datos[0]','$datos[1]','$datos[2]',
			'$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]')";
								
				
	$result= mysqli_query($conexion,$sql);
		if($result==1){
			return 1;
		} else  {
		return 0;
		}
	}

	public function agregarnotasexamen($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="INSERT into  notas_examen (fk_alumno, fk_materia, fk_profesor, fk_curso, fk_examen, fk_anio, nota, observacion) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]', '$datos[7]')";
	$result= mysqli_query($conexion,$sql);
		if($result==1){
			return 1;
		} else  {
		return 0;
		}
	}

	public function agregarnotasexameningles($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="INSERT into  examen_ingles (fk_alumno, fk_materia, fk_profesor, fk_curso, fk_examen, fk_anio, nota, observacion) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]', '$datos[7]')";
	$result= mysqli_query($conexion,$sql);
		if($result==1){
			return 1;
		} else  {
		return 0;
		}
	}

	public function agregarnotasexamenartistica($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="INSERT into  examen_artistica (fk_alumno, fk_materia, fk_profesor, fk_curso, fk_examen, fk_anio, nota, observacion) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]', '$datos[7]')";
	$result= mysqli_query($conexion,$sql);
		if($result==1){
			return 1;
		} else  {
		return 0;
		}
	}

	public function agregarnotassupletorio($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="INSERT into  notas_supletorio (fk_alumno, fk_materia, fk_profesor, fk_curso, fk_examen, fk_anio, nota) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]')";
	$result= mysqli_query($conexion,$sql);
		if($result==1){
			return 1;
		} else  {
		return 0;
		}
	}

		public function alumnossupletorio($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="INSERT into  alumnos_supletorio (fk_alumno, fk_curso, fk_anio,  fk_profesor, fk_materia) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]')";
								
				
	$result= mysqli_query($conexion,$sql);
		if($result==1){
			return 1;
		} else  {
		return 0;
		}
	}

	public function updatenotasexamen($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="UPDATE notas_examen set fk_alumno='$datos[1]', fk_materia='$datos[2]', fk_profesor='$datos[3]', fk_curso='$datos[4]',fk_examen='$datos[5]', fk_anio='$datos[6]', nota='$datos[7]', observacion='$datos[8]' where id_examennota='$datos[0]'";
	$result= mysqli_query($conexion,$sql);
		
	}

	public function updateasistencia($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="UPDATE asistencia set fj='$datos[1]', fi='$datos[2]', fa='$datos[3]' where id_asistencia='$datos[0]'";
	$result= mysqli_query($conexion,$sql);
		
	}

	public function updateconducta($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="UPDATE comportamiento set nota='$datos[1]' where id_conducta='$datos[0]'";
	$result= mysqli_query($conexion,$sql);
		
	}

	public function updateproyecto($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="UPDATE proyecto_escolar set nota='$datos[1]' where id_proyecto='$datos[0]'";
	$result= mysqli_query($conexion,$sql);
		
	}

	public function updateesatadoalumno($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="UPDATE datos_alumno set estado_alumno='$datos[1]' where cedula_alumno='$datos[0]'";
	$result= mysqli_query($conexion,$sql);
		
	}

	public function updatenotasinicial2($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="UPDATE notas_inicial2 set parcial1='$datos[1]', parcial2='$datos[2]', parcial3='$datos[3]', examen='$datos[4]', 
			promedio='$datos[5]' where id_notas='$datos[0]'";
	$result= mysqli_query($conexion,$sql);
		
	}

		public function updatenotaspreparatoria($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			
			$sql="UPDATE notas_preparatoria set parcial1='$datos[1]', parcial2='$datos[2]', parcial3='$datos[3]', examen='$datos[4]', 
			promedio='$datos[5]' where id_notas='$datos[0]'";
	$result= mysqli_query($conexion,$sql);
		
	}



	}
	?>