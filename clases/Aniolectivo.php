<?php 

	class aniolectivo{

		public function agregaraniolectivo($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="INSERT into aniolectivo (anio_lectivo, estado_aniolectivo)
						values ('$datos[0]','$datos[1]')";
								
								
			return mysqli_query($conexion,$sql);
		}
		public function obtenDatosaniolectivo($idanio){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT 
			id_aniolectivo,	
			anio_lectivo,				
			estado_aniolectivo		
 			from  aniolectivo  where  id_aniolectivo='$idanio' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'idanio' => $ver[0],
				'anio' => $ver[1],
				'estado' => $ver[2]
				
							);
			return $datos;
		}

		public function actualizaaniolectivo($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE aniolectivo set  
			anio_lectivo='$datos[1]', estado_aniolectivo='$datos[2]' where id_aniolectivo='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}

		public function eliminaaniolectivo($idanio){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from aniolectivo
					where id_aniolectivo='$idanio'";
			return mysqli_query($conexion,$sql);
		}


	}

 ?>