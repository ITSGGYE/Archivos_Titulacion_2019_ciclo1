<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
require_once 'conn.php';
require_once("header.php");

if (isset($_SESSION['user'])) {
    if ($_SESSION['rol'] == 2) {
        header('location: princ_vet.php');
    } elseif ($_SESSION['rol'] == 3) {
        header('location: princ_user.php');
    }
} else {
    header('location: index1.php');
}
?>

<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>SUPER DOC - SISTEMA VETERINARIO</title>


        <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
        <link rel="stylesheet" href="css/style-button.css?nocache=" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/style.css?nocache=" type="text/css" media="screen" />

        <script src="bootstrap/js/validarcampos.js"></script> 
    </head>

    <body>

        <form action="guardar_vet.php" method="POST">
            <table>
                <thead>
                    <tr>
                        <th colspan="3">REGISTRAR PERSONAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="tdatos">Tipo:</td>
                        <td>
                            <select name="user" onChange="window.open(this.options[this.selectedIndex].value, '_self')">

                                <option value="VETERINARIO"> </option>
                                <option value="reg_asist.php">VETERINARIO</option>
                                <option value="reg_usadm.php">ADMINISTRADOR</option>

                            </select>
                        </td>

                    </tr>

                </tbody>
            </table>
            <p>

        </form>

    </body>
</html>
