<?php

require_once 'conn.php';

 $usuario = $_POST['mail'];
 $password = md5($_POST['pass']);

$query = "SELECT * FROM login WHERE user = '$usuario' AND password = '$password'";
$stmt = $conn->query($query);
$fetch = $stmt->fetch_array(MYSQLI_ASSOC);

if ($fetch['user'] === $usuario) {
    if ($fetch['password'] === $password){
        session_start();
        $_SESSION['user'] = $usuario;
        $_SESSION['rol'] = $fetch['rol'];
        if($_SESSION['rol'] == 1){
            echo "<script>alert('Bienvenido Querido Administrador');"
        . "window.location = 'principal.php';</script>";
        }elseif ($_SESSION['rol'] == 2) {
            echo "<script>alert('Bienvenido Querido Veterinario');"
        . "window.location = 'princ_vet.php';</script>";
        }elseif ($_SESSION['rol'] == 3) {
             echo "<script>alert('Bienvenido Querido Paciente');"
        . "window.location = 'princ_user.php';</script>";
        }
    } else {
        echo "<script>alert('La contraseña no es Correcto');"
        . "window.location = 'index1.php';</script>";
    }
} else {
    echo "<script>alert('El usuario no es Correcto');"
    . "window.location = 'index1.php'</script>";
}