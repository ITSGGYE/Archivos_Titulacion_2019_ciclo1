<?php
include("conn.php");
 $email = $_POST['email'];
 $passvet = md5($_POST['pasadmin']);
 $r_passvet = md5($_POST['r_pasadmin']);
 $user = $_POST['user'];
 $rol = $_POST['rol'];

if (empty($email) || empty($passvet) || empty($r_passvet)) {
    echo "<script>alert('Porfavor llene todos los campos');"
    . "window.location='reg_usadm.php'";
} else {
    if ($passvet === $r_passvet) {
        $query = "INSERT INTO login (user,password,rol) VALUES ('$email','$passvet',1)";
        $stmt = $conn->query($query);
        if ($stmt) {
            echo "<script>alert('Registrado con Exito');</script>";
            echo "<script>window.location='reg_usadm.php';</script>";
        } else {
            echo "<script>alert('¡Error! El Administrador ya Exite');</script>";
            echo "<script>window.location='reg_usadm.php';</script>";
        }
    } else {
        echo "<script>alert('Las contraseñas deben ser iguales');</script>";
        echo "<script>window.location='reg_usadm.php';</script>";
    }
}
