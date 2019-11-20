<!DOCTYPE html>
<html lang="en">
      <head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
           <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- App CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
          <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="css/bootstrap.css">
           <!-- FONT AWESONME 5 -->
           <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
            <!-- estilos animate.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
           <!-- estilos personalizados-->
          <link rel="stylesheet" href="css/estilo.css">

          <title>Punto Frio</title>
          <script src="https://www.google.com/recaptcha/api.js" async defer></script>
           <style>
            .bg-dark{
            transition: all 1s ease;
      }   </style>
      </head>
      <body>

      <!-- barra de navegacion -->
          <nav id="menu" class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: #0000004f;">
              <div class="fixed-top"></div>
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
                            <a class="dropdown-item" href="login.php"><i class="fas fa-user-shield"></i>    Login</a>
                          </div>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Contactos</a>
                        </li>
                      </li>
                  </ul>
              </div>
          </nav>

          <!-- sigueme -->
       <section id="acerca-de">
         <div class="contenido-seccion">
           <div class="container">
             <div class="col-md-6">
               <div class="texto-acerca-de">
                 <h3> Punto Frio Automotríz</h3>
                 <p class="lead">
                   En Punto Frio podemos atenderte en cualquier tipo de avería o mantenimiento que necesite tu vehículo. Nuestros profesionales son expertos técnicos en cualquier marca y precisamente nuestra extensa experiencia será la mejor garantía de que en nuestro taller encontrarás la mejor solución.
                 </p>
                 <p>
                   Nuestro taller cuenta con una ubicación privilegiada, estacionamiento, horario accesible e instalaciones limpias. Todo esto en un ambiente profesional, brindando así seguridad y comodidad.
                 </p>
                 <h3>Sígueme</h3>
                 <a target="_blank" href="http://facebook.com/isaacsuarezkpr" class="btn btn-sm btn-primary wow fadeInRightBig">facebook</a>
                 <a target="_blank" href="http://instagram.com/puntofrioec" class="btn btn-sm btn-success wow fadeInLeftBig">Instagram</a>
                 <a target="_blank" href="http://youtube.com/punto frio automotris" class="btn btn-sm btn-danger wow bounceInUp">Youtube</a>
               </div>
             </div>
           </div>
         </div>
       </section>

    <section id="contactenos" class="container-fluid badge-info">
      <div class="row wow fadeInUpBig">
            <div class="col-lg-6">
                <h2 class="text-center m-t-0">Contáctenos</h2>
                <p class="text-center font-13 m-b-15">
                    Cdla Albonor Mz. 7 Solar. 20
                </p>
                <div class="p-20">
                    <form action="enviar.php" method="POST">
                        <div class="form-group">
                            <label for="userName">Nombre y Apellido<span class="text-danger">*</span></label>
                            <input type="text" pattern="[a-z A-Z]*" name="nombre" parsley-trigger="change" required
                             placeholder="Nombre" maxlength="20" class="form-control" id="userName">
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Correo<span class="text-danger">*</span></label>
                            <input type="email" name="email" parsley-trigger="change" required
                              placeholder="Email" class="form-control" id="emailAddress">
                            </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <div>
                              <input data-parsley-type="alphanum" type="number" min="0" name="telefono" 
                                class="form-control" required 
                                placeholder="Teléfono" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mensaje</label>
                            <div>
                                <textarea required class="form-control" name="mensaje"></textarea>
                            </div>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6Le3-q4UAAAAAKo_E_zPzk2tEjk6JLezI1-N6e79"></div>
                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-secondary waves-effect waves-light" type="submit">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>

          <div class="col-md-6">
            <div> 
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.0807321132406!2d-79.90270718567037!3d-2.122608837707827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d6d46385d0513%3A0x286f198b4fe0faf5!2sPunto+Frio!5e0!3m2!1ses!2sec!4v1559483833001!5m2!1ses!2sec" width="600" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
      </div><!-- end col-->
    </section>
  

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
             <li><a href="inicio.php#empresa">Acerca de</a></li>
             <li><a href="inicio.php#acerca-de">Punto Frio Automotríz</a></li>
             <li><a href="">Contáctenos</a></li>
           </ul>
         </div>

         <div class="col-sm-3">
           <ul class="list-unstyled">
             <li><a target="_blank" href="http://facebook.com/isaacsuarezkpr"><i class="fab fa-facebook"> facebook</i></a></li>
             <li><a target="_blank" href="http://instragram.com/puntofrioec"><i class="fab fa-instagram"> Instragram</i></a></li>
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
   <script src="https://code.jquery.com/jquery-2.2.4.min.js"  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="  crossorigin="anonymous"></script>
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
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

    <script>
      $(function() {
        $('#userName').keydown(function (e) {
          if (e.shiftKey || e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
            if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
              e.preventDefault(); 
            }
          }
        });
     });
    </script>
  </body>
</html>