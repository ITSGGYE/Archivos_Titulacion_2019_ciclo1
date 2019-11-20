<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Alumno.php";
	$obj= new alumno();

	$datos=array();
	
	$nombreImg=$_FILES['imagen']['name'];
	$rutaAlmacenamiento=$_FILES['imagen']['tmp_name'];
	$carpeta='../../Imagenes/PDF/';
	$rutaFinal=$carpeta.$nombreImg;

	$datosImg=array(
		$nombreImg,
		$rutaFinal
					);


		if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
				$idimagen=$obj->agregarDocumentoAlumno($datosImg);

				if($idimagen > 0){

					$datos[0]=$_POST['promocion'];
					$datos[1]=$_POST['promocion2'];
					$datos[2]=$_POST['promocion3'];
					$datos[3]=$_POST['planilla'];
					$datos[4]=$_POST['informe'];
					$datos[5]=$_POST['notas'];
					$datos[6]=$_POST['partida'];
					$datos[7]=$_POST['fotos'];
					
					$datos[8]=$_POST['carnet'];
					$datos[9]=$_POST['croquis'];
					$datos[10]=$_POST['cpadre'];
					$datos[11]=$_POST['cmadre'];
					$datos[12]=$_POST['calumno'];
					$datos[13]=$_POST['certificado1'];
					$datos[14]=$_POST['certificado2'];
					$datos[15]=$idimagen;
					$datos[16]=$_POST['alumno'];
					
					
					echo $obj->agregarDocumentos($datos);
				}else{
					echo 0;
				}
		}
	

