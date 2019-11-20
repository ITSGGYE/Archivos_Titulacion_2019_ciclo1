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
					$datos[1]=$_POST['lugar'];
					$datos[2]=$_POST['fecha'];
					$datos[3]=$_POST['nacionalidad'];
					$datos[4]=$_POST['repite'];
					$datos[5]=$_POST['cedula'];
					$datos[6]=$_POST['nescuela'];
					$datos[7]=$_POST['lescuela'];
					$datos[8]=$idimagen;
					$datos[9]=$_POST['npadre'];
					$datos[10]=$_POST['opadre'];
					$datos[11]=$_POST['nmadre'];
					$datos[12]=$_POST['omadre'];
					$datos[13]=$_POST['nrepre'];
					$datos[14]=$_POST['crepre'];
					$datos[15]=$_POST['drepre'];
					$datos[16]=$_POST['trepre'];
					$datos[17]=$_POST['rfrepre'];
					
					echo $obj->agregarAlumno($datos);
				}else{
					echo 0;
				}
		}
	

 ?>