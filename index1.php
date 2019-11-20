<?php
session_start();

if (isset($_SESSION['user'])) {
    if ($_SESSION['rol'] == 1) {
        //echo "<script>alert('ADMIN');</script>";
        header('location: ./principal.php ');
    } elseif ($_SESSION['rol'] == 2) {
        header('location: ./princ_vet.php');
        //echo "<script>alert('VETERINARIO');</script>";
    } elseif ($_SESSION['rol'] == 3) {
        header('location: ./pric_user.php');
        //echo "<script>alert('Usuario');</script>";
    }
}
?>

<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>SISTEMA VETERINARIO - SUPER DOC</title>
        <link rel="stylesheet" href="css/ident.css?nocache=" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/boton.css" type="text/css" media="screen" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css" type="text/css" media="screen" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    </head>

    <body class="align">
        <div class="grid">
            <center><h2>¡SISTEMA VETERINARIO SUPER DOC!</h2>
                <img src="images/pata.png" class="pata" width="50%" /></center></td>
        <form action="validar.php" method="POST" class="form login">
            <div class="form__field">
                <label for="login__username">
                    <svg class="icon">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use>
                    </svg>
                    <span class="hidden">Usuario</span></label>
                <input id="login__username" type="text" name="mail" class="form__input" placeholder="Usuario" required>
            </div>

            <div class="form__field">
                <label for="login__password">
                    <svg class="icon">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use>
                    </svg>
                    <span class="hidden">Contraseña</span></label>
                <input id="login__password" type="password" name="pass" class="form__input" placeholder="Contraseña" required>
            </div>

            <div class="form__field">
                <input id="botoncito" type="submit" value="INGRESAR">
            </div>
        </form>
    </div>

        <?php include 'footer.php'; ?>
        <style>
            @media screen and (min-width: 332px) and (max-width: 720px) {
                #botoncito{
                    width: 100%;
                    margin-bottom: 5%;
                }
                body{
                    max-height: 100%;
                }
                .grid{
                    margin-top: 12%;
                    margin-bottom: 34%;
                }
                footer{
                    margin-top: 5%;
                }
            }
        </style>
</body>
</html>
