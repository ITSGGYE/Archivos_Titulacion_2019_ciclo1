
<?php 

	class Paralelo{

		public function agregarParalelo($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="INSERT into paralelo(nombre_paralelo, estado_paralelo)
						values ('$datos[0]','$datos[1]')";
								
								
			return mysqli_query($conexion,$sql);
		}
		
		public function obtenDatosParalelo($id_paralelo){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT  id_paralelo, nombre_paralelo, estado_paralelo
							FROM paralelo  where  id_paralelo='$id_paralelo' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'id_paralelo' => $ver[0],
				'nombre' => $ver[1],
				'estado' => $ver[2]
				
				);
			return $datos;
		}
		

		public function actualizaParalelo($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE paralelo set nombre_paralelo='$datos[1]', estado_paralelo='$datos[2]'
								where id_paralelo='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}
		


		public function eliminaParalelo($id_paralelo){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from paralelo
					where id_paralelo='$id_paralelo'";
			return mysqli_query($conexion,$sql);
		}

	


	}

 ?>