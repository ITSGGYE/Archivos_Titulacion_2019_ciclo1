<?php

require_once 'session_active.php';
include("conn.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
$email = $_POST['email'];
$passvet = md5($_POST['passvet']);
$r_passvet = md5($_POST['r_passvet']);
$user = $_POST['user'];
$rol = $_POST['rol'];

if (empty($email) || empty($passvet) || empty($r_passvet) || empty($rol)) {
    echo "<script>alert('Porfavor llene todos los campos');"
    . "window-location='reg_vet_user.php'";
} else {
    if ($passvet === $r_passvet) {
        $query = "INSERT INTO login (user,password,rol) VALUES ('$email','$passvet',$rol)";
        $stmt = $conn->query($query);
        if ($stmt) {
            echo "<script>alert('Registrado con Exito');</script>";
            echo "<script>window.location='reg_vet_user.php';</script>";
        } else {
            echo "<script>alert('¡Error! El Usuario ya Exite');</script>";
            echo "<script>window.location='reg_vet_user.php';</script>";
        }
    } else {
        echo "<script>alert('Las contraseñas deben ser iguales');</script>";
        echo "<script>window.location='reg_vet_user.php';</script>";
    }
}
}else{
    echo "<script>alert('El metodo de envio no es el correcto');</script>";
    sleep(100);
    header('location: reg_vet_user.php');
}
