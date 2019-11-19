<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Profesor.php";
	$obj= new profesor();

	$datos=array();
	
	$nombreImg=$_FILES['imagen']['name'];
	$rutaAlmacenamiento=$_FILES['imagen']['tmp_name'];
	$carpeta='../../Imagenes/Profesores/';
	$rutaFinal=$carpeta.$nombreImg;

	$datosImg=array(
		$nombreImg,
		$rutaFinal
					);

		if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
				$idimagen=$obj->agregaImagenProfesor($datosImg);

				if($idimagen > 0){

					$datos[0]=$_POST['nombre'];
					$datos[1]=$_POST['direccion'];
					$datos[2]=$_POST['telefono'];
					$datos[3]=$_POST['celular'];
					$datos[4]=$_POST['cedula'];
					$datos[5]=$_POST['email'];
					$datos[6]=$_POST['fecha'];
					$datos[7]=$_POST['titulo'];
					$datos[8]=$_POST['genero'];
					$datos[9]=$idimagen;
					
					
					
					echo $obj->agregarProfesor($datos);
				}else{
					echo 0;
				}
		}




	
	

 ?>