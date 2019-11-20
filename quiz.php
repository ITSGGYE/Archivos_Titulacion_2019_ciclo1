<?php
session_start();
error_reporting(1);
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);
/* $rs=mysql_query("select * from mst_question where test_id=$tid",$cn) or die(mysql_error());
  if($_SESSION[qn]>mysql_num_rows($rs))
  {
  unset($_SESSION[qn]);
  exit;
  } */
if (isset($subid) && isset($testid)) {
    $_SESSION[sid] = $subid;
    $_SESSION[tid] = $testid;
    header("location:quiz.php");
}
if (!isset($_SESSION[sid]) || !isset($_SESSION[tid])) {
    header("location: index.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>PRUEBA ONLINE</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="quiz.css" rel="stylesheet" type="text/css">
    </head>

    <body>
<?php
include("header.php");
$query = "select * from mst_question";

$rs = mysqli_query($conexion, "select * from preguntas where test_id=$tid") or die(mysqli_error($conexion));
if (!isset($_SESSION[qn])) {
    $_SESSION[qn] = 0;
    mysqli_query($conexion, "delete from usuarios_preguntas WHERE sess_id='" . session_id() . "'") or die(mysql_error($conexion));
    $_SESSION[trueans] = 0;
} else {
    if ($submit == 'SIGUIENTE' && isset($ans)) {
        mysqli_data_seek($rs, $_SESSION[qn]);
        $row = mysqli_fetch_row($rs);
        mysqli_query($conexion, "insert into usuarios_preguntas(sess_id, test_id, que_des, pregunta1,pregunta2,pregunta3,pregunta4,respuesta,respuesta_usuario) values ('" . session_id() . "', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error($conexion));
        if ($ans == $row[7]) {
            $_SESSION[trueans] = $_SESSION[trueans] + 1;
        }
        $_SESSION[qn] = $_SESSION[qn] + 1;
    } else if ($submit == 'VER RESULTADO' && isset($ans)) {
        mysqli_data_seek($rs, $_SESSION[qn]);
        $row = mysqli_fetch_row($rs);
        mysqli_query($conexion, "insert into usuarios_preguntas(sess_id, test_id, que_des, pregunta1,pregunta2,pregunta3,pregunta4,respuesta,respuesta_usuario) values ('" . session_id() . "', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error($conexion));
        if ($ans == $row[7]) {
            $_SESSION[trueans] = $_SESSION[trueans] + 1;
        }
        echo "<h1 class=head1> Resultado</h1>";
        $_SESSION[qn] = $_SESSION[qn] + 1;
        echo "<Table align=center><tr class=tot><td> total Preguntas<td> $_SESSION[qn]";
        echo "<tr class=tans><td>Respuestas correctas<td>" . $_SESSION[trueans];
        $w = $_SESSION[qn] - $_SESSION[trueans];
        echo "<tr class=fans><td>Respuesta incorrecta<td> " . $w;
        echo "</table>";
        mysqli_query($conexion, "insert into resultados(login,test_id,fecha_test,puntuacion) values('$login',$tid,'" . date("d/m/Y") . "',$_SESSION[trueans])") or die(mysqli_error($conexion));

        unset($_SESSION[qn]);
        unset($_SESSION[sid]);
        unset($_SESSION[tid]);
        unset($_SESSION[trueans]);
        exit;
    }
}
$rs = mysqli_query($conexion, "select * from preguntas where test_id=$tid") or die(mysqli_error());
if ($_SESSION[qn] > mysqli_num_rows($rs) - 1) {
    unset($_SESSION[qn]);
    echo "<h1 class=head1>Algún error ocurrió</h1>";
    session_destroy();
    echo "Please <a href=index.php> Empezar de nuevo</a>";

    exit;
}
mysqli_data_seek($rs, $_SESSION[qn]);
$row = mysqli_fetch_row($rs);
echo "<form name='myfm' method='post' action=quiz.php>";
echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
$n = $_SESSION[qn] + 1;
echo "<tR><td><span class=style2>Que " . $n . ": $row[2]</style>";
echo "<tr><td class=style8><input type=radio name=ans value=1>$row[3]";
echo "<tr><td class=style8> <input type=radio name=ans value=2>$row[4]";
echo "<tr><td class=style8><input type=radio name=ans value=3>$row[5]";
echo "<tr><td class=style8><input type=radio name=ans value=4>$row[6]";

if ($_SESSION[qn] < mysqli_num_rows($rs) - 1)
    echo "<tr><td><input type=submit name=submit value='SIGUIENTE'></form>";
else
    echo "<tr><td><input type=submit name=submit value='VER RESULTADO'></form>";
echo "</table></table>";
?>
    </body>
</html>