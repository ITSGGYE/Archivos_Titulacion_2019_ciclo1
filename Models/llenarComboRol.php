 <?php
 
require '../Conexion/config.php';
require '../Conexion/functions.php';


$conexion =  conexion($bd_config);

$statement = $conexion->prepare("select * from roles");
$statement->execute();

echo '<option value="">Seleccione Rol...</option>';
while($data = $statement->fetch(PDO::FETCH_ASSOC)){
    if($data["rol_estado"]== "A"){
         echo '<option value="'.$data["rol_id"].'">'.$data["rol_descripcion"].'</option>';
    }
   
}
?>
   
