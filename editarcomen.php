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
 
 
 
 
<section class="container">
 
   <?php include 'lib/config.php'; 

$id=$_POST['id'];
							$query_categoria=mysqli_query($conection,"select * from comentarios where id_com='".$id."';");
							while($rw=mysqli_fetch_array($query_categoria))	{
								?>
				 	 

							 <form name="elimina" method="post" action="ejercer.php">
<input type="hidden" name="ida" value="<?php echo $rw['id_com']; ?>">
<input type="text" name="nombre" value="<?php echo $rw['comentario']; ?>">
<button   type="submit" class="btn btn-danger btn-xs"onclick="pregunta()" data-toggle="modal" data-target=""></form>
Editar
</button>			<?php
							}
							?>
     
      <script language="JavaScript">
function pregunta(){
    if (confirm('¿Estas seguro que deseas editar el contenido?')){
       document.elimina.submit()
    }
}
</script>  
   
            
</section>


<br>
<hr>
<?php 
include 'header.php';

 ?>
 
  </body>
</html>




