<?php 
include '../../lib/config.php'; 
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];

$foto=$_FILES['imagen']; 


             $type = 'jpg';
            $rfoto = $_FILES['imagen']['tmp_name'];
            $name = $id.'.'.$type;

            if(is_uploaded_file($rfoto))
            {
              $destino = '../../avatars/'.$name;
              $nombrea = $name;
              copy($rfoto, $destino);
            }
 
$sql="UPDATE post SET titulo='".$nombre."',content='".$apellido."',image='".$nombrea."' WHERE id_post='".$id."';" ;
    $query_new_insert = mysqli_query($conection,$sql);
      if ($query_new_insert){
      header("Location:../foro.php");
      } else{
        $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($connect);
      }
    
  

?>