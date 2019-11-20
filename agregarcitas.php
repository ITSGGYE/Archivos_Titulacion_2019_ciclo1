<?php session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
 
	 $fecha = $_POST['fecha'];
	 $hora = $_POST['hora'].":00";
	 $paciente =  $_POST['paciente'];
	 $medico =  $_POST['medico'];
	 $estado =  $_POST['estado'];
	 $observaciones =  $_POST['observaciones'];
	$mensaje='';
 
	if(empty($fecha) or empty($hora)   or empty($paciente) or empty($estado)or empty($medico)){
		$mensaje.= 'Por favor rellena todos los datos correctamente'."<br/>";
	}
	else{	
		try{
			$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
		}catch(PDOException $e){
			echo "Error: ". $e->getMessage();
			die();
		}
	 
}
	if($mensaje==''){
		$stmt = $conexion->prepare("SELECT * FROM citas WHERE cithora = :_hora AND citMedico = :_CEDULA");
		$stmt->bindParam(':_hora',$hora,PDO::PARAM_STR);
		$stmt->bindParam(':_CEDULA',$medico,PDO::PARAM_STR);
		$stmt->execute();
		$fetch = $stmt->fetch();
		if ($fetch['cithora'] == $hora) {
			echo "<script>alert('ESCOGE OTRA HORA');
			window.location = 'citas.php';</script>";
		} else {
					$statement = $conexion->prepare(
		"INSERT INTO citas (idcita,citfecha,cithora,citPaciente,citMedico,citestado,citobservaciones)
		values('',:fecha,:hora,:paciente,:medico,:estado,:observaciones)");
      
		$statement ->execute(array(
		 
		':fecha'=>$fecha,
		':hora'=>$hora,
		':paciente'=>$paciente,
		':medico'=>$medico,
		':estado'=>$estado,
		':observaciones'=>$observaciones
		));
		echo "<script>alert('REGISTRADA CON EXITO');
			window.location = 'citas.php';</script>";
		}
		
	}	
}
require 'Interfaz/agregarcitas_vista.php';
?>