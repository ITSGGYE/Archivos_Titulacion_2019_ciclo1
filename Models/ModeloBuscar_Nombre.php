<?php

require '../Conexion/config.php';
require '../Conexion/functions.php';

$cedula1 = $_POST['cedula1'];


if(strlen($cedula1)==10){
    
    $conexion = conexion($bd_config);
    $statement = $conexion->prepare("Select * from personas where per_cedula LIKE '%$cedula1%' ");
    $statement->execute();
    $data = $statement->fetch(PDO::FETCH_ASSOC);
    
    if($data != false){
      echo "<input type='text' class='form-control' id='nombres1' value='".$data['per_nombre']."' readonly>";
    }else{
        echo "<input type='text' class='form-control' id='nombres1' value='' readonly>";
    }
  
 }else {
     
     if (strlen($cedula1)<10 || strlen($cedula1)>10){
      echo "<input type='text' class='form-control' value='' readonly>";   
     }
  
     
 }


?>
    