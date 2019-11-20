<?php
require '../Conexion/config.php';
require '../Conexion/functions.php';

$Edit= "";
foreach ($_POST["filas"] as $fila) {
$idEstudiante = $fila[0];
$idPeriodo = $fila[1];
$idRango = $fila[2];
$idProfesor = $fila[3];
$idmateria = $fila[4];
$idcurso = $fila[5];
$idseq_calif = $fila[6];
$idseqParcial = $fila[7];
$Nota = $fila[8];

     if($Nota == ""){
        $Edit = "Las notas no admiten campos vacios"; 
     }
       

}

if($Edit == ""){
    $Mensaje = "";
    foreach ($_POST["filas"] as $fila) {
$idEstudiante = $fila[0];
$idPeriodo = $fila[1];
$idRango = $fila[2];
$idProfesor = $fila[3];
$idmateria = $fila[4];
$idcurso = $fila[5];
$idseq_calif = $fila[6];
$idseqParcial = $fila[7];
$Nota = $fila[8];

      $sql = " UPDATE notas_estudiante set Nota='$Nota' where idseqParcial='$idseqParcial'
               AND idseq_calif = '$idseq_calif' AND idPeriodo='$idPeriodo' AND idRango='$idRango'
               AND idProfesor='$idProfesor' AND idmateria='$idmateria' AND idcurso ='$idcurso'
               AND idEstudiante ='$idEstudiante' ";
      $conexion = conexion($bd_config);
      $statement = $conexion->prepare($sql); 
      $statement->execute();
       

}
   echo $Mensaje = 'Notas Modificadas con exito'; 
}else{
    echo $Edit;
}


?>
    