<?php session_start();
if(isset($_SESSION['usuario'])){
	require 'Interfaz/usuarios_vista.php';
}else{
	header('Location: login.php');
}
?>