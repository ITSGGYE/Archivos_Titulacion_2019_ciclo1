<?php session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	$identificacion= filter_var(strtolower($_POST['identificacion']),FILTER_SANITIZE_STRING);
	$apellidos = $_POST['apellidos'];
	$nombre =  $_POST['nombres'];
	$sexo =  $_POST['sexo'];
		$fechaNacimiento =  $_POST['fechaNacimiento'];
	$npadre =  $_POST['npadre'];
    $nfechaNacimiento =  $_POST['nfechaNacimiento'];
    $nsexo =  $_POST['nsexo'];
    $direccion =  $_POST['direccion'];
    $telefono =  $_POST['telefono'];
    $trabajo =  $_POST['trabajo'];
    $cargo =  $_POST['cargo'];
    $anpadre =  $_POST['anpadre'];
       $anfechaNacimiento =  $_POST['anfechaNacimiento'];
    $ansexo =  $_POST['ansexo'];
    $adireccion =  $_POST['adireccion'];
    $atelefono =  $_POST['atelefono'];
    $atrabajo =  $_POST['atrabajo'];
    $acargo =  $_POST['acargo'];
    $escuela =  $_POST['escuela'];
    $descripcion =  $_POST['descripcion'];
    $habitos =  $_POST['habitos'];
     $nivel =  $_POST['nivel'];
      $profesor =  $_POST['profesor'];
       $academico =  $_POST['academico'];
	$mensaje='';
	if(empty($nombre) or empty($apellidos)  or empty($identificacion)){
		$mensaje.= 'Por favor rellena todos los datos correctamente'."<br />";
	}
	else{	
		try{
			$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
		}catch(PDOException $e){
			echo "Error: ". $e->getMessage();
			die();
		}

		$statement = $conexion -> prepare(
			'SELECT * FROM pacientes WHERE idPaciente = :id LIMIT 1');
		$statement ->execute(array(':id'=>$identificacion));
		$resultado= $statement->fetch();

		if($resultado != false){
			$mensaje .='Ya existe un paciente con esa identificación </br>';
		}
	}
	if($mensaje==''){
		$statement = $conexion->prepare(
		'INSERT INTO pacientes (idPaciente,pacIdentificacion,pacNombre,pacApellidos,pacFechaNacimiento,pacSexo,npadre,nfechaNacimiento,nsexo,direccion,telefono,trabajo,cargo,anpadre,anfechaNacimiento,ansexo,adireccion,atelefono,atrabajo,acargo,escuela,descripcion,habitos,nivel,profesor,academico)
		values(null,:id,:nombres,:apellidos,:fechaNacimiento,:sexo,:npadre,:nfechaNacimiento,:nsexo,:direccion,:telefono,:trabajo,:cargo,:anpadre,:anfechaNacimiento,:ansexo,:adireccion,:atelefono,:atrabajo,:acargo,:escuela,:descripcion,:habitos,:nivel,:profesor,:academico)');

		$statement ->execute(array(
		':id'=>$identificacion,
		':nombres'=> $nombre,
		':apellidos'=>$apellidos,
		':fechaNacimiento'=>$fechaNacimiento,
		':sexo'=>$sexo,
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
 