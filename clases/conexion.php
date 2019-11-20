

<?php 

	class conectar{
		public function conexion(){
			$conexion=mysqli_connect('localhost',
										'root',
										'',
										'sistmatriculacion');
			mysqli_query($conexion,"SET NAMES 'utf8'");
			

			return $conexion;
		}
	}


 ?>