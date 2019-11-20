<?php
require '../Conexion/config.php';
require '../Conexion/functions.php';

$idEstudiante = $_POST["idEstudiante"];
$nombresEstudiante = $_POST["nombresEstudiante"];
$direccion = $_POST["direccion"];
$edad = $_POST["edad"];
$nombresRpte = $_POST["nombresRpte"];
$usuario = $_POST["usuario"];
$fecharegistro = $_POST["fecharegistro"];

if(!is_file($nombresEstudiante)){
    echo "Digite bien el nombre";
    exit();
}

if($edad >20){
    echo "Solo se aceptan alumnos menores de 20 años";
    exit();
}
if($edad <=0){
    echo "Digite bien la edad";
    exit();
}
if (!is_numeric($edad)){
   echo "Digite bien la edad, solo se aceptan campos numericos"; 
   exit();
}
if (
        )
$errores = "";
$exito = "Datos Modificados con exito";
$Error = "Error al Editar Datos";

if (empty($idEstudiante)||empty($nombresEstudiante) || empty($direccion) || empty($edad) || empty($nombresRpte) || empty($usuario) || empty($fecharegistro)) {
   
    $errores="Por favor rellenar todos los campos";
    
}

if($errores ==""){
    
  $conexion = conexion($bd_config);
  $statement = $conexion->prepare("UPDATE estudiante set nombresEstudiante='$nombresEstudiante', direccion='$direccion', edad='$edad',nombresRpte='$nombresRpte',usuario='$usuario',fecharegistro='$fecharegistro' where idEstudiante='$idEstudiante' "); 
   
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
   
