<?php
require_once '../conexion.php';

$id=$_POST["id"];
$fecha1=$_POST["fecha1"];
$fecha2=$_POST["fecha2"];
$estudiante=$_POST["estudiante"];
$estado="0";

	$sql = "INSERT into prestamo_libro (fecha_prestamo, fecha_entrega, id_libro, id_usuario_estudiante, estado) 
		values('$fecha1','$fecha2','$id','$estudiante', '$estado')";
	
	$ejecutar=mysqli_query($conexion,$sql) or die (mysqli_error($conexion));

			if($ejecutar){ 
				$peticion = ("UPDATE libros SET disponible = 'no' WHERE id_libro = '$id'");
                 $resultado = mysqli_query($conexion,$peticion);
            if ($resultado ==true) {
	    echo '<script> alert("Se ha prestado el libro.");</script>';
   echo '<script> window.location="../prestar_libro.php"; </script>';
}
  else {
  	 echo '<script> alert("Error al prestar el libro.");</script>';
  	 	echo '<script> window.location="../prestar_libro.php"; </script>';
  }

				
				}else {
					echo '<script> alert("HUBO ALGUN ERROR.");</script>';
					echo '<script> window.location="../prestar_libro.php"; </script>';
					}
?>
