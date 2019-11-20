<?php
session_start();
	$id_student= $_REQUEST['student_id'];
	require_once 'connect.php';
        $conn->query("SET FOREIGN_KEY_CHECKS=0");
        $stado = $conn->query("DELETE FROM `borrowing` WHERE `student_no` = '$_REQUEST[student_id]'");
       
	if ($stado) {
		$stado1 = $conn->query("DELETE FROM `student` WHERE `student_no` = '$_REQUEST[student_id]'");
	}

	if ($stado1) {
		$action = "ELIMINAR";
		$query = $conn->query("SELECT MAX(id)+1 AS COD FROM db_ls.auditoria");
		$cod = mysqli_fetch_array($query);
		$cod_auditoria = "DEL".$cod['COD'];
		date_default_timezone_set("America/Guayaquil");
		$id_admin = $_SESSION['admin_id'];
		$query = $conn->query("SELECT firstname,lastname FROM db_ls.admin WHERE admin_id = $id_admin");
		$id = mysqli_fetch_array($query);
		$nombre_admin = $id['firstname']." ".$id['lastname'];
		$description = "EL ADMINISTRADOR ".$nombre_admin." ELIMINO AL ESTUDIANTE CON EL ID # ".$student['student_id']." "." NOMBRES: ".$student['firstname']." ".$student['middlename']." ".$student['lastname']." CURSO: ".$student['course']." SECCION:".$student['section']." JORNADA: ".$student['jornada'].
		" EL DIA ".date('Y-m-d')."A LA HORA: ".date("H:i:s");
		$conn->query("INSERT INTO `auditoria` (cod_auditoria,action,description) VALUES ('$cod_auditoria','$action','$description')");
                $conn->query("SET FOREIGN_KEY_CHECKS=1");  
        }
	header('location: student.php');
