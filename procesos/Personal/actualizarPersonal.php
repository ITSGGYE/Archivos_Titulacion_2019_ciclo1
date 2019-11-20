<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Profesor.php";
	$obj= new profesor();
	$idimagen=$_POST['imagen2'];
	$datos=array(
				$_POST['nombre2'],
				$_POST['direccion2'],
				$_POST['telefono2'],
				$_POST['celular2'],								
				$_POST['cedula2'],
				$_POST['email2'],
				$_POST['fecha2'],
				$_POST['titulo2'],
				$_POST['genero2'],
				$_POST['imagen2'],
				$_POST['id_profesor']
				);
	if($_FILES["imagennueva"]["name"] != '')
		{
			$nombreImg=$_FILES['imagennueva']['name'];
			$rutaAlmacenamiento=$_FILES['imagennueva']['tmp_name'];
			$carpeta='../../Imagenes/Profesores/';
			$rutaFinal=$carpeta.$nombreImg;
			
			$datosImg=array($idimagen,
			$nombreImg,
			$rutaFinal
					);
			if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
				$udpateimg=$obj->actualizarImgProfesor($datosImg);
		}
	}
	

	echo $obj->actualizarProfesor($datos);
	

 ?>