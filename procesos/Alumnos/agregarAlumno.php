<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Alumno.php";
	$obj= new alumno();

	$datos=array();
	
	$nombreImg=$_FILES['imagen']['name'];
	$rutaAlmacenamiento=$_FILES['imagen']['tmp_name'];
	$carpeta='../../Imagenes/Alumno/';
	$rutaFinal=$carpeta.$nombreImg;

	$datosImg=array(
		$nombreImg,
		$rutaFinal
					);

		if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
				$idimagen=$obj->agregaImagenAlumno($datosImg);

				if($idimagen > 0){

					$datos[0]=$_POST['nombre'];
					$datos[1]=$_POST['fecha'];
					$datos[2]=$_POST['nacionalidad'];
					$datos[3]=$_POST['cedula'];
					$datos[4]=$_POST['nescuela'];
					$datos[5]=$idimagen;
					$datos[6]=$_POST['emergencia'];
					$datos[7]=$_POST['telefono'];
					$datos[8]=$_POST['direccion'];
					$datos[9]=$_POST['documento'];
					$datos[10]=$_POST['condicion'];
					$datos[11]=$_POST['observacion'];
		
					
					echo $obj->agregarAlumno($datos);
				}else{
					echo 0;
				}
		}
	

 ?>