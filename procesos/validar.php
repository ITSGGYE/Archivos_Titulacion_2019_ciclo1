 <?php 

include ("principal.php");
    if(isset($_POST['submit'])){
       if(empty($nombre)){
       echo " <p class='error'>Agrega tu nombre</p> ";
       }else{
        if(strlen($nombre) > 15){
             echo " <p class='error'>El nombre es muy largo</p> ";   
        }
       }
         if(empty($usuario)){
       echo " <p class='error'>Agrega tu usuario</p> ";
       }else{
        if(strlen($nombre) > 15){
             echo " <p class='error'>El nombre del suario es muy largo</p> ";
        }
       }
         if(empty($pass)){
       echo " <p class='error'>Agrega tu password</p> ";
       }
         if(empty($correo)){
       echo " <p class='error'>Agrega tu email</p> ";
       }else{
            if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
                 echo " <p class='error'>El correo es incorrecto</p> ";
            }
         }
        if(!empty($nombre && $usuario && $pass && $correo)){
            $conexion = mysqli_connect("localhost","root","","multimedia");
           
        $insertar = "INSERT INTO registro (nombre, usu, pass, correo) VALUES ('$nombre','$usuario','$pass','$correo')";
            $resultado = mysqli_query($conexion,$insertar);
            if(!$resultado){
             echo " <p class='error'>Error al registrar</p> ";
            }else{
                 echo " <p class='error'>Registrado correctamente</p> ";
            }
        }

        
    }




 ?>