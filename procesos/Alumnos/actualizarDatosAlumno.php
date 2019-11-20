<?php 

	require_once "../../clases/conexion.php";
	require_once "../../clases/Alumno.php";
	$obj= new alumno();

	$idimagen=$_POST['imagen'];
	$datos=array();
	$datos2=array();
	$datos3=array();

					
					$datos[0]=$_POST['apellido'];
					$datos[1]=$_POST['nombre'];
					
					$datos[2]=$_POST['direccion'];
					$datos[3]=$_POST['expreso'];
					$datos[4]=$_POST['emergencia'];
					$datos[5]=$_POST['telefono1'];
					$datos[6]=$_POST['parroquia'];
					$datos[7]=$_POST['telefono2'];
					$datos[8]=$_POST['talumno'];
					$datos[9]=$idimagen;
					
					$datos[10]=$_POST['observacion'];
					$datos[11]=1;
					$datos[12]=$_POST['cedula'];

					$datos2[0]=$_POST['npadre'];
					$datos2[1]=$_POST['cpadre'];
					$datos2[2]=$_POST['nivelp'];
					$datos2[3]=$_POST['estadop'];
					$datos2[4]=$_POST['ocupacionp'];
					$datos2[5]=$_POST['empresap'];
					$datos2[6]=$_POST['nmadre'];
					$datos2[7]=$_POST['cmadre'];
					$datos2[8]=$_POST['nivelm'];
					$datos2[9]=$_POST['estadom'];
					$datos2[10]=$_POST['ocupacionm'];
					$datos2[11]=$_POST['empresam'];
					$datos2[12]=$_POST['email'];
					$datos2[13]=$_POST['separados'];
					$datos2[14]=$_POST['conyugue'];
					$datos2[15]=$_POST['representante'];
					$datos2[16]=$_POST['cedularepre'];
					$datos2[17]=$_POST['relacionf'];
					$datos2[18]=$_POST['autorizo'];
					$datos2[19]=$_POST['idrepre'];

					$datos3[0]=$_POST['nplantel'];
					$datos3[1]=$_POST['tplantel'];
					$datos3[2]=$_POST['comportamiento'];
					$datos3[3]=$_POST['promedio'];
					$datos3[4]=$_POST['escala'];
					$datos3[5]=$_POST['examen'];
					$datos3[6]=$_POST['cedula'];







	/*if($_FILES["imagennueva"]["name"] != '')
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
	} else {*/

echo $obj->actualizarDatosAlumno($datos);
	
echo $obj->actualizarDatosRepresentante($datos2);
echo $obj->actualizarOtrosDatos($datos3);

	
	
	
	

 ?>

 