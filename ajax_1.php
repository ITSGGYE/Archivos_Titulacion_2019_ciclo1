<?php

include("php/conexion.php");
$conexion=conexion();
 $x_id=$_POST["id"];
//informacion de los productos
$cadena="SELECT video_id,
    video_titulo,
    video_url
FROM video
where video_id='$x_id'";


$result=mysqli_query($conexion,$cadena);
$registro=mysqli_fetch_row($result);
?>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Recetas</title>
</head>
<div class="modal-dialog" role="document" style="background:url(images/templatemo_hometop_bg.jpg)">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrar"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Recetario</h4>
      </div>
      <div class="modal-body">
      	
        <h1><?php echo $registro[1];?> </h1>
        
        <div class="embed-responsive embed-responsive-4by3">
        <?php echo $registro[2];?>
        </div>
      </div>
      
    </div>
  </div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#cerrar').click(function() {
  			$("iframe").each(function() { 
        		var src= $(this).attr('src');
        		$(this).attr('src',src);  
			});
	});
  });
        </script> 
</html>