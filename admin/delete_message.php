<?php
$id = $_GET['id'];
require_once '../db/dbconn.php';
$query = "DELETE FROM contact WHERE contact_id = $id";
$stmt = $conn;
$stmt->query($query);
if($stmt){
    echo "<script>alert('Eliminado con Exito');"
    . "window.location='message.php';"
            . "</script>";
}else{
    echo "<script>alert('Error al Eliminar');"
    . "window.location='message.php';"
            . "</script>";
}
