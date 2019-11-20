<?php
if (isset($_SESSION['user'])) {
    if ($_SESSION['rol'] == 1) {
        header('location: ./principal.php ');
    } elseif ($_SESSION['rol'] == 3) {
        header('location: ./princ_user.php ');
    }
}
include("header_vet.php");
?>

<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>SUPER DOC - SISTEMA VETERINARIO</title>


        <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
        <link rel="stylesheet" href="css/style-button.css?nocache=" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/style.css?nocache=" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/style-nave.css?nocache=" type="text/css" media="screen" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css?nocache=">


        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src='./scripts/inputs.js'></script>
        <script type="text/javascript">
            $(function () {
                $("#codigo").autocomplete({
                    source: "completar_paciente.php",
                    minLength: 2,
                    select: function (event, ui) {
                        event.preventDefault();
                        $('#codigo').val(ui.item.codigo);
                        $('#descripcion').val(ui.item.descripcion);
                        $('#especie').val(ui.item.especie);
                        $('#idpaciente').val(ui.item.idpaciente);
                    }
                });
            });
        </script>

    </head>

    <body>

        <?php
        date_default_timezone_set('America/Bogota');
        $script_tz = date_default_timezone_get();
        ?>

        <form action="guardar_historial_vet.php" method="POST">
            <table>
                <thead>
                    <tr>
                        <th colspan="3">HISTORIAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>PACIENTE</td>
                        <td><input onkeypress="return soloLetras(event);" id="codigo" name="paciente" placeholder="Escribir el nombre del paciente"/>
                        </td>
                    </tr>
                    <tr>
                        <td><input id="idpaciente" type="hidden" name="id_paciente" readonly="""/>
                        </td>
                    </tr>
                    <tr>
                        <td>DUEÑO / REPRESENTANTE</td>
                        <td><input name="representante" id="descripcion" readonly >
                        </td>
                    </tr>
                    <tr>
                        <td>ESPECIE</td>
                        <td><input name="especie" id="especie" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>FECHA</td>
                        <td><input type="text" readonly required name="fecha" value="<?php echo date("Y/m/d"); ?>"  />
                        </td>
                    </tr>
                    <tr>
                        <td>HORA</td>
                        <td><input type="text" readonly required name="hora" value="<?php echo date("H:i:s"); ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>TIPO DE ATENCIÓN</td>
                        <td>
                            <select name="tipo_atencion" required="">
                                <option value="">Seleccione</option>
                                <option value="consulta" <?php if (@$_REQUEST["atencion"] == "consulta") echo "selected" ?>>CONSULTA</option>
                                <option value="cita" <?php if (@$_REQUEST["atencion"] == "cita") echo "selected" ?>>CITA</option>
                                <option value="emergencia" <?php if (@$_REQUEST["atencion"] == "emergencia") echo "selected" ?>>EMERGENCIA</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>REGISTRO</td>
                        <td><textarea   rows="4" name="registro" cols="43"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>RECETA</td>
                        <td><textarea required="" rows="4" name="medicamento" cols="43"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>ATENDIDO POR</td>
                        <td>

                            <?PHP
                            include("conn.php");
                            $coneccion = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("Problemas al conectar el host :(");
                            mysqli_select_db($coneccion, $db_name) or die("error al conectar  a la base de datos :,(");
                            /* NOMBRE DEL PRODUCTO */
                            $consultap = " SELECT id_profesional,nombre_prof FROM profesional ORDER BY id_profesional asc ";
                            $resultadoProducto = mysqli_query($coneccion, $consultap);
                            ?>

                            <select required name="atendido">
                                <option  value=""  >ELIJA EL PROFESIONAL</option>
                                <?PHP
                                while ($fila = mysqli_fetch_row($resultadoProducto)) {
                                    echo "<option value='" . $fila['1'] . "'> " . $fila['1'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <button class="fill" type="submit" name="acc" value="Registrar">Registrar</button>
                            <button class="pulse" name="Restablecer" type="reset" value="Limpiar">Limpiar</button>
                    </tr>
                </tbody>
            </table>
            <p>

        </form>


    </body>
</html>
