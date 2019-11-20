<?php

require '../Conexion/config.php';
require '../Conexion/functions.php';
$cedula2 = $_POST['cedula2'];


if(strlen($cedula2)==10){
    $conexion = conexion($bd_config);
    $statement = $conexion->prepare("Select * from personas where per_cedula LIKE '%$cedula2%' ");
    $statement->execute();
    $data = $statement->fetch(PDO::FETCH_ASSOC);
    
    if($data != false){
      echo "<input type='text' class='form-control' id='nombres2' value='".$data['per_nombre']."' readonly>";
    }else{
        echo "<input type='text' class='form-control' id='nombres2' value='' readonly>";
    }
   
    
 }elseif (strlen($cedula2)<10 || strlen($cedula1)>10) {
     echo "<input type='text' class='form-control' value='' readonly>";
    
 } 

?>
    
