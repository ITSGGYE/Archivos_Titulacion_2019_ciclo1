<?php
session_start();
error_reporting(0);
$versession= $_SESSION['usuario'];

if ($versession == null || $versession='') {
	echo '<script type="text/javascript"> alert("Usted no inició sesión/ No tienes permiso"); window.location="index.php";  </script>';
	die();
}

session_destroy();
header("location: index.php");
?>