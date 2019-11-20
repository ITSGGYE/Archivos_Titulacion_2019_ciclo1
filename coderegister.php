<?php

require_once "conexion.php";

//definir variable e inicializar con valores vacios
$username     = $email     = $contrasena     = "";
$username_err = $email_err = $contrasena_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //validando input de nombre de usuario
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor ingrese un nombre de usuario";
    } else {
        //prepare una declaracion de seleccion
        $sql = "SELECT id_clientes FROM clientes WHERE nombre = ?";

        if ($stmt = mysqli_prepare($conexion, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST["username"]);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Este usuario ya está registrado";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Ups, algo salió mal";
            }
        }
    }

    //validando input de email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Por favor ingrese un correo";
    } else {
        //prepare una declaracion de seleccion
        $sql = "SELECT id_clientes FROM clientes WHERE email = ?";

        if ($stmt = mysqli_prepare($conexion, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            $param_email = trim($_POST["email"]);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "Este correo ya está registrado";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Ups, algo salió mal";
            }
        }
    }

    //validando contrasena
    if (empty(trim($_POST["contrasena"]))) {
        $contrasena_err = "Por favor ingrese una contraseña";
    } elseif (strlen(trim($_POST["contrasena"])) < 4) {
        $contrasena_err = "La contraseña de tener al menos 4 caracteres";
    } else {
        $contrasena = trim($_POST["contrasena"]);
    }
    //comprobando los errores de entrada antes de insertar los datos en la base
    if (empty($username_err) && empty($email_err) && empty($contrasena_err)) {

        $sql = "INSERT INTO clientes (nombre, email, contrasena) VALUES (?, ?, ?)";
        if ($stmt = mysqli_prepare($conexion, $sql)) {
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_contrasena);

            //estableciendo paramentros
            $param_username    = $username;
            $param_email       = $email;
            $param_contrasena  = md5($contrasena);

            if (mysqli_stmt_execute($stmt)) {
                header("location: login.php");
            } else {
                echo "Algo salio mal";
            }
        }
    }

    mysqli_close($conexion);
}
