<?php 
include '../../lib/config.php'; 
$id=$_POST['id'];
 

$sql="DELETE
FROM publicaciones
WHERE id_pub =$id";
    $query_new_insert = mysqli_query($conection,$sql);
      if ($query_new_insert){
       header("Location:../editanoticia.php");
      } else{
        $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($connect);
      }
 



?>