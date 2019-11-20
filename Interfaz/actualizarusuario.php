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
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="login">
             <h2>EDITAR USUARIOS</h2><br/>
 <input type="hidden" name="id" value="<?php echo $user['id'];?>" />
 <input type="text" name="usuario" placeholder="Usuario" value="<?php echo $user['usuario'];?>" autofocus/>
 <input type="password" name="password" placeholder="Contraseña"/>
 <input type="password" name="password2" placeholder="Repita la contraseña" />
 <input type="text" name="nombres" placeholder="Nombres" value="<?php echo $user['nombres'];?>"/>
<input type="text" name="apellidos" placeholder="Apellidos" value="<?php echo $user['apellidos'];?>"/>
<input type="text" name="roll" placeholder="" value="<?php echo $user['Roll'];?>"/>
<input type="submit" value="Registrar" />
      <?php  if(!empty($errores)): ?>
               <ul>
       <?php echo $errores; ?>
               </ul>
        <?php  endif; ?>
     </form>
  <a class="btn-regresar" href="usuarios.php">Regresar</a>
				</article>
	</section>
</body>
</html>
</html>