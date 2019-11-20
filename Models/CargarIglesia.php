<?php
require '../Conexion/config.php';
require '../Conexion/functions.php';

$conexion = conexion($bd_config);
    $statement = $conexion->prepare("Select * from iglesia ");
    $statement->execute();
    
    
    while($data = $statement->fetch(PDO::FETCH_ASSOC)){
       echo ' <div class="form-group" >';
       echo        '<div class="col-md-4">';
       echo               '<label>Nombre Iglesia:</label>';
       echo        '</div>';
       echo         "<input type='hidden' class='form-control' id='igle_codigo' value='".$data['igle_codigo']."' >";
       echo        '<div class="col-md-6">';
       echo         "<input type='text' class='form-control' id='igle_nombre' value='".$data['igle_nombre']."' >";
       echo        '</div>';
       echo '</div>';
       echo ' <div class="form-group">';
       echo        '<div class="col-md-4">';
       echo               '<label>Direccion:</label>';
       echo        '</div>';
       echo        '<div class="col-md-6">';
       echo         "<input type='text' class='form-control' id='igle_direccion' value='".$data['igle_direccion']."' >";
       echo        '</div>';
       echo  '</div>';
   
    }
    
  
// put your code here
?>
   
