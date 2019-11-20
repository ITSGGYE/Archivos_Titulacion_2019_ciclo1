<?php session_start();
if(isset($_SESSION['usuario'])){
	require 'Interfaz/contenido.php';
}else{
	header('Location: login.php');
}
?>