<?php

 $conexion = mysqli_connect("localhost","root","","test");
 
	$id = $_GET['id_documento'];
	
	$sql = "DELETE FROM tbl_documentos WHERE id_documento = '$id'";
	
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