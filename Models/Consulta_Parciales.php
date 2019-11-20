<?php
session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';

$listaParciales = [];

$idseq_calif = $_POST['idseq_calif'];


$conexion =  conexion($bd_config);

    $statement = $conexion->prepare("SELECT idseqParcial,nombreParcial FROM parcial where idseq_calif='$idseq_calif' ");
    $statement->execute();
  while($data = $statement->fetch(PDO::FETCH_ASSOC)){
    
    $listaParciales[] = $data;
    
  }
echo json_encode($listaParciales);

?>
 
