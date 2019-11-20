<?php
session_start();
	require_once 'connect.php';
	if(ISSET($_POST['edit_admin'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$before_edit = $conn->query("SELECT * FROM db_ls.admin WHERE username = '$username'");
		$result = mysqli_fetch_array($before_edit);

			$stado = $conn->query("UPDATE `admin` SET `username` = '$username', `password` = '$password', `firstname` = '$firstname', `middlename` = '$middlename', `lastname` = '$lastname' WHERE `admin_id` = '$_REQUEST[admin_id]'") or die(mysqli_error());
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
				$description = "EL ADMINISTRADOR ".$nombre_admin." ACTUALIZO EL REGISTRO CON EL ID # ".$result['admin_id']." LOS ANTERIORES DATOS ERAN "."NOMBRE DE USUARIO-> ".$result['username']." PRIMER NOMBRE -> ".$result['firstname']." SEGUNDO NOMBRE-> ".$result['middlename']." APELLIDOS-> ".$result['lastname']." OCURRIO EL DIA ".date('Y-m-d')."A LA HORA: ".date("H:i:s").
				" FUERON REEMPLAZADOS CON LOS SIGUIENTES DATOS"." "."NOMBRE DE USUARIO-> ".$username." PRIMER NOMBRE -> ".$firstname." SEGUNDO NOMBRE-> ".$middlename." APELLIDOS-> ".$lastname;
				$conn->query("INSERT INTO `auditoria` (cod_auditoria,action,description) VALUES ('$cod_auditoria','$action','$description')");
		}
			echo '
				<script type = "text/javascript">
					alert("Guardar Cambios");
					window.location = "admin.php";
				</script>
			';
		}
	
