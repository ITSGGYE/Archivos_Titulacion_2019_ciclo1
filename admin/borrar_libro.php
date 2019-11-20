<?php include ('conexion.php');?>
<?php
$id=$_POST['id']; 
	$borrar=mysqli_query($conexion, "DELETE from libros where id_libro=$id");
	if ($borrar) {
		    echo '<script> alert("Se ha borrado exitosamente.");</script>';
            echo '<script> window.location="Lista_libros.php"; </script>';
			}
    else
    {
    	 echo '<script> alert("Error al borrar.");</script>';
         echo '<script> window.location="Lista_libros.php"; </script>';
		
    }
?>
