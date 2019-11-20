<?php
session_start();
require_once 'conn.php';
$id = $_GET['id'];
$query = "DELETE FROM login WHERE id = $id";
$stmt = $conn->query($query);
if($stmt == 1){
       if ($_SESSION['rol'] == 2) {
        echo "<script>alert('ELIMINADO CON EXITO');</script>";
        echo "<script>window.location='act_cliente_vet.php';</script>";
    } elseif ($_SESSION['rol'] == 1) {
        echo "<script>alert('ELIMINADO CON EXITO');</script>";
        echo "<script>window.location='act_cliente_adm.php';</script>";
    }
}else{
    echo "error";
}
