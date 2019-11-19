<?php 

	require_once "../../clases/conexion.php";
	require_once "../../clases/Alumno.php";
	$obj= new alumno();

		$datos=array();
					$datos[0]=$_POST['alumno2'];
					$datos[1]=$_POST['nombrer2'];
					$datos[2]=$_POST['cedular2'];
					$datos[3]=$_POST['fechar2'];
					$datos[4]=$_POST['nacionalidadr2'];
					$datos[5]=$_POST['estador2'];
					$datos[6]=$_POST['emailr2'];
					$datos[7]=$_POST['nivelr2'];
					$datos[8]=$_POST['ocupacionr2'];
					$datos[9]=$_POST['viver2'];
					$datos[10]=$_POST['autorizor2'];
					$datos[11]=$_POST['celularr2'];
					$datos[12]=$_POST['relacionr2'];
					$datos[13]=$_POST['id'];
					
								
	
	echo $obj->actualizarDatosRepresentante($datos);
	

 ?>

 