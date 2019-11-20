 <?php
require '../Conexion/config.php';
require '../Conexion/functions.php';
       
 


$conexion =  conexion($bd_config);

   $sql = " select COUNT(*) Total from usuariosig ";
   
   $statement = $conexion->prepare($sql);
   $statement->execute();

while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   echo  $data['Total'];   
}
 ?>
    