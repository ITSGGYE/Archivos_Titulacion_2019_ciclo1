<?php 
	session_start();
	require '../conexion/conexion.php';

	/*conectar a la base de datos*/
	$db_conex= new conectar_bd();
	$conectando=$db_conex->conexion_bd();

	//Funcion que previene la inyeccion sql
	$usuario= $conectando->real_escape_string($_POST['usuario_nomb']);
	$clave= $conectando->real_escape_string($_POST['contra_usu']);

	date_default_timezone_set('America/Guayaquil');
	$fecha= date("Y-m-d H:i:s");

	$selec_usuario=mysqli_query($conectando, "SELECT  * FROM usuario WHERE  usu_unombre='$usuario'");

	$auxiliar=0;

	while ($fila=$selec_usuario->fetch_assoc()) {
		//Compara la variable $clave con el registro de la contraseña de la base de datos
		if (password_verify($clave, $fila['usu_contra'])) {
			$auxiliar++;		
		}
	} 
	
	if ($selec_usuario){
		if((mysqli_num_rows($selec_usuario) && $auxiliar)>0){   /*Obtiene el numero de filas*/
			$_SESSION['usuario']= $usuario;
			$ultima_sesion = "UPDATE usuario SET usu_ult_sesion='{$fecha}' WHERE usu_codigo =usu_codigo";
			$selec_usuario= $conectando->query($ultima_sesion);
			header("location: ../panel_control.php");
		} else{
			echo '<script type="text/javascript"> alert("Usuario y/o Contraseña Incorrecta"); window.location="../index.php";  </script>';
		}
	} else{
		echo ("Problemas en la Consulta: " .mysqli_error($conectando));
	}

	mysqli_close($conectando);
?>