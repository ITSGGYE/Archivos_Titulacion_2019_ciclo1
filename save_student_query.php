<?php
session_start();
	require_once 'connect.php';
	//recibir los datos y almacenarlos en variables
	if(ISSET($_POST['save_student'])){
		$student_no = $_POST['student_no'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$course = $_POST['course'];
		$section = $_POST['section'];
		$jornada = $_POST['jornada'];

// Consulta para insertar
$verificar_student = mysqli_query( $conn, "SELECT * FROM `student` WHERE `student_no` = '$student_no'");

if(mysqli_num_rows ($verificar_student) > 0){
			echo '
				<script type = "text/javascript">
					alert("EL ID del estudiante ya existe");
					window.location = "student.php";
				</script>
			';
		}else{
			$insertar = "INSERT INTO student (student_no, firstname, middlename, lastname , course, section,jornada)VALUES('$student_no', '$firstname', '$middlename', '$lastname', '$course', '$section','$jornada')";
			      $resultado= mysqli_query ($conn, $insertar);

if ($resultado){

		$action = "AGREGAR";
		$query = $conn->query("SELECT MAX(id)+1 AS COD FROM db_ls.auditoria");
		$cod = mysqli_fetch_array($query);
		$cod_auditoria = "INS".$cod['COD'];
		$id_admin = $_SESSION['admin_id'];
		$query = $conn->query("SELECT firstname,lastname FROM db_ls.admin WHERE admin_id = $id_admin");
		$id = mysqli_fetch_array($query);
		$nombre_admin = $id['firstname']." ".$id['lastname'];
		date_default_timezone_set("America/Guayaquil");
		$description = "EL ADMINISTRADOR ".$nombre_admin." AGREGO A UN NUEVO ESTUDIANTE CON LOS SIGUIENTES DATOS, NOMBRE->  ".$firstname." ".$middlename." ".$lastname." CURSO->  ".$course." SECCION->  ".$section." JORNADA-> ".$jornada." EN LA FECHA DE ".date('Y-m-d')."A LA HORA: ".date("H:i:s")." CODIGO DEL ESTUDIANTE:"." ".$student_no;
		$conn->query("INSERT INTO `auditoria` (cod_auditoria,action,description) VALUES ('$cod_auditoria','$action','$description')");
	echo '
		<script type = "text/javascript">
			alert("Usuario registrado exitosamente");
			window.location = "student.php";
		</script>
	';
}
		else{
			echo "<script>
			alert('ERROR INTENTE NUEVAMENTE');

			</script>";
		}

		}
	}
