<?php
session_start(); //creamos una variable global de tipo sesions

require '../Conexion/config.php';
require '../Conexion/functions.php';


    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $rol_id = $_POST['rol_id'];
    
    

    $errores = '';
    $Error = "Error al guardar Datos intento nuevamente";
    $Exito = "Usuario Registrado con exito";

    //validar los campos de texto
    if (empty($usuario) || empty($password) || empty($rol_id)) {
        $errores .= 'Por favor rellene todos los campos';
    } else {
        if(strlen($usuario)>15){
         echo 'usuario solo permite hasta quince digitos';
         exit();
        }
        if(strlen($password)>15){
         echo 'contraseña solo permite hasta quince digitos';
         exit();
        }
        // validacion de que el usuario no exista
        $conexion = conexion($bd_config); //traemos los valores de la conexion
        $statement = $conexion->prepare('select * from usuariosig where usuario = :usuario LIMIT 1'); //creamos una variable statement que va a ser igual a nuestra variable de conexion y que va a preparar un sentencia de sql
          //seleccionar todo de la tabla usuario where  usuario sea igual a un placeholder o variable vacia que tiene que ser asignada con el limite de uno, o sea un solo registro
        $statement->execute([//ejecutamos nuestra sentencia sql,abrimos un array
            ':usuario' => $usuario
        ]);
        $resultado = $statement->fetch();//que la variable resultado nos va a traer toda nuestra sentecia sql, trayendo todos los valores de la tabla usuarios

        if ($resultado != false) {// si el usuario es verdadero, o sea ya se encuentra en la base
            $errores .= 'Este usuario ya existe';
        }
        
    }
    
    
    if($errores == ''){
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('INSERT INTO usuariosig (idusuario, usuario, password, rol_id) VALUES(null, :usuario, :password, :rol_id)');
        
        if($statement->execute([
            ':usuario' => $usuario,
            ':password' => $password,
            ':rol_id' => $rol_id
        ])){
            echo $Exito;
        }else{
            echo $Error;
        }
       
        
    }else{
        
     echo $errores;
    }

?>
  
