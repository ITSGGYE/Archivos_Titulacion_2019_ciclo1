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
	    $usuario= limpiarDatos($_POST['usuario']);
		$password = limpiarDatos($_POST['password']);
		$password2 = limpiarDatos($_POST['password2']);
		$nombres = limpiarDatos($_POST['nombres']);
		$apellidos = limpiarDatos($_POST['apellidos']);
		$roll = limpiarDatos($_POST['roll']);
	$password = hash('sha512',$password);
		$password2 = hash('sha512',$password2);
		$statement = $conexion->prepare(
		"UPDATE usuarios
        SET usuario =:usuario,
		pass =:pass, 
		nombres =:nombres,
		apellidos =:apellidos,
		Roll=:roll
		WHERE id=:id");

	$statement-> execute(array(
			':usuario' => $usuario,
			':pass'=> $password2,
            ':nombres'=> $nombres,
            ':apellidos'=> $apellidos,
            ':roll'=> $roll,
            ':id'=> $id
        ));
 header('Location: usuarios.php');
	}else{
		$id_usuario = id_numeros($_GET['id']);
		if(empty($id_usuario)){
			header('Location: usuarios.php');
		}
		$user = obtenerUser_id($conexion,$id_usuario);
		
		if(!$user){
			header('Location: usuarios.php');
		}
		$user =$user[0];
	}
	require 'Interfaz/actualizarusuario.php';
?>