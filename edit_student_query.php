<?php
	require_once 'connect.php';
	if(ISSET($_POST['edit_student'])){
		$student_no = $_POST['student_no'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$course = $_POST['course'];
		$section = $_POST['section'];
		$jornada = $_POST['Jornada'];
		$before_edit = $conn->query("SELECT * FROM db_ls.student WHERE student_no = '$student_no'");
		$result = mysqli_fetch_array($before_edit);

			$stado = $conn->query("UPDATE `student` SET  `firstname` = '$firstname', `middlename` = '$middlename', `lastname` = '$lastname', `course` = '$course', `section` = '$section', `jornada` = '$jornada' WHERE `student_id` = '$_REQUEST[student_id]'") or die(mysqli_error($conn));
			if ($stado) {
				$action = "ACTUALIZAR";
					$query = $conn->query("SELECT MAX(id)+1 AS COD FROM db_ls.auditoria");
					$cod = mysqli_fetch_array($query);
					$cod_auditoria = "UPT".$cod['COD'];
					$id_admin = $_SESSION['admin_id'];
					$query = $conn->query("SELECT firstname,lastname FROM db_ls.admin WHERE admin_id = $id_admin");
					$id = mysqli_fetch_array($query);
					$nombre_admin = $id['firstname']." ".$id['lastname'];
					date_default_timezone_set("America/Guayaquil");
					$description = "EL ADMINISTRADOR ".$nombre_admin." ACTUALIZO EL REGISTRO CON EL ID # ".$result['student_id']." LA CEDULA DEL ESTUDIANTE ES ".$student_no." PRIMER NOMBRE -> ".$result['firstname']." SEGUNDO NOMBRE-> ".$result['middlename']." APELLIDOS-> ".$result['lastname']."CURSO: ".$course."SECCION: ".$section." JORNADA:".$jornada." OCURRIO EL DIA ".date('Y-m-d')."A LA HORA: ".date("H:i:s").
					" FUERON REEMPLAZADOS CON LOS SIGUIENTES DATOS"." "."CEDULA: ".$student_no." PRIMER NOMBRE -> ".$firstname." SEGUNDO NOMBRE-> ".$middlename." APELLIDOS-> ".$lastname." CURSO: ".$course." SECCION ".$section." JORNADA: ".$jornada;
					$conn->query("INSERT INTO `auditoria` (cod_auditoria,action,description) VALUES ('$cod_auditoria','$action','$description')");
			}
			echo'
				<script type = "text/javascript">
					alert("Guardar Cambios");
					window.location = "student.php";
				</script>
			';

	}
