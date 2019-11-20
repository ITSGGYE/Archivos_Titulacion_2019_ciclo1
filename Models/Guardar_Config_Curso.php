<?php
session_start();
  require '../Conexion/config.php';
  require '../Conexion/functions.php';

    $idPeriodo = $_POST["idPeriodo"];
    $idRango = $_POST["idRango"];
    $idcurso = $_POST["idcurso"];
    $idmateria = $_POST["idmateria"];
    $idseq_profesor = $_POST["idseq_profesor"];
    $nombrecalif = $_POST["nombrecalif"];
    $descripcioncalif = $_POST["descripcioncalif"];

    

    $errores = '';
    $exito = "Datos Guardados correctamente";
    $error= "Error al guardar Datos";    
    if (empty($idPeriodo)||empty($idcurso) || empty($idmateria) || empty($idseq_profesor) || empty($nombrecalif)|| empty($descripcioncalif)) {
        $errores= 'Por favor rellene todos los campos';
    } 
    
    if($errores == ''){
        $conexion = conexion($bd_config);
       
        $statement = $conexion->prepare('INSERT INTO modelocalificacion (idseq_calif, idcurso, idmateria, idseq_profesor,idPeriodo,idRango, nombrecalif, descripcioncalif) VALUES(null, :idcurso, :idmateria,:idseq_profesor,:idPeriodo,:idRango, :nombrecalif, :descripcioncalif)');
        
        
        if($statement->execute([
            ':idcurso' => $idcurso,
            ':idmateria' => $idmateria,
            ':idseq_profesor' => $idseq_profesor,
            ':idPeriodo' => $idPeriodo,
            ':idRango' => $idRango,
            ':nombrecalif' => $nombrecalif,
            ':descripcioncalif' => $descripcioncalif
            
        ])){
           echo $exito; 
        }else{
            echo  $error;
        }        
    }else{
        echo $errores;
    }
?>
  