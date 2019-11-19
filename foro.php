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
<h2>Hola, <?php echo $_SESSION['nombre']; ?> <small>Estos son tus foros disponibles: </small></h2>

</div>
</div>
</div>
<section class="container">
<div class="row">
	<div class="col-md-12">



<br>
<br>
  <table class="table table-bordered table-hover datatable">
			<tr>
			<th>Foros</th>
      <th>Acciones</th>
 
			<th></th>
			</tr> 
				
		
		<?php

 $p = mysqli_query($conection,"SELECT * FROM categoria order by id_categoria");
              while($pos = mysqli_fetch_array($p)) { 

 
                ?>
       
                 <form method="POST" action="mostrarcontenido.php">
        
              	<tr>
              		<td><?php echo $pos['nombre']; ?></td>
                    <input class="btn btn-warning btn-xs" type="hidden" value="<?php echo $pos['id_categoria']; ?>" name="x">

                    <td><input class="btn btn-warning btn-xs" type="submit" value="Ingresar al Foro"></td>
              	</tr>
             </form>
                 <?php } ?>
                    
                	</table>
        
   </div>
</div>
   
            
</section>


<br>
<hr>
<?php 
include 'header.php';

 ?>
 
  </body>
</html>
