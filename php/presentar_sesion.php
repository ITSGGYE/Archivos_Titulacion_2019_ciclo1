<?
session_start();
include("encripdecrip.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

				<?php 
				//
				if(isset($_SESSION['usuario_final'])){
				$x_user_con=$_SESSION['usuario_final'];
				$x_cedula=$encriptar($_SESSION['cedula']);
				//echo $x_user_con."<br>";
				echo "<div style='margin-top:5px; margin-left:140px;'><a href='actualizar_user.php?id=$x_cedula'>".$x_user_con."</a> / <a href='php/cerrar_sesion.php'>Cerrar Sesion</a></div>";
				}
				else
				{include("registro_user.php");
				}
				
?></div>
</body>
</html>