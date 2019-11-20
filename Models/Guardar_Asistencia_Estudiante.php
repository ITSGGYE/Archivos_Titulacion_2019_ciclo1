<?php
session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';
       

date_default_timezone_set('America/Guayaquil');
$fecharegistro = date("Y-m-d");
$exito = "Datos Guardados con exito";

foreach($_POST["listadoFilas"] as $fila){
    
    $idEstudiante = $fila[0];
    $idcurso = $fila[1];
    $idmateria = $fila[2];
    $idseq_profesor = $fila[3];
    $Asistencia = $fila[4];
    
    $conexion = conexion($bd_config);
    $statement = $conexion->prepare('Insert into asistencia_estudiante (idEstudiante, idProfesor, idmateria,idcurso,Asistencia,fechaRegistro) '
          . 'VALUES(:idEstudiante, :idProfesor, :idmateria, :idcurso, :Asistencia, :fechaRegistro)'); 
   
    $statement->execute([
      ':idEstudiante' => $idEstudiante,
      ':idProfesor' => $idseq_profesor,
      ':idmateria' => $idmateria,
      ':idcurso' => $idcurso,
      ':Asistencia' => $Asistencia,
      ':fechaRegistro' => $fecharegistro
     
     ]);
    
}
echo $exito;

?>
    