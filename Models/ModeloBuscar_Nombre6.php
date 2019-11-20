<?php
require '../Conexion/config.php';
require '../Conexion/functions.php';

$cedula6 = $_POST['cedula6'];


if(strlen($cedula6)==10){
    $conexion = conexion($bd_config);
    $statement = $conexion->prepare("Select * from personas where per_cedula LIKE '%$cedula6%' ");
    $statement->execute();
    $data = $statement->fetch(PDO::FETCH_ASSOC);
    
    if($data != false){
       echo "<input type='text' class='form-control' id='nombres6' value='".$data['per_nombre']."' readonly>";
    }else{
        echo "<input type='text' class='form-control' value='' readonly>";
    }
  
 }elseif (strlen($cedula6)<10 || strlen($cedula1)>10) {
     echo "<input type='text' class='form-control' value='' readonly>";
    
 } 

?>
    
