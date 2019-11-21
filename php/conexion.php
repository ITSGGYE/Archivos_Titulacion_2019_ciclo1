<?php
define("KEY","langogye");
define("COD","AES128");

function conexion(){
//echo "ingre4so";

//$conexion=mysqli_connect('localhost','id11293168_root','clip23er','id11293168_langoquil');

$conexion=mysqli_connect('localhost','root','clip23er','id10196793_langoquil');

if(mysqli_connect_errno())

{
echo "Fallo conexion de MySQL: " . mysqli_connect_error();

//echo("mala conexion");
}

else

{



//echo "conexion correcta";
return($conexion);

}

}
function desconexion($conexion){
	$close = mysqli_close($conexion) 
        or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

    return $close;
	}


function enviomailhtml($para, $titulo, $mensaje, $cabeceras){
	mail($para, $titulo, $mensaje, $cabeceras);

}

function destruir_sesion(){
	
if (isset($_SESSION['cedula'])) {
   //sino, calculamos el tiempo transcurrido
   $fechaGuardada = $_SESSION['ultimoAcceso'];
   $ahora = date('Y-n-j H:i:s');
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));

    //comparamos el tiempo transcurrido
     if($tiempo_transcurrido >= 600) {
     //si pasaron 10 minutos o más
      session_destroy(); // destruyo la sesión
      echo "<script> window.location='index.html';</script>"; //envío al usuario a la pag. de autenticación
      //sino, actualizo la fecha de la sesión
    }else {
    $_SESSION['ultimoAcceso'] = $ahora;
   }
    } 
}
?>