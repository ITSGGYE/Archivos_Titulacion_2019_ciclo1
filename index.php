<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: casa.php');
    }else{
        header('location: login.php');
    }


?>