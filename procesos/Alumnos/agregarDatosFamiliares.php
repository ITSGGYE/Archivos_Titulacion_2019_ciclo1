<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Alumno.php";
	$obj= new alumno();

	$repre=$_POST['representante'];
	$datos=array();
					$datos[0]=$_POST['alumno'];
					$datos[1]=$_POST['npadre'];
					$datos[2]=$_POST['cedulap'];
					$datos[3]=$_POST['fechap'];
					$datos[4]=$_POST['nacionalidadp'];
					$datos[5]=$_POST['estadop'];
					$datos[6]=$_POST['emailp'];
					$datos[7]=$_POST['nivelp'];
					$datos[8]=$_POST['ocupacionp'];
					$datos[9]=$_POST['vivep'];
					$datos[10]=$_POST['autorizop'];
					$datos[11]=$_POST['celularp'];
					$datos[12]=$_POST['nmadre'];
					$datos[13]=$_POST['cedulam'];
					$datos[14]=$_POST['fecham'];
					$datos[15]=$_POST['nacionalidadm'];
					$datos[16]=$_POST['estadom'];
					$datos[17]=$_POST['emailm'];
					$datos[18]=$_POST['nivelm'];
					$datos[19]=$_POST['ocupacionm'];
					$datos[20]=$_POST['vivem'];
					$datos[21]=$_POST['autorizom'];
					$datos[22]=$_POST['celularm'];

	$datos2=array();
					$datos2[0]=$_POST['alumno'];
					$datos2[1]=$_POST['npadre'];
					$datos2[2]=$_POST['cedulap'];
					$datos2[3]=$_POST['fechap'];
					$datos2[4]=$_POST['nacionalidadp'];
					$datos2[5]=$_POST['estadop'];
					$datos2[6]=$_POST['emailp'];
					$datos2[7]=$_POST['nivelp'];
					$datos2[8]=$_POST['ocupacionp'];
					$datos2[9]=$_POST['vivep'];
					$datos2[10]=$_POST['autorizop'];
					$datos2[11]=$_POST['celularp'];
					$datos2[12]=1;
	$datos3=array();
					$datos3[0]=$_POST['alumno'];
					$datos3[1]=$_POST['nmadre'];
					$datos3[2]=$_POST['cedulam'];
					$datos3[3]=$_POST['fecham'];
					$datos3[4]=$_POST['nacionalidadm'];
					$datos3[5]=$_POST['estadom'];
					$datos3[6]=$_POST['emailm'];
					$datos3[7]=$_POST['nivelm'];
					$datos3[8]=$_POST['ocupacionm'];
					$datos3[9]=$_POST['vivem'];
					$datos3[10]=$_POST['autorizom'];
					$datos3[11]=$_POST['celularm'];
					$datos3[12]=2;
					

switch ($repre) {
	case '1': {
	echo $obj->agregarDatosRepresentante($datos2);
	echo $obj->agregarDatosFamiliares($datos);
	}
		# code...
		break;
	case '2': {
	
		echo $obj->agregarDatosRepresentante($datos3);
		echo $obj->agregarDatosFamiliares($datos);
	}
		# code...
		break;
	case '3': {
	
		
		echo $obj->agregarDatosFamiliares($datos);
	}
		# code...
		break;

	
	default:
		# code...
		break;
}

	
		
		
								
		
					
				
				
	

 ?>