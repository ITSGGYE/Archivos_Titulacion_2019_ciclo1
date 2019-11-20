<?php
require '../Conexion/config.php';
require '../Conexion/functions.php';     

$listaNotasEdit = [];

$idRango = $_POST['idRango'];
$idcurso = $_POST['idcurso'];
$idmateria = $_POST['idmateria'];
$idProfesor = $_POST['idseq_profesor'];
$idPeriodo = $_POST['idPeriodo'];
$idEstudiante = $_POST['idEstudiante'];


$conexion =  conexion($bd_config);

$sql=" SELECT ES.nombresEstudiante,MC.idseq_calif,MC.nombrecalif,NE.idseqParcial,PC.nombreParcial,NE.Nota 
FROM notas_estudiante AS NE
INNER JOIN estudiante AS ES ON ES.idEstudiante= NE.idEstudiante
INNER JOIN modelocalificacion AS MC ON MC.idseq_calif=NE.idseq_calif
INNER JOIN parcial AS PC ON PC.idseqParcial= NE.idseqParcial
WHERE NE.idcurso='$idcurso' and NE.idmateria='$idmateria' and NE.idProfesor='$idProfesor'
and NE.idRango='$idRango' and NE.idPeriodo='$idPeriodo' AND ES.idEstudiante='$idEstudiante'
GROUP BY idseqParcial ORDER BY idseqParcial ";

$statement = $conexion->prepare($sql);
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   
    $listaNotasEdit[] = $data;
    
}
echo json_encode($listaNotasEdit);

?>
    
