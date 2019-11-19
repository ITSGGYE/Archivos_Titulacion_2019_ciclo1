<?php 
include '../../lib/config.php'; 
$id=$_POST['id'];
 

$sql="DELETE
FROM comentario
WHERE id_comentario =$id";
    $query_new_insert = mysqli_query($conection,$sql);
      if ($query_new_insert){
       header("Location:../comentarios.php");
      } else{
        $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($connect);
      }
 



?>