<?php  session_start(); //creamos una variable local de tipo sesion

require '../Conexion/config.php'; //importamos nuestro archivo de configuracion que contiene el nombre, usuario y contraseña de la base de datos
require '../Conexion/functions.php';

$error = '';//creamos una variable de error y la inicializamos vacia.


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $conexion = conexion($bd_config);
    $statement = $conexion->prepare('select * from usuariosig where usuario= :usuario AND password = :password');//
    $statement->execute([
        ':usuario' => $usuario,
        ':password' => $password
    ]);
    $resultado = $statement->fetch();
    
    if ($resultado !== false) {//si nuestro resultado es verdadero que nos redirija a index.php donde vamos a realizar las validaciones
    $_SESSION['usuario'] = $usuario;//estamos metiendo una variable global de sesion, que va a ser igual a nuestra variable del campo de texto
    header('Location: '.RUTA.'index.php');
  } else {
    $error .= '<li class="error">Tu usuario y/o contraseña son incorrectos</li>';
  }
  
}
require '../vistas/Login.view'; //importamos nuestra vista de login
?>