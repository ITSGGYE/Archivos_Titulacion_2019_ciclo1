<?php 
include '../../lib/config.php'; 
$id=$_POST['id'];
 

$sql="DELETE
FROM estudiantes
WHERE id_est =$id";
    $query_new_insert = mysqli_query($conection,$sql);
      if ($query_new_insert){
       header("Location:../estudiante.php");
      } else{
        $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($connect);
      }
 



?>