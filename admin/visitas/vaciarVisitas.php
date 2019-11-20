 <?php 

include('../conexion.php');

	$cad="truncate table visitas";
	mysqli_query($conexion,$cad) or die("Error al Borrar");

	  echo '<script> alert("Se ha eliminado todad las visitas.");</script>';
	  echo '<script> window.location="../visitas.php"; </script>';
	 
 ?>