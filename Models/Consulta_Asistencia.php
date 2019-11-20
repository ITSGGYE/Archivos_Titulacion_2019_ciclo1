<?php
session_start();

require '../Conexion/config.php';
require '../Conexion/functions.php';

$listaAsistencia = [];

$idcurso = $_POST['idcurso'];
$idseq_profesor = $_POST['idseq_profesor'];
$fechaRegistro = $_POST['fechaRegistro'];

$conexion =  conexion($bd_config);

$strSql = " select ES.nombresEstudiante, AE.Asistencia  from asistencia_estudiante AE INNER JOIN estudiante ES ON AE.idEstudiante = ES.idEstudiante "
        . " WHERE AE.idcurso = '$idcurso' and AE.idProfesor = '$idseq_profesor' and AE.fechaRegistro = '$fechaRegistro' ";

$statement = $conexion->prepare($strSql);
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   
    $listaAsistencia[] = $data;
    
}
echo json_encode($listaAsistencia);
?>
