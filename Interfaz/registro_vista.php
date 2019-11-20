<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Usuarios - CentroLogros</title>
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="icon" type="image/x-icon" href="img/logo.jpeg">
</head>
<body>
<?php include 'arriba/header.php'; ?>
  <section class="main">
    <div class="wrapp">
      <?php include 'arriba/nav.php'; ?>
        <article>
          <div class="mensaje">
            <h2>USUARIOS</h2>
          </div>
          <form class="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="login">
              <h2>REGISTRAR USUARIOS</h2><br/>
          <input type="text" name="usuario"placeholder="Usuario" autofocus/>
          <input type="password" name="password" placeholder="Contraseña" />
          <input type="password" name="password2" placeholder="Repita su contraseña" />
          <input type="text" name="nombres" placeholder="Nombres" />
          <input type="text" name="apellidos" placeholder="Apellidos" />
           <select name="roll">
               <option value="Administrador">Administrador</option>
               <option value="Especialista">Especialista</option>
               <option value="Recepcionista">Recepcionista</option>
                            </select>
                            <input type="submit" value="Registrar" />
                            <?php  if(!empty($errores)): ?>
                              <ul>
                                  <?php echo $errores; ?>
                              </ul>
                            <?php  endif; ?>
                          </form> 
        </article>
  </section>

</body>
</html>