 <?php
function conectar(){
    $user="root";
    $pass="";
    $servidor="localhost";
    $db="multimedia";
    $conexion=new mysqli($servidor,$user,$pass,$db);
    if($conexion-> connect_errno){
        return "no se conecto";
        
    }else{
        return "conectado";
    }
}
    ?>
    