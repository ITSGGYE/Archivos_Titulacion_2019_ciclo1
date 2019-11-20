<?php
session_start();
require_once 'database.php';
?>
<!DOCTYPE HTML >
<html>
    <head>
        <title>EDUCACIÓN VIRTUAL</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="quiz.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/jpeg" href="images/icono.jpeg" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" /><!-- INCLUYE AL BOSSTRAP ALA WEB -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="css/datepicker.css"></script>
        <script type="text/javascript" src="js/keyboard.js" charset="UTF-8"></script>
        <link rel="stylesheet" type="text/css" href="css/keyboard.css">
        <link rel="stylesheet" href="css/jquery.keypad.css">
        <!-- Include all compiled plugins (below), or include individual files as needed -->      
        <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
    </head>
    <body>
        <?php
        include("header.php");
        extract($_POST);
        if (isset($submit)) {

            /*  $sql = "SELECT id FROM login WHERE usname = '$myusername' and pass = '$mypassword'";
              $result = mysqli_query($con,$sql);
              $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
              $active = $row['active'];

              $count = mysqli_num_rows($result);
             */
            $loginid = $_POST ['loginid'];
            $sql = "SELECT * FROM usuarios WHERE login='$loginid' ";
            $rs = mysqli_query($conexion, $sql);
            $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
            $count = mysqli_num_rows($rs);
            if ($count < 1) {
                $found = "N";
            } else {
                $_SESSION[login] = $loginid;
                
            }
            
        }
        if (isset($_SESSION[login])) {
            echo "<script>alert('bienvenido');</script>";
            echo "<h1 class='style8' align=center>Educación Virtual</h1>";
            echo '<table width="28%"  border="0" align="center">
  <tr>
    <td  width="7%" height="65" valign="bottom"><img src="image/HLPBUTT2.JPG" width="50" height="50" align="middle"></td>
    <td width="93%" valign="bottom" bordercolor="#0000FF"> <a href="sublist.php" class="alert alert-danger">ELIJA EL TEMA DEL CUESTIOARIO </a></td>
  </tr>
  
  <tr>
    <td height="58" valign="bottom"><img src="image/DEGREE.JPG" width="43" height="43" align="absmiddle"></td>
    <td valign="bottom"> <a href="result.php" class="alert alert-danger">Resultado </a></td>
  </tr>
</table>';

            exit;
        }
        ?>
        <table width="100%" border="0">
            <tr>
                <td width="70%" height="25">&nbsp;</td>

                <td width="29%" bgcolor="1d91d0"><div align="center" class="style1">Inicio de sesión del Estudiante </div></td>
            </tr>
            <tr>
                <td height="296" valign="top"><div align="center">
                        <h1 class="style8"> EDUCACIÓN VIRTUAL </h1>
                        <span class="style5"><img src="image/paathshala.jpg" width="129" height="100"><span class="style7"><img src="image/HLPBUTT2.JPG" width="50" height="50"><img src="image/BOOKPG.JPG" width="43" height="43"></span>        </span>
                        <param name="movie" value="english theams two brothers.dat">
                        <param name="quality" value="high">
                        <param name="movie" value="Drag to a file to choose it.">
                        <param name="quality" value="high">
                        <param name="BGCOLOR" value="#FFFFFF">
                        <p align="left" class="style5">&nbsp;</p>

                    </div></td>
                <td valign="top"><form name="form1" method="post" action="">
                        <table width="200" border="0">
                            <tr>
                                <td><span class="style2">CEDULA </span></td>
                                <td>   <input name="loginid" type="text" placeholder="Cedula" id="defaultKeypad" value="" maxlength=10 onKeyPress="if (((event.keyCode < 48 || event.keyCode > 57)))
                                            event.returnValue = false";/>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2"><span class="errors">
                                        <?php
                                        if (isset($found)) {
                                            echo "Usuario o contraseña invalido";
                                        }
                                        ?>
                                    </span></td>
                            </tr>
                            <tr>
                                <td colspan=2 align=center class="errors">
                                    <input name="submit" type="submit" id="submit" value="Login">		  </td>
                            </tr>
                            <tr>

                                <td colspan="2" bgcolor="#ffffff"><div align="center"><span class="style4">NUEVO ESTUDIANTE ? <a href="signup.php">REGISTRARSE</a> <br>     <a href="admin/index.php" target="_blank">INGRESO ADMINISTRADOR</a></span></div></td>

                            </tr>
                        </table>

                    </form></td>
            </tr>
        </table>
        <style>
            #inlineKeypad { width: 10em; }
        </style>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/jquery.plugin.min.js"></script>
        <script src="js/jquery.keypad.js"></script>
        <script>
                                    $(function () {
                                        $('#defaultKeypad').keypad();
                                        $('#inlineKeypad').keypad({onClose: function () {
                                                alert($(this).val());
                                            }});
                                    });
        </script>
    </body>
</html>
