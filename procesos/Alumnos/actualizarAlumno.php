<?php 

	require_once "../../clases/conexion.php";
	require_once "../../clases/Alumno.php";
	$obj= new alumno();

	$idimagen=$_POST['imagen2'];
	$datos=array();
					$datos[0]=$_POST['nombre2'];
					$datos[1]=$_POST['lugar2'];
					$datos[2]=$_POST['fecha2'];
					$datos[3]=$_POST['nacionalidad2'];
					$datos[4]=$_POST['repite2'];
					$datos[5]=$_POST['cedula2'];
					$datos[6]=$_POST['nescuela2'];
					$datos[7]=$_POST['lescuela2'];
					$datos[8]=$idimagen;
					$datos[9]=$_POST['npadre2'];
					$datos[10]=$_POST['opadre2'];
					$datos[11]=$_POST['nmadre2'];
					$datos[12]=$_POST['omadre2'];
					$datos[13]=$_POST['nrepre2'];
					$datos[14]=$_POST['crepre2'];
					$datos[15]=$_POST['drepre2'];
					$datos[16]=$_POST['trepre2'];
					$datos[17]=$_POST['rfrepre2'];
					$datos[18]=$_POST['id_alumno'];

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

 