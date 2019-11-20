<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Alumno.php";
	$obj= new Alumno();

	$datos=array();
	$datos4=array();
	$datos2=array();
	$datos3=array();
	
	//$cedulaalumno=$_POST['cedula'];
	$nombreImg=$_FILES['imagen']['name'];
	$rutaAlmacenamiento=$_FILES['imagen']['tmp_name'];
	$carpeta='../../Imagenes/Alumno/';
	$rutaFinal=$carpeta.$nombreImg;

	$datosImg=array(
		$nombreImg,
		$rutaFinal
					);

		if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
				$idimagen=$obj->agregaImagenDatosAlumno($datosImg);

				if($idimagen > 0){

					$datos[0]=$_POST['cedula'];
					$datos[1]=$_POST['apellido'];
					$datos[2]=$_POST['nombre'];
					$datos[3]=$_POST['genero'];
					$datos[4]=$_POST['etnia'];
					$datos[5]=$_POST['lugar'];
					$datos[6]=$_POST['fecha'];
					$datos[7]=$_POST['nacionalidad'];
					$datos[8]=$_POST['direccion'];
					$datos[9]=$_POST['expreso'];
					$datos[10]=$_POST['emergencia'];
					$datos[11]=$_POST['telefono1'];
					$datos[12]=$_POST['parroquia'];
					$datos[13]=$_POST['telefono2'];
					$datos[14]=$_POST['talumno'];
					$datos[15]=$idimagen;
					$datos[16]=$_POST['estado'];
					$datos[17]=$_POST['observacion'];

					$datos4[0]=$_POST['cedula'];
					$datos4[1]=$_POST['curso'];
					$datos4[2]=$_POST['anio'];
					$datos4[3]=$_POST['estado2'];
					
					
					
					/*****datos para la segunda tabla/*///
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
					$datos2[19]=$_POST['cedula'];


					/****/
					$datos3[0]=$_POST['nplantel'];
					$datos3[1]=$_POST['tplantel'];
					$datos3[2]=$_POST['comportamiento'];
					$datos3[3]=$_POST['promedio'];
					$datos3[4]=$_POST['escala'];
					$datos3[5]=$_POST['examen'];
					$datos3[6]=$_POST['cedula'];
					echo $obj->agregarDatosAlumno($datos);
					echo $obj->agregarAlumnoCurso2($datos4);
					echo $obj->agregarDatosRepresentante($datos2);
					echo $obj->agregarOtrosDatos($datos3);
					

				}else{
					echo 0;
				}
		}
	

 ?>