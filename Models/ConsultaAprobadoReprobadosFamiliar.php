
<?php

require '../Conexion/config.php';
require '../Conexion/functions.php';

$listaPromediosFinales = [];

$idRango = $_POST['idRango'];
$idcurso = $_POST['idcurso'];
$idmateria = $_POST['idmateria'];
$idProfesor = $_POST['idseq_profesor'];
$idPeriodo = $_POST['idPeriodo'];
$nombreEstudiante = $_POST['nombreEstudiante'];


$conexion =  conexion($bd_config);

$sql=" SELECT
(((SELECT SUM(Nota))/(SELECT COUNT(DISTINCT(NE.idEstudiante))
FROM notas_estudiante AS NE
WHERE NE.idcurso='$idcurso' and NE.idmateria='$idmateria' and NE.idProfesor='$idProfesor' 
and NE.idPeriodo='$idPeriodo'))/((SELECT DISTINCT COUNT(*) 
from notas_estudiante NE WHERE NE.idcurso='$idcurso' and NE.idmateria='$idmateria' and NE.idProfesor='$idProfesor'
and NE.idPeriodo='$idPeriodo' GROUP BY NE.idEstudiante)/(SELECT COUNT(DISTINCT(NE.idEstudiante))
FROM notas_estudiante AS NE
WHERE NE.idcurso='$idcurso' and NE.idmateria='$idmateria' and NE.idProfesor='$idProfesor'
and NE.idPeriodo='$idPeriodo')))Promedio,ES.nombresEstudiante
FROM notas_estudiante AS NE
INNER JOIN estudiante AS ES ON ES.idEstudiante= NE.idEstudiante
WHERE NE.idcurso='$idcurso' and NE.idmateria='$idmateria' and NE.idProfesor='$idProfesor' and NE.idPeriodo='$idPeriodo' 
GROUP BY NE.idEstudiante ";

$statement = $conexion->prepare($sql);
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   
    $listaPromediosFinales[] = $data;
    
}
echo json_encode($listaPromediosFinales);

?>
   