<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz  - Result </title>
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
extract($_SESSION);


$rs=mysqli_query($conexion,"select t.test_nombre,t.total_que,r.fecha_test,r.puntuacion from test t, resultados r where
t.test_id=r.test_id and r.login='$login'") or die(mysqli_error());

echo "<h1 class=head1> RESULTADOS</h1>";
if(mysqli_num_rows($rs)<1)
{
	echo "<br><br><h1 class=head1> No has dado ninguna prueba</h1>";
	exit;
}
echo "<table class='table' border=1 align=center><tr class=style2><td width=300><font  class='text-warning' size=4>Nombre de la prueba </font><td> <font  class='text-warning' size=4>Total Pregunta </font>  <td> <font  class='text-warning' size=4>Score </font> ";
while($row=mysqli_fetch_row($rs))
{
echo "<tr class='success'><td ><font  class='text-warning' size=6>$row[0]</font> <td align=center> <font  class='text-warning' size=6>$row[1]</font> <td align=center> <font  class='text-warning' size=6>$row[3]</font>";
}
echo "</table>";
?>
</body>
</html>

