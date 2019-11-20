<?php 

	class Materia{

		public function agregaMateria($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="INSERT into materia (nombre_materia,estado_materia)
						values ('$datos[0]', '$datos[1]')";
								
								
			return mysqli_query($conexion,$sql);
		}
		public function agregaMateriaInicial2($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="INSERT into materia_inicial2 (nombre_materia,estado_materia)
						values ('$datos[0]', '$datos[1]')";
								
								
			return mysqli_query($conexion,$sql);
		}
		public function agregaMateriaPreparatoria($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="INSERT into materia_preparatoria (nombre_materia,estado_materia)
						values ('$datos[0]', '$datos[1]')";
								
								
			return mysqli_query($conexion,$sql);
		}

			public function agregadetallemateria($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="INSERT into detalle_materia_inicial (fk_materia, actividad, estado)
						values ('$datos[0]', '$datos[1]', '$datos[2]')";
								
								
			return mysqli_query($conexion,$sql);
		}

			public function agregadetallemateriapreparatoria($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="INSERT into detalle_materia_preparatoria (fk_materia, actividad, estado)
						values ('$datos[0]', '$datos[1]', '$datos[2]')";
								
								
			return mysqli_query($conexion,$sql);
		}



		public function obtenDatosdetallemateria($id_materia){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT  id_detalle_materia, fk_materia, actividad, estado
							FROM detalle_materia_inicial  where  id_detalle_materia='$id_materia' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'id' => $ver[0],
				'materia' => $ver[1],
				'detalle' => $ver[2],
				'estado' => $ver[3]
				
				
				);
			return $datos;
		}

			public function obtenDatosdetallemateriapreparatoria($id_materia){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT  id_detalle_materia, fk_materia, actividad, estado
							FROM detalle_materia_preparatoria  where  id_detalle_materia='$id_materia' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'id' => $ver[0],
				'materia' => $ver[1],
				'detalle' => $ver[2],
				'estado' => $ver[3]
				
				
				);
			return $datos;
		}

		public function obtenDatosMateria($id_materia){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT  id_materia, nombre_materia, estado_materia
							FROM materia  where  id_materia='$id_materia' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'id_materia' => $ver[0],
				'nombre' => $ver[1],
				'estado' => $ver[2]
				
				);
			return $datos;
		}
		public function obtenDatosMateriaPreparatoria($id_materia){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT  id_materia, nombre_materia, estado_materia
							FROM materia_preparatoria  where  id_materia='$id_materia' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'id_materia' => $ver[0],
				'nombre' => $ver[1],
				'estado' => $ver[2]
				
				);
			return $datos;
		}
		public function obtenDatosMateriaInicial2($id_materia){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT  id_materia, nombre_materia, estado_materia
							FROM materia_inicial2  where  id_materia='$id_materia' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'id_materia' => $ver[0],
				'nombre' => $ver[1],
				'estado' => $ver[2]
				
				);
			return $datos;
		}
		public function actualizaMateria($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE materia set nombre_materia='$datos[1]', estado_materia='$datos[2]'
								where id_materia='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}
		public function actualizaMateriaPreparatoria($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE materia_preparatoria set nombre_materia='$datos[1]', estado_materia='$datos[2]'
								where id_materia='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}
		public function actualizaMateriaInicial2($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE materia_inicial2 set nombre_materia='$datos[1]', estado_materia='$datos[2]'
								where id_materia='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}


		public function actualizadetallemateria($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE detalle_materia_inicial set fk_materia='$datos[1]', actividad='$datos[2]',  estado='$datos[3]'
								where id_detalle_materia='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}


		public function actualizadetallemateriapreparatoria($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE detalle_materia_preparatoria set fk_materia='$datos[1]', actividad='$datos[2]',  estado='$datos[3]'
								where id_detalle_materia='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}

		public function eliminaMateria($idmateria){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from materia
					where id_materia='$idmateria'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminaMateriaPreparatoria($idmateria){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from materia_preparatoria
					where id_materia='$idmateria'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminaMateriaInicial2($idmateria){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from materia_inicial2
					where id_materia='$idmateria'";
			return mysqli_query($conexion,$sql);
		}


			public function eliminadetallemateria($idmateria){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from detalle_materia_inicial
					where id_detalle_materia='$idmateria'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminadetallemateriapreparatoria($idmateria){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from detalle_materia_preparatoria
					where id_detalle_materia='$idmateria'";
			return mysqli_query($conexion,$sql);
		}



	}

 ?>