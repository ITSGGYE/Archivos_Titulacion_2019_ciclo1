 <?php 
    if(isset($_POST['submit'])){
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usu'];
        $pass = $_POST['pass'];
        $correo = $_POST['correo'];
    }
 ?>
       <div class="contenedor-form">
        <div class="toggle">
            <span> Crear Cuenta</span>
        </div>
        
        <div class="formulario">
            <h2>Iniciar Sesión</h2>
            <form action="valida_login.php" method="post">
                <input type="text" placeholder="Usuario" name="usu" required>
                <input type="password" placeholder="Contraseña" name="pass" required>
                <input type="submit" value="Iniciar Sesión" name="enviar">
            </form>
             <?php
    include ("procesos/validar.php");
    ?>
        </div>
        
        <div class="formulario">
            <h2>Crea tu Cuenta</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <input type="text" placeholder="Nombres" name="nombre" value="<?php if(isset($nombre)) echo $nombre?>">
                 <input type="text" placeholder="Usuario" name="usu" value="<?php if(isset($usuario)) echo $usuario?>" >
                <input type="password" placeholder="Contraseña" name="pass" value="<?php if(isset($pass)) echo $pass?>" >
                <input type="email" placeholder="Correo Electronico" name="correo" value="<?php if(isset($correo)) echo $correo?>" >
                <input type="submit" value="Registrarse" name="submit">

          </form>
        </div>
        <div class="reset-password">
            <a href="#">Olvide mi Contraseña?</a>
        </div>
    </div>