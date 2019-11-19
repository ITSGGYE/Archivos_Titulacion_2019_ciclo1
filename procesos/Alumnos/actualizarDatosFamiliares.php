<?php 

	require_once "../../clases/conexion.php";
	require_once "../../clases/Alumno.php";
	$obj= new alumno();

		$datos=array();
					$datos[0]=$_POST['alumno2'];
					$datos[1]=$_POST['npadre2'];
					$datos[2]=$_POST['cedulap2'];
					$datos[3]=$_POST['fechap2'];
					$datos[4]=$_POST['nacionalidadp2'];
					$datos[5]=$_POST['estadop2'];
					$datos[6]=$_POST['emailp2'];
					$datos[7]=$_POST['nivelp2'];
					$datos[8]=$_POST['ocupacionp2'];
					$datos[9]=$_POST['vivep2'];
					$datos[10]=$_POST['autorizop2'];
					$datos[11]=$_POST['celularp2'];
					$datos[12]=$_POST['nmadre2'];
					$datos[13]=$_POST['cedulam2'];
					$datos[14]=$_POST['fecham2'];
					$datos[15]=$_POST['nacionalidadm2'];
					$datos[16]=$_POST['estadom2'];
					$datos[17]=$_POST['emailm2'];
					$datos[18]=$_POST['nivelm2'];
					$datos[19]=$_POST['ocupacionm2'];
					$datos[20]=$_POST['vivem2'];
					$datos[21]=$_POST['autorizom2'];
					$datos[22]=$_POST['celularm2'];
					$datos[23]=$_POST['id'];
					
								
	
	echo $obj->actualizarDatosFamiliares($datos);
	

 ?>

 