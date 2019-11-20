<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Documento.php";
	$obj= new documento();

	$datos=array();
	
	$nombreImg=$_FILES['imagen']['name'];
	$rutaAlmacenamiento=$_FILES['imagen']['tmp_name'];
	$carpeta='../../Imagenes/PDF/';
	$rutaFinal=$carpeta.$nombreImg;

	$nombreImg2=$_FILES['imagen2']['name'];
	$rutaAlmacenamiento2=$_FILES['imagen2']['tmp_name'];
	$carpeta2='../../Imagenes/PDF/';
	$rutaFinal2=$carpeta2.$nombreImg2;

	$nombreImg3=$_FILES['imagen3']['name'];
	$rutaAlmacenamiento3=$_FILES['imagen3']['tmp_name'];
	$carpeta3='../../Imagenes/PDF/';
	$rutaFinal3=$carpeta3.$nombreImg3;

	$nombreImg4=$_FILES['imagen4']['name'];
	$rutaAlmacenamiento4=$_FILES['imagen4']['tmp_name'];
	$carpeta4='../../Imagenes/PDF/';
	$rutaFinal4=$carpeta4.$nombreImg4;

	$nombreImg5=$_FILES['imagen5']['name'];
	$rutaAlmacenamiento5=$_FILES['imagen5']['tmp_name'];
	$carpeta5='../../Imagenes/PDF/';
	$rutaFinal5=$carpeta5.$nombreImg5;

	$datosImg=array(
		$nombreImg,
		$rutaFinal
					);

	$datosImg2=array(
		$nombreImg2,
		$rutaFinal2
					);

	$datosImg3=array(
		$nombreImg3,
		$rutaFinal3
					);

	$datosImg4=array(
		$nombreImg4,
		$rutaFinal4
					);

	$datosImg5=array(
		$nombreImg5,
		$rutaFinal5
					);


		if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
				$idimagen=$obj->agregarDocumentoAlumno($datosImg);

				if($idimagen > 0){
					
					$datos[0]=$idimagen;
				}
			}

		if(move_uploaded_file($rutaAlmacenamiento2, $rutaFinal2)){
				$idimagen2=$obj->agregarDocumentoAlumno2($datosImg2);

				if($idimagen2 > 0){
					
					$datos[1]=$idimagen2;
				}
			}

		if(move_uploaded_file($rutaAlmacenamiento3, $rutaFinal3)){
				$idimagen3=$obj->agregarDocumentoAlumno3($datosImg3);

				if($idimagen3 > 0){
					
					$datos[2]=$idimagen3;
				}
			}

		if(move_uploaded_file($rutaAlmacenamiento4, $rutaFinal4)){
				$idimagen4=$obj->agregarDocumentoAlumno4($datosImg4);

				if($idimagen4 > 0){
					
					$datos[3]=$idimagen4;
				}
			}
			
			if(move_uploaded_file($rutaAlmacenamiento5, $rutaFinal5)){
				$idimagen5=$obj->agregarDocumentoAlumno5($datosImg5);

				if($idimagen5 > 0){
					
					$datos[4]=$idimagen5;
				}
			}
			









					$datos[5]=$_POST['alumno'];
				
					
					echo $obj->agregarDocumentos2($datos);
				
	

