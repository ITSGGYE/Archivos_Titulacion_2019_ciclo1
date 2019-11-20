<?php
 require '../Conexion/config.php';
 require '../Conexion/functions.php';
 
 
  $idGrupo_pastoral = $_POST["idGrupo_pastoral"];
  $RolIntegrante = $_POST["RolIntegrante"];
  $nombresIntegrante = $_POST["nombresIntegrante"];
  $EdadIntegrante = $_POST["EdadIntegrante"];
  $DireccionIntegrante = $_POST["DireccionIntegrante"];
  $TelefonoIntegrante = $_POST["TelefonoIntegrante"];
  $CorreoIntegrante = $_POST["CorreoIntegrante"];
  $nombresPadreFamilia = $_POST["nombresPadreFamilia"];
  $telefonoPadreFamilia = $_POST["telefonoPadreFamilia"];
  $nombresMadreFamilia = $_POST["nombresMadreFamilia"];
  $telefonoMadreFamilia = $_POST["telefonoMadreFamilia"];
  $usuario = $_POST["usuario"];
  $fechaRegistro = $_POST["fechaRegistro"];
  
  if ($EdadIntegrante>$fechaRegistro){
    echo 'Fecha incorrecta';
     exit();
  }
  $Errores ="";
  $Exito = "Datos Guardados Correctemente";
  $Error = "Error al Guardar Datos intentelo nuevamente";
  
  
  if(empty($idGrupo_pastoral)||empty($RolIntegrante)|| empty($nombresIntegrante)||
          empty($DireccionIntegrante)||empty($TelefonoIntegrante)||empty($CorreoIntegrante)||empty($usuario)||empty($fechaRegistro)){
      $Errores = "Por Favor Rellene los Campos";
      
  }
  if($Errores == ""){
      $conexion = conexion($bd_config);
             $statement = $conexion->prepare('INSERT INTO Listado_Grupo (idGrupo_pastoral, RolIntegrante, nombresIntegrante, EdadIntegrante, DireccionIntegrante, TelefonoIntegrante, CorreoIntegrante, nombresPadreFamilia, telefonoPadreFamilia, nombresMadreFamilia, telefonoMadreFamilia, usuario, fechaRegistro) '
                     . 'VALUES(:idGrupo_pastoral, :RolIntegrante, :nombresIntegrante, :EdadIntegrante, :DireccionIntegrante, :TelefonoIntegrante, :CorreoIntegrante, :nombresPadreFamilia, :telefonoPadreFamilia, :nombresMadreFamilia, :telefonoMadreFamilia, :usuario, :fechaRegistro)');
           
             if($statement->execute([
                ':idGrupo_pastoral' => $idGrupo_pastoral,
                ':RolIntegrante' => $RolIntegrante,
                ':nombresIntegrante' => $nombresIntegrante, 
                ':EdadIntegrante' => $EdadIntegrante,
                ':DireccionIntegrante' => $DireccionIntegrante,
                ':TelefonoIntegrante' => $TelefonoIntegrante,
                ':CorreoIntegrante' => $CorreoIntegrante,
                ':nombresPadreFamilia' => $nombresPadreFamilia,
                ':telefonoPadreFamilia' => $telefonoPadreFamilia,
                ':nombresMadreFamilia' => $nombresMadreFamilia,
                ':telefonoMadreFamilia' => $telefonoMadreFamilia, 
                ':usuario' => $usuario,
                ':fechaRegistro' => $fechaRegistro
             ])){
               echo $Exito;  
             }else{
                 echo $Error;
             }
         
      
  }else{
      $Errores;
  }
  
  ?>
   
