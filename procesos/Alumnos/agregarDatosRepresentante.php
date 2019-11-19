<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Alumno.php";
	$obj= new alumno();

	$datos=array();
					$datos[0]=$_POST['alumno'];
					$datos[1]=$_POST['nombrer'];
					$datos[2]=$_POST['cedular'];
					$datos[3]=$_POST['fechar'];
					$datos[4]=$_POST['nacionalidadr'];
					$datos[5]=$_POST['estador'];
					$datos[6]=$_POST['emailr'];
					$datos[7]=$_POST['nivelr'];
					$datos[8]=$_POST['ocupacionr'];
					$datos[9]=$_POST['viver'];
					$datos[10]=$_POST['autorizor'];
					$datos[11]=$_POST['celularr'];
					$datos[12]=$_POST['relacionr'];
					echo $obj->agregarDatosRepresentante($datos);
				
	

 ?>