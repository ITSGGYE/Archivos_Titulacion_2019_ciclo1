<?php

session_start();
include ("conn.php");
$codigo = $_GET['id'];
$query = "DELETE FROM historial WHERE id_historial = $codigo";
$stmt = $conn->query($query);
if ($stmt) {
    if ($_SESSION['rol'] == 2) {
        echo "<script>alert('ELIMINADO CON EXITO');</script>";
        echo "<script>window.location='act_historial_vet.php';</script>";
    } elseif ($_SESSION['rol'] == 1) {
        echo "<script>alert('ELIMINADO CON EXITO vet');</script>";
        echo "<script>window.location='act_historial.php';</script>";
    }
} else {
    echo "<script>alert(NO SE PUEDE ELIMINAR);</script>";
    echo "<script>window.location='act_historial.php';</script>";
}



