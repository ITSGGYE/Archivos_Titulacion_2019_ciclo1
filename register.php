<?php  

     include 'coderegister.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
         <!-- FONT AWESONME 5 -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <!-- estilos animate.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <!-- estilos personalizados-->
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" href="css/index.css">

    <title>Punto Frio</title>

    <style>
      .bg-dark{
        transition: all 1s ease;
      }
    </style>
  </head>
  <body>

     <!-- barra de navegacion -->
     
      <nav id="menu" class="navbar navbar-expand-lg navbar-dark fixed-top">
          <a class="navbar-brand" href="#">
            <img src="img/13.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
          </a>
          <a class="navbar-brand" href="http://instragram.com/puntofrioec"> Punto Frio A.</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto ">
              <li class="nav-item active">
                <a class="nav-link" href="inicio.php">Inicio <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="empresa.php">Nosotros</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Registro
                </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="login.php">Login</a>
                    <a class="dropdown-item" href="registrar.php">Clientes</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="descargas.php">Descargas</a>
                  </div>
                <li class="nav-item">
                <a class="nav-link" href="contactos.php">Contactos</a>
              </li>
              </li>
            </ul>
          </div>
      </nav>
    
       <div class="modal-dialog text-center">
         <div class="col-sm-8 main-section">
           <div class="contenido-modal">
             <div class="col-12 user-img">
               <img src="img/login3.png">
             </div>
             <h1 class="text-primary">Registrarse</h1>
             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="col-12" id="user-group">
               <div class="form-group">
                 <input type="text" name="username" class="form-control" placeholder="Nombre de Usuario"/>
                 <span class="msg-error"><?php echo $username_err; ?></span>
               </div>
               <div class="form-group">
                 <input type="email" name="email" class="form-control" placeholder="Email"/>
                 <span class="msg-error"><?php echo $email_err; ?></span>
               </div>
               <div class="form-group">
                 <input type="password" name="contrasena" class="form-control" placeholder="Contraseña"/>
                 <span class="msg-error"><?php echo $contrasena_err; ?></span>
               </div>
               <button type="submit" value="Registrarse" class="btn btn-primary">   Registrarse</button>
             </form>
             <div class="col-12 forgot">
               <a href="login.php">Iniciar Sesión</a>
             </div>
           </div>
         </div>
       </div>
<br><br><br><br><br>
   <!--footer -->
   <footer id="footer">
     <div class="container">
       <div class="row">
         <div class="col-sm-3">
           <p>2019 <i class="far fa-copyright"></i>Creado por Punto Frio</p>
           <p>Desarrollo <a href="http://instragram.com/j_psuarez">JpSuárez</a></p>
         </div>

         <div class="col-sm-3">
           <ul class="list-unstyled">
             <li><a href="">Inicio</a></li>
             <li><a href="#empresa">Acerca de</a></li>
             <li><a href="#acerca-de">Punto Frio Automotríz</a></li>
             <li><a href="contactos.php#contactenos">Contáctenos</a></li>
           </ul>
         </div>

         <div class="col-sm-3">
           <ul class="list-unstyled">
             <li><a target="_blank" href="http://facebook.com/isaacsuarezkpr"><i class="fab fa-facebook"> facebook</i></a></li>
             <li><a target="_blank" href="http://instragram.com/puntofrioec"><i class="fab fa-instagram"> Instagram</i></a></li>
             <li><a target="_blank" href=""><i class="fab fa-youtube"> Youtube</i></a></li>
           </ul>
         </div>

          <div class="col-sm-3">
             <h6>Visítanos</h6>
             <p><i class="far fa-clock"></i> De Lunes a Viernes: 8:00am - 7:00pm.</p>
             <p><i class="far fa-clock"></i> Sábado: 8:00am - 5:00pm.</p>
         </div>
       </div>
     </div>
   </footer>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="  crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/wow.min.js" type="text/javascript"></script>
    <script>
          new WOW().init();
    </script>
    <script>
      $(window).scroll(function(){
        if ($("#menu").offset().top > 500) {
          $("#menu").addClass("bg-dark");
        }else{
          $("#menu").removeClass("bg-dark");
        } 
      });
    </script>
  </body>
</html>