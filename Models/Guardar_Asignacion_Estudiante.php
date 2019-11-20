<?php
session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';

$idEstudiante = $_POST['idEstudiante'];
$idcurso = $_POST['idcurso'];
$idmateria = $_POST['idmateria'];
$idseq_profesor = $_POST['idseq_profesor'];
$Nombre_usuario = $_POST['Nombre_usuario'];
$fechaRegistro_Asignacion = $_POST['fechaRegistro_Asignacion'];

     $errores = "";
     $Exito = "Datos Guardados con exito";
     $Error = "Error al Guardar datos intentelo nuevamente";

     if (empty($idEstudiante) || empty($idcurso) || empty($idmateria) || empty($idseq_profesor)|| empty($Nombre_usuario) || empty($fechaRegistro_Asignacion)) {
     $errores .="Por favor llene todos los campos son obligatorios ..!";
     }
     
     if($errores == ""){
       $conexion = conexion($bd_config);
     
     $statement = $conexion->prepare('INSERT INTO estudiante_materia_curso (idEstudiante, idcurso, idmateria, idseq_profesor, Nombre_usuario, fechaRegistro_Asignacion)'
            . 'VALUES(:idEstudiante, :idcurso, :idmateria, :idseq_profesor, :Nombre_usuario, :fechaRegistro_Asignacion)');
    
       if($statement->execute([
       ':idEstudiante' => $idEstudiante,
       ':idcurso' => $idcurso,
       ':idmateria' => $idmateria,
       ':idseq_profesor' => $idseq_profesor,
       ':Nombre_usuario' => $Nombre_usuario,
       ':fechaRegistro_Asignacion' => $fechaRegistro_Asignacion
        
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
  