<?php session_start();
if (isset($_SESSION['usuario'])){
	header('Location: ctterapias.php');
	$_SESSION['rol'];
}else{
	header('Location: login.php');
}	
?>