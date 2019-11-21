<?php

 $conexion = mysqli_connect("localhost","root","","multimedia");
 
	$id = $_GET['media_id'];
	
	$sql = "DELETE FROM media WHERE media_id = '$id'";
	
    $resultado = mysqli_query($conexion,$sql);
$resultado = mysqli_query($conexion,$sql);

    if (!$resultado){
        echo 'error al Eliminar';
    } else {
        echo '<script>
                alert("Se registro eliminado exitosamente");
                window.history.go(-1);
              </script>';
        
    }
	
?>