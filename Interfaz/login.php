<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=decive-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    <title>Iniciar - Logros</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/x-svg" href="img/logo.jpeg">
</head>
<body>
  	<form class="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="login">
        <h2>Centro Terapeutico Integral</h2>
        <img src="img/logo.jpeg">
        <input type="text" name="usuario" placeholder="&#128272;Usuario" class="bordes" autofocus/>
        <input type="password" name="password" placeholder="&#128273;Contraseña" class="bordes"/>
        <input type="submit" value="Ingresar"></input>
         <?php  if(!empty($errores)): ?>
          <ul>
              <?php echo $errores; ?>
          </ul>
        <?php  endif; ?>
    </form>
</body>
</html>