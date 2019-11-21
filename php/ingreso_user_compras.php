<?php


function ingreso_compras($usuario,$clave){
include('conexion.php');
$conexion=conexion();
$ing_user=mysqli_real_escape_string($conexion,$usuario);
$ing_pass=mysqli_real_escape_string($conexion,$clave);


$consulta="SELECT usu_cedula,CAST(AES_DECRYPT(usu_password,'llave') AS CHAR) AS content, usu_usuario,usu_nombre FROM usuario where usu_cedula='$ing_user' and CAST(AES_DECRYPT(usu_password, 'llave') AS CHAR)='$ing_pass'";

//echo $consulta;


$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);
$fila_user=mysqli_fetch_row($resultado);



if($filas>0){
	$_SESSION['cedula']=$usuario;
	$_SESSION['usuario_final']=$fila_user[3];
	$_SESSION['ultimoAcceso']= date('Y-n-j H:i:s'); 
	return($_SESSION['usuario_final']);
	
}
else
{
	return('0');
}
mysqli_free_result($resultado);
desconexion($conexion);

}
?>