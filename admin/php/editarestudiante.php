<?php 
include '../../lib/config.php'; 
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$cedula=$_POST['cedula'];
$c=$_POST['pass'];
$foto=$_FILES['imagen']; 
$pass=md5($c);

             $type = 'jpg';
            $rfoto = $_FILES['imagen']['tmp_name'];
            $name = $id.'.'.$type;

            if(is_uploaded_file($rfoto))
            {
              $destino = '../../avatars/'.$name;
              $nombrea = $name;
              copy($rfoto, $destino);
            }
 
$sql="UPDATE estudiantes SET nombre='".$nombre."',apellido='".$apellido."',correo='".$correo."',cedula='".$cedula."',pass='".$pass."',foto='".$nombrea."' WHERE id_est='".$id."';" ;
    $query_new_insert = mysqli_query($conection,$sql);
      if ($query_new_insert){
      header("Location:../estudiante.php");
      } else{
        $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($connect);
      }
    
  

?>