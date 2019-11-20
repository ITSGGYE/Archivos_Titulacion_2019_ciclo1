<?php session_start();
if(isset($_SESSION['usuario'])){
	require 'Interfaz/medicos_vista.php';
}else{
	header('Location: login.php');
}
?>