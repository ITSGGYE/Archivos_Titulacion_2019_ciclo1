<?php 
  session_start(); 
  error_reporting(0);
  $versession= $_SESSION['usuario'];

  if ($versession == null || $versession='') {
  	echo '<script type="text/javascript"> alert("Usted no inició sesión/ No tienes permiso"); window.location="index.php";  </script>';
    die();
  } 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilos/estructuras.css">
	<link rel="stylesheet" type="text/css" href="estilos/tablas.css">
  	<link rel="stylesheet" type="text/css" href="estilos/formulario.css">

	<title>Actualizar datos::</title>
</head>
<body>
	<?php 
    	include_once("estructura_inventario/encabezado.php");
    	include_once("estructura_inventario/menu.php");
  	?>
  	<section id="cont_principal">
    	<article>
  			<h1>Datos de Usuario</h1>
  			<div class="tablas">
        		<table border="5" cellpadding="5" cellspacing="20" align="center">
					<form action="configuracion_usuario.php" method="post" class="form">
						<tr>
							<td class="td"><label>Nombre:</label></td>
							<td class="td"><input type="text"  placeholder=" Nombre de Usuario" name="nombre_usuario"  required></td>
						</tr>
						<tr>
							<td class="td"><label>Contraseña:</label></td>
							<td class="td"><input type="password"  placeholder=" Contraseña" name="contra"  required></td>
						</tr>
						<tr>
							<td class="td"><label>Contraseña de Verificación:</label></td>
							<td class="td"><input type="password"  placeholder=" Repita su contraseña" name="contra_verific"  required></td>
						</tr>
						<td colspan="2"><button type="submit" name="actualizacion_contra" id="boton">Actualizar contraseña</button></td>
					</form>
				</table>
			</div>
		</article>
	</section>

	<?php 
		require_once ("conexion/conexion.php");
		$db_conex= new conectar_bd();
		$conectando=$db_conex->conexion_bd();
		//$clave_cifrada= password_hash($clave, PASSWORD_DEFAULT);


		if(isset($_POST['actualizacion_contra'])){
			if($_POST['nombre_usuario']=='' || ($_POST['contra'] =='' or $_POST['contra_verific'] =='')){
				echo "Debes llenar todos los campos por favor";
			} else{
				$tb_usuarios = "SELECT * FROM usuario";
				$respuesta = mysqli_query($conectando,$tb_usuarios);
				$verificar = 0;

				while ($resultado = mysqli_fetch_object($respuesta)){
					if($resultado->usu_unombre == $_POST['nombre_usuario']){
						$verificar = 1;
					}
				}

				if ($verificar == 0){
					if ($_POST['contra']== $_POST['contra_verific']) {
						$usuario = $conectando-> real_escape_string($_POST['nombre_usuario']);
						$contra_verif = $conectando->real_escape_string($_POST['contra_verific']);
					
						$contra_hash = password_hash($contra_verif, PASSWORD_DEFAULT);/*$pw_en: se incripta la contraseña*/
					
						$actualizar= "UPDATE usuario SET usu_unombre='$usuario', usu_contra='$contra_hash'";
						$respuesta= mysqli_query($conectando, $actualizar);

						echo '<script type="text/javascript"> alert("Contraseña y datos actualizados con éxito"); window.location="index.php";
						</script>';
						session_destroy();
						} else{ /*CASO CONTRARIO CON MENSAJE DE NO COINCIDEN LA CONTRASEÑA*/
							echo '<script type="text/javascript"> alert("La contraseña no coinciden"); window.location="configuracion_usuario.php";</script>';
						}
					} else{
						echo '<script type="text/javascript"> alert("El nombre de usuario ya esta en nuestra base de datos, Por favor comprueba con otro..."); window.location="configuracion_usuario.php";</script>';
					}
				}
			}
?>
</body>
</html>