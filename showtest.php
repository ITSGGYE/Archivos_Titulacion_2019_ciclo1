<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>TEMA</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap -->
   <link href="hcss/bootstrap.min.css" rel="stylesheet" type="text/css" /><!-- INCLUYE AL BOSSTRAP ALA WEB -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   <script src="datespicker/css/datepicker.css"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->      
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript"></script>
</head>
</head>
<body>
<?php
include("header.php");
include("database.php");
extract($_GET);
$rs1=mysqli_query($conexion,"select * from temas where sub_id=$subid");
$row1=mysqli_fetch_array($rs1);
echo "<h1 align=center><font color=blue> $row1[1]</font></h1>";
$rs=mysqli_query($conexion,"select * from test where sub_id=$subid");
if(mysqli_num_rows($rs)<1)
{
	echo "<br><br><h2 class=head1>Sin cuestionario para este tema</h2>";
	exit;
}
echo "<h2 class=head1> Seleccione el nombre del concurso para dar el cuestionario</h2>";
echo "<table align=center class='table'>";

while($row=mysqli_fetch_row($rs))
{
	echo "<tr class='success'><td class='text-danger' align=center ><a href=quiz.php?testid=$row[0]&subid=$subid><font  class='text-warning' size=6>$row[2]</font></a>";
}
echo "</table>";
?>

</body>
</html>

