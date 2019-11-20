<?php

require '../Conexion/config.php';
require '../Conexion/functions.php';

$idSacramento = $_POST['tipoSacramento'];
$acta = $_POST['acta'];
$Pagina = $_POST['Pagina'];
$Fecha_sacramento = $_POST['Fecha_sacramento'];
$sac_iglesia = $_POST['sac_iglesia'];
$Toma = $_POST['Toma'];
$cura = $_POST['cura'];
$sac_usuario = $_POST['sac_usuario'];
$sac_fechaRegistro = $_POST['sac_fechaRegistro'];


     $errores = "";
     $Exito = "Datos Guardados con exito";
     $Error = "Error al Guardar datos intentelo nuevamente";
     
     if (empty($idSacramento) || empty($Fecha_sacramento)|| empty($sac_iglesia) ||
             empty($cura)|| empty($sac_usuario)|| empty($sac_fechaRegistro)) {
     $errores .="Por favor rellene todos los campos";
     }
     
     $conexion = conexion($bd_config);    
     $statementconsult = $conexion->prepare("select COUNT(*)+1 as contador from sacramentos ");
     $statementconsult->execute();
     $data = $statementconsult->fetch(PDO::FETCH_ASSOC);
     
     $sac_codigo = $data['contador'];
     
     if($errores == ""){
    
     $conexion = conexion($bd_config);
 
     $statement = $conexion->prepare('INSERT INTO sacramentos (sac_codigo,sac_tipo,sac_fecha, sac_cura,sac_iglesia,sac_tomo,sac_pagina,sac_acta,sac_usuario, sac_fechaRegistro)'
            . 'VALUES(:sac_codigo,:sac_tipo,:sac_fecha, :sac_cura,:sac_iglesia, :sac_tomo, :sac_pagina, :sac_acta, :sac_usuario, :sac_fechaRegistro)');
    
       if($statement->execute([
       ':sac_codigo' => $sac_codigo,
       ':sac_tipo' => $idSacramento,
       ':sac_fecha' => $Fecha_sacramento,
       ':sac_cura' => $cura,
       ':sac_iglesia' => $sac_iglesia,    
       ':sac_tomo' => $Toma,
       ':sac_pagina' => $Pagina,
       ':sac_acta' => $acta,
       ':sac_usuario' => $sac_usuario,
       ':sac_fechaRegistro' => $sac_fechaRegistro
        
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


?>
    
