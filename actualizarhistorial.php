<?php session_start();
	if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
	}	
	require 'modelo.php';
	
	try{
		$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
	}catch(PDOException $e){
		echo "ERROR: " . $e->getMessge();
		die();
	}
if($_SERVER['REQUEST_METHOD']=='POST'){
	$id = limpiarDatos($_POST['id']);
	$identificacion = limpiarDatos($_POST['identificacion']);
	$nombre = limpiarDatos($_POST['nombres']);
	$apellidos = limpiarDatos($_POST['apellidos']);
	$fecha = limpiarDatos($_POST['fechaNacimiento']);
	$sexo = limpiarDatos($_POST['sexo']);
		$npadre =  limpiarDatos($_POST['npadre']);
    $nfechaNacimiento =  limpiarDatos($_POST['nfechaNacimiento']);
    $nsexo = limpiarDatos($_POST['nsexo']);
    $direccion =  limpiarDatos($_POST['direccion']);
    $telefono =  limpiarDatos($_POST['telefono']);
    $trabajo =  limpiarDatos($_POST['trabajo']);
    $cargo =  limpiarDatos($_POST['cargo']);
    $anpadre =  limpiarDatos($_POST['anpadre']);
       $anfechaNacimiento =  limpiarDatos($_POST['anfechaNacimiento']);
    $ansexo =  limpiarDatos($_POST['ansexo']);
    $adireccion =  limpiarDatos($_POST['adireccion']);
    $atelefono =  limpiarDatos($_POST['atelefono']);
    $atrabajo =  limpiarDatos($_POST['atrabajo']);
    $acargo =  limpiarDatos($_POST['acargo']);
    $escuela =  limpiarDatos($_POST['escuela']);
    $descripcion =  limpiarDatos($_POST['descripcion']);
    $habitos =  limpiarDatos($_POST['habitos']);
     $nivel =  limpiarDatos($_POST['nivel']);
      $profesor =  limpiarDatos($_POST['profesor']);
       $academico =  limpiarDatos($_POST['academico']);
		$statement = $conexion->prepare(
		"UPDATE pacientes
        SET pacIdentificacion = :identificacion, 
		pacNombre =:nombres, 
		pacApellidos =:apellidos, 
		pacFechaNacimiento =:fecha, 
		pacSexo=:sexo,npadre=:npadre,
    nfechaNacimiento=:nfechaNacimiento,
    nsexo=:nsexo,
    direccion=:direccion,
    telefono=:telefono,
    trabajo=:trabajo,
    cargo=:cargo,
    anpadre=:anpadre,
    anfechaNacimiento=:anfechaNacimiento,
    ansexo=:ansexo,
    adireccion=:adireccion,
    atelefono=:atelefono,
    atrabajo=:atrabajo,
    acargo=:acargo,
    escuela=:escuela,
    descripcion=:descripcion,
    habitos=:habitos,
    nivel=:nivel,
    profesor=:profesor,
    academico=:academico
		WHERE idPaciente = :id");

		$statement ->execute(array(
        ':identificacion'=>$identificacion, 
		':nombres'=>$nombre, 
		':apellidos'=>$apellidos, 
		':fecha'=>$fecha, 
		':sexo'=>$sexo, 
        ':id'=>$id,  
	':npadre'=> $npadre,
    ':nfechaNacimiento'=> $nfechaNacimiento,
    ':nsexo'=> $nsexo,
    ':direccion'=> $direccion,
    ':telefono'=> $telefono,
    ':trabajo'=> $trabajo,
    ':cargo'=> $cargo,
    ':anpadre'=> $anpadre,
    ':anfechaNacimiento'=> $anfechaNacimiento,
    ':ansexo'=> $ansexo,
    ':adireccion'=> $adireccion,
    ':atelefono'=> $atelefono,
    ':atrabajo'=> $atrabajo,
    ':acargo'=> $acargo,
    ':escuela'=> $escuela,
    ':descripcion'=> $descripcion,
    ':habitos'=> $habitos,
    ':nivel'=> $nivel,
    ':profesor'=> $profesor,
    ':academico'=> $academico
        ));
        header('Location: historial.php');
	}else{
		$id_historial = id_numeros($_GET['idPaciente']);
		if(empty($id_historial)){
			header('Location: historial.php');
		}
  $historial = obtener_historial_id($conexion,$id_historial);
		if(!$historial){
			header('Location: historial.php');
		}
		$historial =$historial[0];
	}
	require 'Interfaz/actualizarhistorial_vista.php';
?>