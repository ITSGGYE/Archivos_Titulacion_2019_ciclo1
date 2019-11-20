<?php
session_start();
error_reporting(1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Prueba en línea del área administrativa </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../quiz.css" rel="stylesheet" type="text/css">
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
extract($_POST);
if(isset($submit))
{
	include("../database.php");
	
      $sql = "SELECT * FROM admin WHERE loginid='$loginid' and pass='$pass'";
	$rs=mysqli_query($conexion,$sql);
  $row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
    $count = mysqli_num_rows($rs);
	if($count<1)
	{
				echo "<BR><BR><BR><BR><div class=head1> Usuario o contraseña invalido<div>";
		exit;
	}
$_SESSION['alogin']="true";
	
}
else if(!isset($_SESSION[alogin]))
{
	echo "<BR><BR><BR><BR><div class=head1>Usted no se ha identificado<br> Por favor <a href=index.php>Login</a><div>";
		exit;
}
?>

<p class="head1">Bienvenido al área administrativa </p>
<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left">
<div style="margin-left:20%;padding-top:5%">

<p class="style7"><a href="subadd.php"><font  class='text-danger' size=6>Añadir tema</font></a></p>
<p class="style7"><a href="testadd.php"><font  class='text-danger' size=6>Agregar prueba</font></a></p>
<p class="style7"><a href="questionadd.php"><font  class='text-danger' size=6>Agregar pregunta</font> </a></p>
<p align="center" class="head1">&nbsp;</p>
</div>
</div>
</body>
</html>


