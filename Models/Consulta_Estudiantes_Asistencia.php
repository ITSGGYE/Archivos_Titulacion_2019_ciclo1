<?php
session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';

$listaEstudiantesAsistencia = [];

$idcurso = $_POST['idcurso'];
$idseq_profesor = $_POST['idseq_profesor'];
$idmateria = $_POST['idmateria'];

$conexion =  conexion($bd_config);

$strSql = "select EMC.idEstudiante,ES.nombresEstudiante,EMC.idcurso,EMC.idmateria,EMC.idseq_profesor from estudiante_materia_curso as EMC INNER JOIN estudiante as ES "
        . " ON EMC.idEstudiante = ES.idEstudiante "
        . "where EMC.idcurso='$idcurso' and EMC.idseq_profesor='$idseq_profesor' and EMC.idmateria='$idmateria' ";
$statement = $conexion->prepare($strSql);
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   
    $listaEstudiantesAsistencia[] = $data;
    
}
echo json_encode($listaEstudiantesAsistencia);
?>
    
