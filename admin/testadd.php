<?php
session_start();
error_reporting(1);
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2>No has iniciado sesión. Ingresa para acceder a esta página.</h2>";
	echo "<a href=index.php><h3 align=center>Haga clic aquí para iniciar sesión</h3></a>";
	exit();
}
?>
<link href="css/quiz.css" rel="stylesheet" type="text/css">
<?php
require("../database.php");

include("header.php");


echo "<br><h2><div  class=head1>Agregar prueba</div></h2>";
if($_POST[submit]=='Save' || strlen($_POST['subid'])>0 )
{
extract($_POST);
$query3="insert into test(sub_id,test_nombre,total_que) values ('$subid','$testname','$totque')";
$rs3=mysqli_query($con,$query3)or die("no se registro error error");
echo "<p align=center>Test <b>\"$testname\"</b> Agregado exitosamente.</p>";

unset($_POST);
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.testname.value;
if (mt.length<1) {
alert("Por favor introduzca el nombre de la prueba");
document.form1.testname.focus();
return false;
}
tt=document.form1.totque.value;
if(tt.length<1) {
alert("Por favor ingrese la pregunta total");
document.form1.totque.value;
return false;
}
return true;
}
</script>
<form name="form1" method="post"  onSubmit="return check();">
  <table width="58%"  border="0" align="center">
    <tr>
      <td width="49%" height="32"><div align="left"><strong>Ingrese la ID del sujeto</strong></div></td>
      <td width="3%" height="5">  
      <td width="48%" height="32"><select name="subid">
<?php

$query2="SELECT * FROM temas order by  sub_name";
$rs2=mysqli_query($con,$query2)or die("Could Not Perform the Query");

	  while($row=mysqlI_fetch_array($rs2))
{
if($row[0]==$subid)
{
echo "<option value='$row[0]' selected>$row[1]</option>";
}
else
{
echo "<option value='$row[0]'>$row[1]</option>";
}
}
?>
      </select>
        
    <tr>
        <td height="26"><div align="left"><strong> Introduzca el nombre de la prueba </strong></div></td>
        <td>&nbsp;</td>
	  <td><input name="testname" type="text" id="testname"></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Ingrese la pregunta total </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="totque" type="text" id="totque"></td>
    </tr>
    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" value="Agregar" ></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
