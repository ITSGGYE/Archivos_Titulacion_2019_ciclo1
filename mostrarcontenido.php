 <?php
session_start();


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
<h1>Articulos en  </h1>
 
 
<br><br>
<div class="panel panel-default">
	<?php $ida=$_POST['x'];

	 $ps = mysqli_query($conection,"SELECT * FROM categoria where id_categoria=$ida");
              while($poss = mysqli_fetch_array($ps)) { 
             $nombre=$poss['nombre'];

            
$p = mysqli_query($conection,"SELECT * FROM post where id_categoria=$ida ORDER BY fecha DESC");
              while($pos = mysqli_fetch_array($p)) { 
             $titulo=$pos['titulo'];
             $image=$pos['image'];
             $fecha=$pos['fecha'];
$ac=$pos['id_post'];
             

 


	?>
<div class="panel-heading">Materia <?php echo $nombre; ?></div>
<div class="panel-body">
	
<table class="table">
 
	<tr>
	<td style="width: 200px; "> 
			<img src="uploads/<?php echo $image; ?>" class="img-responsive" style="width: 200px; ">
 
	</td>
		<td>

			<h4><a href="" ><?php echo $titulo; ?></a></h4>
			<p>Para <b><?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?></b></p>
			<p class="text-muted"><?php echo $fecha; ?></p>
<form method="POST" action="comentar.php">
              <input class="btn btn-warning btn-xs" type="hidden" value="<?php echo $ac; ?>" name="f">
 
            <input class="btn btn-warning btn-xs" type="submit" value="Comentar"> 
 
		</td>
	</tr> 
</table> 
	 

             </form><?php  } }	?>	
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
