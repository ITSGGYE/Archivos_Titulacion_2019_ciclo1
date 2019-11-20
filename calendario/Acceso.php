<?php
	session_start();

	if(isset($_SESSION['user_name'])){
		if($_SESSION['user_name']['Tipo_usuario'] != 'Usuario'){
			header('Location: ../Admin/');
		}		
		} else {
			header('Location: ../index.php');
		}
	
?>