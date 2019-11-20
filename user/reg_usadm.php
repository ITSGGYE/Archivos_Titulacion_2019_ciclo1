<?php
error_reporting(E_ALL ^ E_DEPRECATED);


?>
<br />
<div class="titulo">REGISTRO DEL USUARIO</div>
<?php 
if (strtolower(@$_REQUEST["acc"])=="registrar"){
      if(@$_REQUEST["nombre"]!="" or @$_REQUEST["login"]!="" or @$_REQUEST["pass1"]!=""or @$_REQUEST["pass2"]!="" or @$_REQUEST["tipo"]!="" or @$_REQUEST["ced_prof"]!="" or @$_REQUEST["nombre_prof"]!="" or @$_REQUEST["tipo_prof"]!="" ){
      
  if (@$_REQUEST["pass1"]!=@$_REQUEST["pass2"]){
    cuadro_error("Las contraseñas introducidas no coinciden");
  }else{
  $pass = md5(@$_REQUEST["pass1"]);
  $sql_1 = mysql_query("insert into usuarios(login,tipo,nombre,password) values('".htmlentities(@$_REQUEST["login"])."','".htmlentities(@$_REQUEST["tipo"])."','".strtoupper(htmlentities(@$_REQUEST["nombre"]))."','".htmlentities($pass)."') ",$con);
    
  
  if(/*sql_1 and */sql_2)
  {
    echo"<br /><br />";
    cuadro_mensaje("Usuario Ingresado Correctamente. <b><a href=../index1.php target=\"_self\"> Volver a Inicio</a></b><br><br>");
    require("../header.php");
    exit;
  } else
  {
    cuadro_error(mysql_error());
  }
  }
}else
{
  cuadro_error("Debe llenar todos los campos.");
}

}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Flat Table</title>
  

      <link rel="stylesheet" href="../theme/css/style-button.css?nocache=" type="text/css" media="screen" />
      <link rel="stylesheet" href="../theme/css/style-form.css?nocache=" type="text/css" media="screen" />

  
</head>

<body>


  <form name="usuarios" action="reg_usadm.php" method="post">
  <table>
  <thead>
    <tr>
      <th colspan="3">DATOS DEL USUARIO</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="tdatos">Nombre:</td>
      <td><input type="text" name="nombre" value="<?php echo @$_REQUEST["nombre"]; ?>" size="45"></td>
      <td></td>
    </tr>
    <tr>
      <td class="tdatos">Login:</td>
      <td><input type="text" name="login" value="<?php echo @$_REQUEST["login"]; ?>" onchange="this.form.submit()" size="45"></td>
      <td></td>
    </tr>

<tr>
  <td class="tdatos">Password:</td>
  <td><input type="password" name="pass1" value="" size="45"></td>
</tr>
<tr>
  <td class="tdatos">Repetir Password:</td>
  <td><input type="password" name="pass2" value="" size="45"></td>
</tr>
<tr>
  <td class="tdatos">Tipo:</td>
  <td>
    <select name="tipo">
      <option value="ADMINISTRADOR">ADMINISTRADOR</option>
      <option value="ASISTENTE">ASISTENTE</option>
    </select>
  </td>
  <td></td>
</tr><p>
<tr>
  <td colspan="2" align="center"><button class="fill" type="submit" name="acc" value="Registrar">Registrar</button>
  <button class="pulse" name="Restablecer" type="reset" value="Limpiar">Limpiar</button>
</tr>
  
</table>
</form>
  

  <div class="buttons">

  
  

</div>
  
</body>
</html>
