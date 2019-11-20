
<?php

require '../Conexion/config.php';
require '../Conexion/functions.php';

$listaPromediosFinales = [];

$idRango = $_POST['idRango'];
$idcurso = $_POST['idcurso'];
$idmateria = $_POST['idmateria'];
$idProfesor = $_POST['idseq_profesor'];
$idPeriodo = $_POST['idPeriodo'];



$conexion =  conexion($bd_config);

$sql=" select (SUM(NE.Nota)/(COUNT(NE.idseqParcial)))Promedio,
ES.nombresEstudiante,NE.idseq_calif,NE.idEstudiante
from notas_estudiante AS NE
INNER JOIN estudiante AS ES ON ES.idEstudiante = NE.idEstudiante
WHERE NE.idPeriodo='$idPeriodo'
AND NE.idcurso = '$idcurso' AND NE.idmateria='$idmateria'
AND NE.idRango = '$idRango' AND NE.idProfesor='$idProfesor'
GROUP BY NE.idseq_calif,NE.idEstudiante
ORDER BY NE.idEstudiante; ";

$statement = $conexion->prepare($sql);
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   
    $listaPromediosFinales[] = $data;
    
}
echo json_encode($listaPromediosFinales);

?>
   