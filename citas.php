
<?php session_start();
if(isset($_SESSION['usuario'])){
	require 'Interfaz/citas_vista.php';
}else{
	header('Location: login.php');
}
?>