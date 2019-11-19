<?php
session_start();
	if (!isset($_SESSION['id_customer'])) {
		echo "<script>alert('Inicia Sesión Primero')</script>";
		echo "<script>window.location = 'index.php';</script>";
	}
?>
