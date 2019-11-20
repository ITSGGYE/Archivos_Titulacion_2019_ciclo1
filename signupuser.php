<!DOCTYPE HTML >
<html>
    <head>
        <title>REGISTRO DE ESTUDIANTE</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="quiz.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        include("database.php");
        include("header.php");
        $lid = $_POST['lid'];
        $nombre = $_POST['nombre'];


        $sql = "SELECT * FROM mst_user where login='$lid'";
        $rs = mysqli_query($conectar, $sql);
        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
        $count = mysqli_num_rows($rs);
        if ($count > 0) {
            echo "<br><br><br><div class=head1>Id de inicio de sesión ya existe</div>";
            exit;
        }

        $perfil = "estudiante";
        $estado = 0;
        $curso = "3ero de basica";
        $query = "INSERT into mst_user (login,nombre,curso,perfil,estado) values('$lid','$nombre','$curso','$perfil',$estado)";
        $ejecutar = mysqli_query($con, $query);
        //verificamos la ejecucion
        if ($ejecutar) {
            echo "<br><br><br><div class=head1>SU REGISTRO   $lid FUE EXITOSO </div>";
            echo "<br><div class=head1>INICIE SESION CON SU  CEDULA PARA RENDIR LA PRUEBA </div>";
            echo "<br><div class=head1><a href=index.php>INICIO</a></div>";
        } else {
            echo"Hubo Algun Error";
        }
        ?>
    </body>
</html>

