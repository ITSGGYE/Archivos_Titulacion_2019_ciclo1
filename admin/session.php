<?php
session_start();
	if (!isset($_SESSION['id'])) {
		echo "<script>alert('Inicia Sesión Primero')</script>";
		echo "<script>window.location = 'index.php';</script>";
	}
?>
