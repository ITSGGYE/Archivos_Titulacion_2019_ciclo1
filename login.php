<?php
session_start();
include 'lib/config.php';

if(isset($_SESSION['usuario']))
{
  header("Location: login.php");
}
?>
<!DOCTYPE html >
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Unidad Educativa Fiscal "Guayaquil"</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link rel="icon" type="image/png" href="images/ico.jpg"/>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
 
      <img src="images/ico.jpg">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">COLGYE</p>
    
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input autocomplete="off" type="text" class="form-control" placeholder="Usuario" name="usuario" pattern="[A-Za-z_-0-9]{1,20}">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="contrasena" pattern="[A-Za-z_-0-9]{1,20}">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <?php
    if(isset($_POST['login']))

    {

      $usuario = mysqli_real_escape_string($conection,$_POST['usuario']);
      $contrasena = md5(mysqli_real_escape_string($conection,$_POST['contrasena']));

      $query = mysqli_query($conection,"SELECT * FROM estudiantes WHERE cedula = '$usuario' AND pass = '$contrasena'");
      $contar = mysqli_num_rows($query);

$q = mysqli_query($conection,"SELECT * FROM admin WHERE user = '$usuario' AND pass = '$contrasena'");
      $c = mysqli_num_rows($q);
      
      if($contar == 1) 
      {
        while($row=mysqli_fetch_array($query)) 
        {
          if($usuario = $row['cedula'] && $contrasena = $row['pass'])
          {
            $_SESSION['usuario'] = $usuario;

            $_SESSION['id'] = $row['id_est'];
             $_SESSION['nombre'] = $row['nombre'];
             $_SESSION['apellido'] = $row['apellido'];  
            header('Location: index.php');
          }
        }
      } 
if($c == 1) 
      {
        while($r=mysqli_fetch_array($q)) 
        {
          if($usuario = $r['user'] && $contrasena = $r['pass'])
          {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['id'] = $r['id_admin'];
             $_SESSION['nombre'] = $r['nombre'];
                   header('Location: admin/index.php');
          }
        }
      } 

      else { echo 'Los datos ingresados no son correctos'; }
    }

    ?>

    <br>

  <!-- <a href="#">Olvidé mi contraseña</a><br>
    <a href="registro.php" class="text-center">Registrarme en REDSOCIAL</a>
-->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
