<?php session_start();
if(isset($_SESSION['usuario'])){
	require 'Interfaz/historial_menu.php';
}else{
	header('Location: login.php');
}
?>