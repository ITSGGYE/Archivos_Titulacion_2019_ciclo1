<?php 

	require_once "../../clases/conexion.php";
	require_once "../../clases/Documento.php";
	$obj= new documento();

	$idimagen=$_POST['imagen'];
	$idimagen2=$_POST['imagen2'];
	$idimagen3=$_POST['imagen3'];
	$idimagen4=$_POST['imagen4'];
	$idimagen5=$_POST['imagen5'];
	
	
	$datos=array();
					$datos[0]=$idimagen;
					$datos[1]=$idimagen2;
					$datos[2]=$idimagen3;
					$datos[3]=$idimagen4;
					$datos[4]=$idimagen5;
					$datos[5]=$_POST['id'];

	if($_FILES["imagennueva"]["name"] != '')
		{
			$nombreImg=$_FILES['imagennueva']['name'];
			$rutaAlmacenamiento=$_FILES['imagennueva']['tmp_name'];
			$carpeta='../../Imagenes/PDF/';
			$rutaFinal=$carpeta.$nombreImg;
			
			$datosImg=array($idimagen,
			$nombreImg,
			$rutaFinal
					);
			if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
				$udpateimg=$obj->actualizarDocAlumno($datosImg);
		}
	}

	if($_FILES["imagennueva2"]["name"] != '')
		{
			$nombreImg=$_FILES['imagennueva2']['name'];
			$rutaAlmacenamiento=$_FILES['imagennueva2']['tmp_name'];
			$carpeta='../../Imagenes/PDF/';
			$rutaFinal=$carpeta.$nombreImg;
			
			$datosImg=array($idimagen2,
			$nombreImg,
			$rutaFinal
					);
			if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
				$udpateimg=$obj->actualizarDocAlumno2($datosImg);
		}
	}
	
		if($_FILES["imagennueva3"]["name"] != '')
		{
			$nombreImg=$_FILES['imagennueva3']['name'];
			$rutaAlmacenamiento=$_FILES['imagennueva3']['tmp_name'];
			$carpeta='../../Imagenes/PDF/';
			$rutaFinal=$carpeta.$nombreImg;
			
			$datosImg=array($idimagen3,
			$nombreImg,
			$rutaFinal
					);
			if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
				$udpateimg=$obj->actualizarDocAlumno3($datosImg);
		}
	}

		if($_FILES["imagennueva4"]["name"] != '')
		{
			$nombreImg=$_FILES['imagennueva4']['name'];
			$rutaAlmacenamiento=$_FILES['imagennueva4']['tmp_name'];
			$carpeta='../../Imagenes/PDF/';
			$rutaFinal=$carpeta.$nombreImg;
			
			$datosImg=array($idimagen4,
			$nombreImg,
			$rutaFinal
					);
			if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
				$udpateimg=$obj->actualizarDocAlumno4($datosImg);
		}
	}

		if($_FILES["imagennueva5"]["name"] != '')
		{
			$nombreImg=$_FILES['imagennueva5']['name'];
			$rutaAlmacenamiento=$_FILES['imagennueva5']['tmp_name'];
			$carpeta='../../Imagenes/PDF/';
			$rutaFinal=$carpeta.$nombreImg;
			
			$datosImg=array($idimagen5,
			$nombreImg,
			$rutaFinal
					);
			if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
				$udpateimg=$obj->actualizarDocAlumno5($datosImg);
		}
	}

	echo $obj->actualizarDocumentos2($datos);
	

 ?>
