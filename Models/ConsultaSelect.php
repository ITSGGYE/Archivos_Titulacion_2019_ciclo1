<?php
session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';

$listaEmpleados = [];
$idDepartamento = $_POST['Departamentos'];

$conexion =  conexion($bd_config);

$sql ="select idEmpleado,nombreEmpleado from Empleado where idDepartamento = $idDepartamento ";
//echo ($sql);
$statement = $conexion->prepare($sql);
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
  
    $obj['idEmpleado']= $data['idEmpleado'];
    $obj['nombreEmpleado']= utf8_encode($data['nombreEmpleado']);
   
    $listaEmpleados[] = $obj;
    
    
    
}

echo json_encode($listaEmpleados);
   
