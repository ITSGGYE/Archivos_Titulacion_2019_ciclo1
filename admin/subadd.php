<?php
session_start();
require("../database.php");
include("header.php");
error_reporting(1);
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php

extract($_POST);

echo "<BR>";
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2><div  class=head1>No has iniciado sesión. Ingresa para acceder a esta página.</div></h2>";
	echo "<a href=index.php><h3 align=center>Haga clic aquí para iniciar sesión</h3></a>";
	exit();
}
echo "<BR><h3 class=head1>Asunto Agregar</h3>";

echo "<table width=100%>";
echo "<tr><td align=center></table>";
if($submit=='submit' || strlen($subname)>0 )
{


      $sql = "SELECT * FROM temas WHERE sub_name='$subname'";
  $rs=mysqli_query($conexion,$sql);
  $row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
    $count = mysqli_num_rows($rs);
  if($count>0)
  {
    echo "<br><br><br><div class=head1>El sujeto ya existe
</div>";
  exit;
  }
$query="insert into temas(sub_name) values ('$subname')";
$rs2=mysqli_query($conexion,$query)or die("No se pudo realizar la consulta");
echo "<p align=center>Subject  <b> \"$subname \"</b> Agregado exitosamente.</p>";
$submit="";


}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.subname.value;
if (mt.length<1) {
alert("Por favor ingrese el nombre del sujeto");
document.form1.subname.focus();
return false;
}
return true;
}
</script>

<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left">
<title>Add Subject</title>
<form name="form1" method="post" onSubmit="return check();">
  <table width="41%"  border="0" align="center">
    <tr>
      <td width="45%" height="32"><div align="center"><strong>Ingrese el nombre del sujeto</strong></div></td>
      <td width="2%" height="5">  
      <td width="53%" height="32">
        <input name="subname" placeholder="ingrese el nombre del idioma" type="text" id="subname">
    <tr>
        <td height="26"> </td>
        <td>&nbsp;</td>
	  <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" value="Agregar" ></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</div>