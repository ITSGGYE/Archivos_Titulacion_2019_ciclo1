<?php  

session_start();

require 'Conexion/config.php';
require 'Conexion/functions.php';

//comprobamos la sesion
if (isset($_SESSION['usuario'])) {//si hay un valor dentro de variable usuario entonces
    //validamos los datos por privilegio
$conexion = conexion($bd_config);
$usuario = iniciarSession('usuariosig', $conexion);//

if($usuario['rol_id']=='1'){//si el tipo de usuario es igual a administrador
    header('Location: '.RUTA.'Models/ModeloAdministrador.php');
    
}elseif($usuario['rol_id']=="2"){// si el tipo de usuario es igual a secretario
     header('Location: '.RUTA.'Models/ModeloSecretario.php');
} else{
    header('Location: '.RUTA.'Models/ModeloIniciarSesion.php');
}
    
}else{ 
    header('Location: '.RUTA.'Models/ModeloIniciarSesion.php');
}
?>