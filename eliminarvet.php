<?php 
include ("conn.php"); 
$codigo= $_GET['id'];
$query = "DELETE FROM historial WHERE id_historial = $codigo";
$stmt = $conn->query($query);
if($stmt){
    echo "<script>alert('ELIMINADO CON EXITO');</script>";
    echo "<script>window.location='act_historial_vet.php';</script>";
}else{
    echo "<script>alert(NO SE PUEDE ELIMINAR);</script>";
    echo "<script>window.location='act_historial_vet.php';</script>";
}
?>