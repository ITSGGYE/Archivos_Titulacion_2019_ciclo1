<?php
include("conn.php");
 $email = $_POST['email'];
 $passvet = md5($_POST['password']);
 $r_passvet = md5($_POST['r_password']);
 $user = $_POST['user'];
 $rol = $_POST['rol'];

if (empty($email) || empty($passvet) || empty($r_passvet) || empty($rol)) {
    echo "<script>alert('Porfavor llene todos los campos');"
    . "window-location='reg_asist.php'";
} else {
    if ($passvet === $r_passvet) {
        $query = "INSERT INTO login (user,password,rol) VALUES ('$email','$passvet',$rol)";
        $stmt = $conn->query($query);
        if ($stmt) {
            echo "<script>alert('Registrado con Exito');</script>";
            echo "<script>window.location='reg_asist.php';</script>";
        } else {
            echo "<script>alert('¡Error! El Veterinario ya Exite');</script>";
            echo "<script>window.location='reg_asist.php';</script>";
        }
    } else {
        echo "<script>alert('Las contraseñas deben ser iguales');</script>";
        echo "<script>window.location='reg_asist.php';</script>";
    }
}
