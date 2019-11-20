<?php
session_start();

require '../Conexion/config.php';
require '../Conexion/functions.php';


$cedulaCura = $_POST['cedulaCura'];
$nombresCura = $_POST['nombresCura'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$fechainicio = $_POST['fechainicio'];
$usuario = $_POST['usuario'];
$fechaRegistro = $_POST['fechaRegistro'];
$fechafin = "0000-00-00";
$fechamodificacion = "0000-00-00";


 if(strlen($cedulaCura)<10){
    echo 'Cedula incorrecta la cedula son 10 digitos';
    exit();
 }elseif(strlen($cedulaCura)>10){
    echo 'Cedula incorrecta son 10 numeros de la cedula';
    exit();
 }
 if(is_numeric($cedulaCura)){ 
    
     $errores = "";
     $Exito = "Datos Guardados con exito";
     $Error = "Error al Guardar datos intentelo nuevamente";
     
     if (empty($cedulaCura) || empty($nombresCura) || empty($fechaNacimiento) || empty($fechainicio)|| empty($usuario) || empty($fechaRegistro)) {
     $errores .="Por favor rellene todos los campos";
     }else{
         // validacion de que el cura no exista
        $conexion = conexion($bd_config); //traemos los valores de la conexion
        $statement = $conexion->prepare('select * from historialcuras where cura_cedula = :cura_cedula LIMIT 1'); //creamos una variable statement que va a ser igual a nuestra variable de conexion y que va a preparar un sentencia de sql
          //seleccionar todo de la tabla usuario where  usuario sea igual a un placeholder o variable vacia que tiene que ser asignada con el limite de uno, o sea un solo registro
        $statement->execute([//ejecutamos nuestra sentencia sql,abrimos un array
            ':cura_cedula' => $cedulaCura
        ]);
        $resultado = $statement->fetch();//que la variable resultado nos va a traer toda nuestra sentecia sql, trayendo todos los valores de la tabla usuarios

        if ($resultado != false) {// si el cura ya se encuentra en la base
            $errores .= 'Este Registro ya existe en la base';
        }
         
     }



    if($errores == ""){
    
     $conexion = conexion($bd_config);
     
     $statement = $conexion->prepare('INSERT INTO historialcuras (cura_cedula, cura_nombres, cura_fecha_nac,cura_usuario,cura_fecha_registro,cura_fecha_inicio,cura_fecha_fin, cura_fecha_modificacion)'
            . 'VALUES(:cura_cedula, :cura_nombres, :cura_fecha_nac, :cura_usuario, :cura_fecha_registro, :cura_fecha_inicio, :cura_fecha_fin, :cura_fecha_modificacion)');
    
       if($statement->execute([
       ':cura_cedula' => $cedulaCura,
       ':cura_nombres' => $nombresCura,
       ':cura_fecha_nac' => $fechaNacimiento,
       ':cura_usuario' => $usuario,
       ':cura_fecha_registro' => $fechaRegistro,
       ':cura_fecha_inicio' => $fechainicio,
       ':cura_fecha_fin' => $fechafin,
       ':cura_fecha_modificacion' => $fechamodificacion
        
       ])){
          echo $Exito;
       }
       else
       {
         echo $Error;
       }
  
    }
    else
    {
     echo $errores;
    }
 }
 else
 {
    echo 'solo se aceptan campos numericos, Ingrese bien la cedula ..!';
    exit();
 }



?>
   