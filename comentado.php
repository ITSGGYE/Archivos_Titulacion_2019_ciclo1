 <?php
session_start();

$_SESSION['ac']; 
include 'lib/config.php'; 

 
if(!isset($_SESSION['usuario']))
{
  header("Location: login.php");
}
?>
<?php 
 
$post_id = $_POST['post_id'];
 $user_id = $_POST['user_id'];
 $coment = $_POST['coment']; 
$fecha = date("Y-m-d H:i:s"); 
 

$sql="INSERT INTO comentario  (comentario,id_post,id_est,estado) VALUES ('$coment','$post_id','$user_id'$fecha','1')";
    $query_new_insert = mysqli_query($conection,$sql);
      if ($query_new_insert){
       header("Location:foro.php");
      } else{
        $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($connect);
      }
 
 
 ?>
 