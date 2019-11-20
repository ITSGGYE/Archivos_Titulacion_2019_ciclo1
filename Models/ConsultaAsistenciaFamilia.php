<?php

require '../Conexion/config.php';
require '../Conexion/functions.php';

$listaAsistenciafamilia = [];

$idcurso = $_POST['idcurso'];
$Mes = $_POST['Mes'];
$idmateria = $_POST['idmateria'];
$nombreEstudiante = $_POST['nombreEstudiante'];

$conexion =  conexion($bd_config);

$strSql = " select ES.nombresEstudiante,PR.nombre,AE.fechaRegistro,AE.Asistencia from asistencia_estudiante as AE 
INNER JOIN estudiante AS ES ON AE.idEstudiante= ES.idEstudiante
INNER JOIN profesor AS PR ON PR.idseq_profesor = AE.idProfesor
INNER JOIN curso AS CR ON CR.idcurso = AE.idcurso
INNER JOIN materia AS MT ON MT.idmateria = AE.idmateria
AND AE.idcurso='$idcurso' AND ES.nombresEstudiante='$nombreEstudiante' AND AE.idmateria='$idmateria'
AND MONTH(AE.fechaRegistro)= '$Mes' ";

$statement = $conexion->prepare($strSql);
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   
    $listaAsistenciafamilia[] = $data;
    
}
echo json_encode($listaAsistenciafamilia);
?>
