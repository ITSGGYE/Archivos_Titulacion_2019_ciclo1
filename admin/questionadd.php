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
if (!isset($_SESSION[alogin]))
{
	echo "<br><h2><div  class=head1>No has iniciado sesión. Ingresa para acceder a esta página.</div></h2>";
	echo "<a href=index.php><h3 align=center>Haga clic aquí para iniciar sesión</h3></a>";
	exit();
}
echo "<BR><h3 class=head1>Agregar pregunta </h3>";
if($_POST[submit]=='Save' || strlen($_POST['testid'])>0 )

extract($_POST);
$query3="insert into preguntas(test_id,que_desc,pregunta1,pregunta2,pregunta3,pregunta,respuesta) values ('$testid','$addque','$ans1','$ans2','$ans3','$ans4','$anstrue')";

$rs3=mysqli_query($conexion,$query3)or die("no se registro error error");
echo "<p align=center>Pregunta agregada con éxito.</p>";

unset($_POST)


?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.addque.value;
if (mt.length<1) {
alert("Por favor ingrese la pregunta");
document.form1.addque.focus();
return false;
}
a1=document.form1.ans1.value;
if(a1.length<1) {
alert("Por favor ingrese respuesta 1");
document.form1.ans1.focus();
return false;
}
a2=document.form1.ans2.value;
if(a1.length<1) {
alert("Por favor ingrese respuesta 2");
document.form1.ans2.focus();
return false;
}
a3=document.form1.ans3.value;
if(a3.length<1) {
alert("Por favor ingrese respuesta 3");
document.form1.ans3.focus();
return false;
}
a4=document.form1.ans4.value;
if(a4.length<1) {
alert("Por favor ingrese respuesta 4");
document.form1.ans4.focus();
return false;
}
at=document.form1.anstrue.value;
if(at.length<1) {
alert("Por favor ingrese la respuesta verdadera");
document.form1.anstrue.focus();
return false;
}
return true;
}
</script>

<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left">
<form name="form1" method="post" onSubmit="return check();">
  <table width="80%"  border="1" align="center">
    <tr>
      <td width="24%" height="32"><div align="left"><strong>Seleccionar nombre de prueba </strong></div></td>
      <td width="1%" height="5">  
      <td width="75%" height="32"><select name="testid" id="testid">
<?php
$query2="SELECT * FROM test order by test_name";
$rs2=mysqli_query($conexion,$query2)or die("Could Not Perform the Query");

    while($row=mysqlI_fetch_array($rs2))



{
if($row[0]==$testid)
{
echo "<option value='$row[0]' selected>$row[2]</option>";
}
else
{
echo "<option value='$row[0]'>$row[2]</option>";
}
}
?>
      </select>
        
    <tr>
        <td height="26"><div align="left"><strong> Entrar pregunta </strong></div></td>
        <td>&nbsp;</td>
	    <td><textarea name="addque" cols="60" rows="2" id="addque"></textarea></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Entrar respuesta 1 </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="ans1" type="text" id="ans1" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Entrar respuesta 2 </strong></td>
      <td>&nbsp;</td>
      <td><input name="ans2" type="text" id="ans2" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Entrar respuesta 3</strong></td>
      <td>&nbsp;</td>
      <td><input name="ans3" type="text" id="ans3" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Entrar respuesta 4</strong></td>
      <td>&nbsp;</td>
      <td><input name="ans4" type="text" id="ans4" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Ingrese la respuesta verdadera </strong></td>
      <td>&nbsp;</td>
      <td><input name="anstrue" type="text" id="anstrue" size="50" maxlength="50"></td>
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