<?php
session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';

$listaEstudiantes_Cursos = [];

$idcurso= $_POST['idcurso'];
$idmateria = $_POST['idmateria'];

$conexion =  conexion($bd_config);


$statement = $conexion->prepare("select ES.idEstudiante,ES.nombresEstudiante from estudiante_materia_curso as EM INNER JOIN estudiante ES ON EM.idEstudiante = ES.idEstudiante where EM.idmateria= '$idmateria' and EM.idcurso='$idcurso' ");
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   
    $listaEstudiantes_Cursos[] = $data;
    
}
echo json_encode($listaEstudiantes_Cursos);
?>
   
