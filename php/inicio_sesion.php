<?php
session_start();
function usuario_adm(){

$varsesion=$_SESSION['usuario_mto'];

//echo "<br>usuario que ingreso es:".$varsesion;

if($varsesion==NULL || $varsesion=''){
		include('cerrar_sesion.php');
		echo "<html><head><script language='JavaScript'>
  		function cargar(){
			alert('No tiene autorizacion para revisar esta pagina')
        if(typeof(parent) != 'undefined'){
            parent.window.location.href='./index.html'
        }else{
            window.location.href='./index.html'
        }}
    </script></head>
	<body onload='javascript:cargar()'></body></html>";
	die();
	}
else
{
		//echo "Sesion Correcta".$varsesion;
	return(1);
	}
}

function sesion_adm($usuario,$password){


include("conexion.php");

$conexion=conexion();
$consulta="SELECT id_ingreso,CAST(AES_DECRYPT(pass_ingreso,'clip23er') AS CHAR) AS content, user_ingreso FROM ingreso_adm where user_ingreso='$usuario' and CAST(AES_DECRYPT(pass_ingreso, 'clip23er') AS CHAR)='$password'";

//echo $consulta;


$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);


if($filas>0){
	//echo "ingreso";
	$_SESSION['usuario_mto']=$usuario;
	return(1);
	
	}
else
{
	//echo "no ingreso";
	return(0);

}
mysqli_free_result($resultado);
desconexion($conexion);

	
}

?>