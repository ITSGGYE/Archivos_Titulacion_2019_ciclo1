<?php
session_start();
?>
<!DOCTYPE HTML >
<html>
    <head>
        <title>Prueba en línea </title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="quiz.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" /><!-- INCLUYE AL BOSSTRAP ALA WEB -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="datespicker/css/datepicker.css"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->      
        <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
        <script type="text/javascript"></script>
    </head>
    <body>
        <?php
        include("header.php");
        include("database.php");
        echo "<h2 class=head1> Seleccione Asunto para dar cuestionario</h2>";

        $sql = "SELECT * FROM temas";
        $rs = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
        $count = mysqli_num_rows($rs);

        echo "<table align=center class='table'>";
        while ($row = mysqli_fetch_row($rs)) {
            echo "<tr class='success'><td align=center class='text-danger'><a  href=showtest.php?subid=$row[0]><font class='text-warning' size=6>$row[1]</font></a>";
        }
        echo "</table>";
        ?>
    </body>
</html>
