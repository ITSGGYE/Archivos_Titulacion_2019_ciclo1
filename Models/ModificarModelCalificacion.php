<?php
require '../Conexion/config.php';
require '../Conexion/functions.php';

$idseq_calif = $_POST["idseq_calif"];
$nombrecalif = $_POST["nombrecalif"];
$descripcioncalif = $_POST["descripcioncalif"];

$errores = "";
$exito = "Datos Modificados con exito";
$Error = "Error al Editar Datos";

if (empty($idseq_calif)||empty($nombrecalif) || empty($descripcioncalif)) {
   
    $errores="Todos los campos deben estar llenos";
    
}

if($errores ==""){
    
  $conexion = conexion($bd_config);
  $statement = $conexion->prepare("UPDATE modelocalificacion set nombrecalif='$nombrecalif', descripcioncalif='$descripcioncalif' where idseq_calif='$idseq_calif' "); 
   
    if($statement->execute())
     {
        echo $exito; 
     }else
     {
     
         echo $Error; 
     }
    

}else{
    echo $errores;
}

?>
   
