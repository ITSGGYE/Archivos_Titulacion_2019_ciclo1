<?php
session_start();
	require_once 'connect.php';
	if(ISSET($_POST['save_admin'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$result = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username'") or die(mysqli_error());
		$rows = mysqli_num_rows($result);
		if($rows == 1){
			echo '
				<script type = "text/javascript">
					alert("Nombre de usuario ya existe");
					window.location = "admin.php";
				</script>
			';
		}else{
			$result = $conn->query("INSERT INTO `admin` (username, password, firstname, middlename,lastname) VALUES('$username', '$password', '$firstname', '$middlename', '$lastname')")or die(mysqli_error($conn));
			if ($result) {
				$action = "AGREGAR";
				$query = $conn->query("SELECT MAX(id)+1 AS COD FROM db_ls.auditoria");
				$cod = mysqli_fetch_array($query);
				$cod_auditoria = "INS".$cod['COD'];
				$id_admin = $_SESSION['admin_id'];
				$query = $conn->query("SELECT firstname,lastname FROM db_ls.admin WHERE admin_id = $id_admin");
				$id = mysqli_fetch_array($query);
				$nombre_admin = $id['firstname']." ".$id['lastname'];
				date_default_timezone_set("America/Guayaquil");
				$description = "EL ADMINISTRADOR ".$nombre_admin." AGREGO A ".$firstname." ".$lastname." COMO ADMINISTRADOR EL DIA ".date('Y-m-d')."A LA HORA: ".date("H:i:s")." SE REGISTRO CON EL NOMBRE DE USUARIO ->"." ".$username;
				$conn->query("INSERT INTO `auditoria` (cod_auditoria,action,description) VALUES ('$cod_auditoria','$action','$description')");
			}
			echo '
				<script type = "text/javascript">
					alert("Datos guardados correctamente");
					window.location = "admin.php";
				</script>
			';
		}
	}
