<?php
class conectar_bd{
		private $servidor="localhost";
		private $usuario="root";
		private $contras="";
		private $bd_nomb="inventario_lucho";

		public function conexion_bd(){
			$conexion=mysqli_connect($this->servidor,
									 $this->usuario,
									 $this->contras,
									 $this->bd_nomb);
			return $conexion;
		}
	}

/*Para comprobar la conexion*/
/*
$c= new conectar_bd();
$conex= $c->conexion_bd();
if($conex){
	echo "coneccion exitosa";
}else{
echo "coneccion fallida";
 }
*/
?>


