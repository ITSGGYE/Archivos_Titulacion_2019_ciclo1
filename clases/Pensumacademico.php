<?php 

	class pensumacademico{

		public function agregardatosdetalle($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			
			$sql="INSERT into detalle_pensum_academico
			(fk_pensum, fk_profesor, fk_materia, estado)
						values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]')";
								
								
			return mysqli_query($conexion,$sql);
		}

		public function agregardatos($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$fecha=date('Y-m-d');
			$sql="INSERT into pensum_academico(fk_anio,fk_profesor,fk_curso,fecha_registro,estado)
						values ('$datos[0]','$datos[1]','$datos[2]','$fecha','$datos[3]')";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($idpensum){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT id_pensum,  fk_anio, fk_profesor , fk_curso, estado from pensum_academico where  id_pensum='$idpensum' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'idpensum' => $ver[0],
				'anio' => $ver[1],
				'profesor' => $ver[2],
				'curso' => $ver[3],
				'estado' => $ver[4]	
				);
			return $datos;
		}

		public function obtenDatosdetalle($idpensum){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT id_detalle_pensum, fk_pensum,fk_profesor,fk_materia, estado from detalle_pensum_academico where  id_detalle_pensum='$idpensum' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'idpensum' => $ver[0],
				'pensum'=>$ver[1],
				'profesor' => $ver[2],
				'materia' => $ver[3],
				'estado' => $ver[4]	
				);
			return $datos;
		}


		public function actualizadatos($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE pensum_academico set  
			fk_anio='$datos[1]', 
			fk_profesor='$datos[2]', 
			fk_curso='$datos[3]', 
			estado='$datos[4]'
			where id_pensum='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}
		public function actualizadatosdetalle($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE detalle_pensum_academico set  
			fk_pensum='$datos[1]',
			fk_profesor='$datos[2]', 
			fk_materia='$datos[3]', 
			estado='$datos[4]'
			where id_detalle_pensum='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}

		public function eliminadatos($idpensum){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from pensum_academico
					where id_pensum='$idpensum'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminadatosdetalle($idpensum){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from detalle_pensum_academico
					where id_detalle_pensum='$idpensum'";
			return mysqli_query($conexion,$sql);
		}



	}

 ?>