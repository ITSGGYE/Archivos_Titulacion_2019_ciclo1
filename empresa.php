<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
     <!-- FONT AWESONME 5 -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
     <!-- estilos personalizados-->
    <link rel="stylesheet" href="css/estilo.css">

    <title>Punto Frio</title>
     <style>
      .bg-dark{
        transition: all 1s ease;
      }
    </style>
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
                <a class="nav-link" href="#">Nosotros</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Registro
                </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="login.php"><i class="fas fa-user-shield"></i>    Login</a>
                  </div>
                <li class="nav-item">
                <a class="nav-link" href="contactos.php">Contactos</a>
              </li>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    
    <!-- foto de la empresa  -->
    <div class="container">
          <div class="col-12">
            <img src="img/14.jpg" alt="">
          </div>
    </div>

    <!-- barra de navegacion -->
    <section id="">
        <div class="container">
          <h2 class="text-center p-4 text-success">¿Quiénes somos?</h2>
          <div class="row">
            <div class="col-sm-6"><img src="img/15.jpg" alt="" class="img-fluid rounded"></div>
            <div class="col-sm-6"><img src="img/17.jpg" width="490" alt="" class="img-fluid rounded"></div>  
            <p class="text-md-center col-md-6"> Satisfacer la necesidades de los clientes en el sistema de refrigeración y climatización del vehiculo en el menor tiempo posible comprometido con la garantia del trabajo responsable en resolver sus problemas.</p>
            <p class="text-md-center col-md-6">Ser un taller de refrigeración y climatización lider y confiable en el servicio automotriz con los mejore equipos, herramientas y sistemas computarizados con el mejor personal eficaz y eficiente.</p>
          </div> 
          
         </div>        
    </section>

    <!-- barra del footer -->
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
             <li><a href="contactos.php#contactenos">Contáctenos</a></li>
           </ul>
         </div>

         <div class="col-sm-3">
           <ul class="list-unstyled">
             <li><a target="_blank" href="http://facebook.com/isaacsuarezkpr"><i class="fab fa-facebook"> facebook</i></a></li>
             <li><a target="_blank" href="http://instragram.com/puntofrioec"><i class="fab fa-instagram"> Instragram</i></a></li>
             <li><a target="_blank"href=""><i class="fab fa-youtube"> Youtube</i></a></li>
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