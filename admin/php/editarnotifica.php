<?php 
include '../../lib/config.php'; 
$id=$_POST['id'];
$nombre=$_POST['nombre'];
 
$foto=$_FILES['imagen']; 
 
             $type = 'jpg';
            $rfoto = $_FILES['imagen']['tmp_name'];
            $name = $id.'.'.$type;

            if(is_uploaded_file($rfoto))
            {
              $destino = '../../publicaciones/'.$name;
              $nombrea = $name;
              copy($rfoto, $destino);
            }
 
$sql="UPDATE publicaciones SET contenido='".$nombre."',imagen='".$nombrea."' WHERE id_pub='".$id."';" ;
    $query_new_insert = mysqli_query($conection,$sql);
      if ($query_new_insert){
      header("Location:../editanoticia.php");
      } else{
        $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($connect);
      }
    
  

?>