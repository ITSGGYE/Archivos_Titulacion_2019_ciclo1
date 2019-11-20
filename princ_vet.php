<?php
session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['rol'] == 1) {
        header('location: ./principal.php ');
    } elseif ($_SESSION['rol'] == 3) {
        header('location: ./princ_user.php ');
    }
}
?>


<?php include "conexion.php"; ?>

<!DOCTYPE html>

<html lang="en">


    <header>

        <?php include("header_vet.php"); ?>

    </header>

    <body>

    <center>

        <p><div class="text3">

            <p>¡BIENVENIDO VETERINARIO!<p>

                <img src="images/vet.png" class="vet"  width= "400px" height="400px" />

                </center>

        </div>
        <br>
        <br>
        <br>





        </body>

