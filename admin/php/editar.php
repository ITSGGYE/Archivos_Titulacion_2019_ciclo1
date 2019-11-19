<?php 
include '../../lib/config.php'; 
$id=$_POST['id'];
 

$sql="DELETE
FROM post
WHERE id_post =$id";
    $query_new_insert = mysqli_query($conection,$sql);
      if ($query_new_insert){
       header("Location:../foro.php");
      } else{
        $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($connect);
      }
 



?>