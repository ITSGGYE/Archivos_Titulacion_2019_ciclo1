 <?php
session_start();
 $_SESSION['ac']=$_POST['f']; 

include 'lib/config.php'; 

 
if(!isset($_SESSION['usuario']))
{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html class="no-js">
<head>
<?php 
include 'head.php';

 ?>
 
 
  </head>

  <body>
<?php include 'navar.php'; ?>
 
 <div class="container">
<div class="row">
<div class="col-md-12">
<?php 


$ida=$_SESSION['ac'];  
 
            
$p = mysqli_query($conection,"SELECT * FROM post where id_post=$ida");
              while($pos = mysqli_fetch_array($p)) { 
             $titulo=$pos['titulo'];
             $content=$pos['content'];
             $image=$pos['image'];
             $fecha=$pos['fecha']; 
              $idpost=$pos['id_categoria'];
 }
 
  $ps = mysqli_query($conection,"SELECT * FROM categoria where id_categoria=$idpost");
              while($poss = mysqli_fetch_array($ps)) { 
             $nombre=$poss['nombre'];
 }

  ?>


<h1><?php echo "$titulo"; ?></h1>
 
      <img src="<?php echo $image; ?>" class="img-responsive" >
  
<br><div class="panel panel-default">
<div class="panel-body">
<label>Contenido</label>
<p><?php echo $content; ?></p>
<label>Categoria</label>
<p><?php echo $nombre; ?></p>


</div>
</div>
 
<div class="panel panel-default">
<div class="panel-heading">Escribir comentario</div>
<div class="panel-body">

<form method="post" name="myform" action="comentado.php">
<input type="hidden" name="post_id" value="<?php echo $ida; ?>">
<input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
 
  <div class="form-group">
    <label for="exampleInputEmail1">Comentarios</label>
    <textarea name="coment" class="form-control" id="exampleInputEmail1" placeholder="Comentarios" required rows="3"></textarea>
  </div>




  <button type="submit" class="btn btn-default">Enviar Comentario</button>
</form>

</div>
</div>
 
 
<div class="panel panel-default">
<div class="panel-heading">Comentarios</div>
<div class="panel-body">
 <?php 
$pa = mysqli_query($conection,"SELECT * FROM comentario where id_post=$ida");
              while($posss = mysqli_fetch_array($pa)) { 
         
 
 
  ?>
  <p><?php echo $posss['comentario']; ?></p>
  <p>por <b><?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?></b></p>
  <p class="text-muted"><?php echo $posss['fecha'];?></p>
 <?php  } ?> <hr> 

</div>
</div>
 

</div>
</div>
</div>
<br><br><br><br> 
<br>
<hr>
<?php 
include 'header.php';

 ?>
 
  </body>
</html>
