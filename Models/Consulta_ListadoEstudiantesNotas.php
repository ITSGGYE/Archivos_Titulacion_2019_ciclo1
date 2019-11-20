<?php

require '../Conexion/config.php';
require '../Conexion/functions.php';

$listaNot_Estudiante = [];

$idRango = $_POST['idRango'];
$idcurso = $_POST['idcurso'];
$idmateria = $_POST['idmateria'];
$idProfesor = $_POST['idseq_profesor'];
$idPeriodo = $_POST['idPeriodo'];



$conexion =  conexion($bd_config);

$sql=" SELECT NE.idEstudiante,ES.nombresEstudiante
FROM notas_estudiante AS NE
INNER JOIN estudiante AS ES ON ES.idEstudiante= NE.idEstudiante
INNER JOIN modelocalificacion AS MC ON MC.idseq_calif=NE.idseq_calif
INNER JOIN parcial AS PC ON PC.idseqParcial= NE.idseqParcial
WHERE NE.idcurso='$idcurso' and NE.idmateria='$idmateria' and NE.idProfesor='$idProfesor'
and NE.idRango='$idRango' and NE.idPeriodo='$idPeriodo' GROUP BY NE.idEstudiante
ORDER BY NE.idEstudiante ";

$statement = $conexion->prepare($sql);
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   
    $listaNot_Estudiante[] = $data;
    
}
echo json_encode($listaNot_Estudiante);


?>

