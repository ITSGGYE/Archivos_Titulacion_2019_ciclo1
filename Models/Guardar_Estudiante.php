<?php
session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';

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

$errores = "";
$exito = "Datos Guardados con exito";
$Error = "Error al guardar Datos";

if (empty($nombresEstudiante) || empty($direccion) || empty($edad) || empty($nombresRpte) || empty($usuario) || empty($fecharegistro)) {
   
    $errores="Por favor rellenar todos los campos";
    
}

if($errores ==""){
    
  $conexion = conexion($bd_config);
  $statement = $conexion->prepare('Insert into estudiante (nombresEstudiante, direccion, edad, nombresRpte, usuario,fecharegistro) '
          . 'VALUES(:nombresEstudiante, :direccion, :edad, :nombresRpte, :usuario, :fecharegistro)'); 
   
    if($statement->execute([
      ':nombresEstudiante' => $nombresEstudiante,
      ':direccion' => $direccion,
      ':edad' => $edad,
      ':nombresRpte' => $nombresRpte,
      ':usuario' => $usuario,
      ':fecharegistro' => $fecharegistro
      
     ]))
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
   
