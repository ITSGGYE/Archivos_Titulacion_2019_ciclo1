<?php 

	require_once "../../clases/conexion.php";
	require_once "../../clases/Alumno.php";
	$obj= new alumno();

	$idimagen=$_POST['imagen2'];
	$datos=array();
					$datos[0]=$_POST['nombre2'];
					$datos[1]=$_POST['fecha2'];
					$datos[2]=$_POST['nacionalidad2'];
					$datos[3]=$_POST['cedula2'];
					$datos[4]=$_POST['nescuela2'];
					$datos[5]=$idimagen;
					/*$datos[6]=$_POST['emergencia2'];
					$datos[7]=$_POST['telefono2'];
					$datos[8]=$_POST['direccion2'];
					$datos[9]=$_POST['documento2'];
					$datos[10]=$_POST['condicion2'];
					$datos[11]=$_POST['observacion2'];*/
					$datos[6]=$_POST['id'];
					$datos[7]=$_POST['telefono2'];
					$datos[8]=$_POST['direccion2'];
					$datos[9]=$_POST['emergencia2'];
					$datos[10]=$_POST['documento2'];
					$datos[11]=$_POST['condicion2'];
					$datos[12]=$_POST['observacion2'];

	if($_FILES["imagennueva"]["name"] != '')
		{
			$nombreImg=$_FILES['imagennueva']['name'];
			$rutaAlmacenamiento=$_FILES['imagennueva']['tmp_name'];
			$carpeta='../../Imagenes/Alumno/';
			$rutaFinal=$carpeta.$nombreImg;
			
			$datosImg=array($idimagen,
			$nombreImg,
			$rutaFinal
					);
			if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
				$udpateimg=$obj->actualizarImgAlumno($datosImg);

		}
	}
	

	echo $obj->actualizarAlumno($datos);
	

 ?>

 