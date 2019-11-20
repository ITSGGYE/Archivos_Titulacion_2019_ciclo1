<?php
session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';

$idcalificacion = $_POST['idcalificacion'];
$nombreParcial = $_POST['nombreParcial'];


$errores = '';
$exito = "Datos Guardados correctamente";
$error = "Error al guardar Datos";
    if (empty($idcalificacion) || empty($nombreParcial)) {
      $errores = 'Por favor rellene todos los campos';
    }
     
    if($errores == ''){
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('INSERT INTO parcial(idseqParcial, nombreParcial, idseq_calif) VALUES(null, :nombreParcial, :idseq_calif)');
        
        if($statement->execute([
            ':nombreParcial' => $nombreParcial,
            ':idseq_calif' => $idcalificacion
        ])){
           echo $exito; 
        }else{
            echo  $error;
        }        
    }else{
        echo $errores;
    }
?>
   