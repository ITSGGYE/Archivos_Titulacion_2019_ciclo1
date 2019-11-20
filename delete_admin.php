<?php
session_start();
	require_once 'connect.php';
	$id_admin = $_REQUEST['admin_id'];
	$query = $conn->query("SELECT firstname,lastname,username FROM db_ls.admin WHERE admin_id = $id_admin");
	$id = mysqli_fetch_array($query);
	$firstname = $id['firstname'];
	$lastname = $id['lastname'];
	$username = $id['username'];
	$result = $conn->query("DELETE FROM `admin` WHERE `admin_id` = '$_REQUEST[admin_id]'") or die(mysqli_error());
	if ($result) {
		$action = "ELIMINAR";
		$query = $conn->query("SELECT MAX(id)+1 AS COD FROM db_ls.auditoria");
		$cod = mysqli_fetch_array($query);
		$cod_auditoria = "DEL".$cod['COD'];
		date_default_timezone_set("America/Guayaquil");
		$id_admin = $_SESSION['admin_id'];
		$query = $conn->query("SELECT firstname,lastname FROM db_ls.admin WHERE admin_id = $id_admin");
		$id = mysqli_fetch_array($query);
		$nombre_admin = $id['firstname']." ".$id['lastname'];
		$description = "EL ADMINISTRADOR ".$nombre_admin." ELIMINO A ".$firstname." ".$lastname." EL DIA ".date('Y-m-d')." TENIA EL NOMBRE DE USUARIO -> ".$username;
		$conn->query("INSERT INTO `auditoria` (cod_auditoria,action,description) VALUES ('$cod_auditoria','$action','$description')");
	}
	header('location: admin.php');
