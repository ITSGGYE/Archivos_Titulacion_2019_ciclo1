<?php 
include 'lib/config.php'; 
$id=$_POST['ida'];
$nombre=$_POST['nombre'];

 
 
$sql="UPDATE comentarios SET comentario='".$nombre."' WHERE id_com='".$id."';" ;
    $query_new_insert = mysqli_query($conection,$sql);
      if ($query_new_insert){
      header("Location:noticias.php");
      } else{
        $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($connect);
      }


?>