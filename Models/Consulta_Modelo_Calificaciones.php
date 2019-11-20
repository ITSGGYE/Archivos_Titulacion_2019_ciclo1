<?php
session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';

$listaModeloCalificacion = [];

$idmateria= $_POST['idmateria'];
$idRango= $_POST['idRango'];
$idseq_profesor = $_POST['idseq_profesor'];
$idcurso= $_POST['idcurso'];


$conexion =  conexion($bd_config);

$sql = " select MC.idseq_calif,MC.idcurso,C.nombrecurso,MC.idmateria,MC.nombrecalif,PC.nombreParcial,MC.idPeriodo from modelocalificacion AS MC INNER JOIN parcial AS PC
ON MC.idseq_calif = PC.idseq_calif INNER JOIN curso AS C ON MC.idcurso = C.idcurso where MC.idmateria='$idmateria'
AND MC.idRango='$idRango' and MC.idseq_profesor='$idseq_profesor' and MC.idcurso='$idcurso' order by MC.idseq_calif asc ";

$statement = $conexion->prepare($sql);
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   
    $listaModeloCalificacion[] = $data;
    
}
echo json_encode($listaModeloCalificacion);
?>
   
