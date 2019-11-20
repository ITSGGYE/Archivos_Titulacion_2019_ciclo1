<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once("conn.php");
require_once("header.php");
?>

<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>HISTOVET - SISTEMA VETERINARIO</title>
        <link rel="stylesheet" href="css/style-button.css?nocache=" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/style-form.css?nocache=" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/style.css?nocache=" type="text/css" media="screen" />
    </head>

    <body>
        <form name="usuarios" action="guardar_asist.php" method="post">

            <table>
                <thead>
                    <tr>
                        <th colspan="3">DATOS DEL USUARIO</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td class="tdatos">Tipo:</td>
                        <td>
                            <select name="user" onChange="window.open(this.options[this.selectedIndex].value, '_self')">
                                <option value="reg_asist.php">VETERINARIO</option>
                                <option value="reg_usadm.php">ADMINISTRADOR</option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td class="tdatos">Login:</td>
                        <td><input type="text" name="email" value="" placeholder="Escribe el login.."  size="45"></td>

                    </tr>
                    <tr>
                        <td class="tdatos">Password:</td>
                        <td><input minlength="5" maxlength="8" type="password" name="password" value="" placeholder="" size="45"></td>

                    </tr>
                    <tr>
                        <td class="tdatos">Repetir Password:</td>
                        <td><input minlength="5" maxlength="8" type="password" name="r_password" value="" placeholder="" size="45"></td>

                    </tr>
                    <tr style="display:none">
                        <td class="tdatos">Rol:</td>
                        <td><input type="text" name="rol" value="2" placeholder="" size="45" readonly="readonly"></td>

                    </tr>
                <p>
                <tr>
                    <td colspan="2" align="center">
                        <button class="fill" type="submit" name="acc" value="Registrar">Registrar</button>
                        <button class="pulse" name="Restablecer" type="reset" value="Limpiar">Limpiar</button>
                </tr>

            </table>
        </form>


        <div class="buttons">
        </div>

    </body>
</html>
