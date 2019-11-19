<?php
session_start();
include 'lib/config.php';
include 'lib/socialnetwork-lib.php';

 

if(!isset($_SESSION['usuario']))
{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html class="no-js">
<head>
<?php 
include 'head.php';

 ?>
 
  </head>
 
<?php include 'navar.php'; ?>
 

<div class="container">
<div class="row">
<div class="col-md-12">

  <h5 style="text-align: center;   font-family: verdana;
  font-size: 20px; color: blue;" >Simulador Examen Ser Bachiller del Senescyt</h5><br><br> 
<h4 style="text-align: center;   font-family: verdana;
  font-size: 18px; color: black;" >Prepárate con los simuladores para el Examen Ser Bachiller. </h4>
<h4 style="  font-family: verdana;
  font-size: 18px; color: black;" >Recomendaciones: </h4>
<p>Ten a la mano una hoja, un lapíz y un borrador para que puedas resolver los ejercicios.</p>
<p>Ponte en un lugar despejado para que puedas realizar el Simulador sin interrupciones.</p>
<p>Cada Simulador consta de 30 preguntas con 40 minutos de duración, a excepción Simulador Ser Bachiller Completo que consta de 160 preguntas y 180 minutos de duración.</p>
<p>Selecciona un simulador. </p>
  <br>
  <div class="wow fadeInUp col-md-3 col-sm-3" data-wow-delay="1s">
            <div class="blog-thumb">
               <a href="https://www.jovenesweb.com/snna/simulador"><img width="100px" src="images/s.png"   alt="Blog"></a><br><br> 
                1.  Practica y aprende con preguntas del Senescyt para el Examen Ser Bachiller, encuentra simuladores, formas, cuestionarios, respuestas de las preguntas y más.
            </div>

        </div>

 

          <div class="wow fadeInUp col-md-3 col-sm-3" data-wow-delay="1s">
            <div class="blog-thumb">
               <a href="https://www.daypo.com/"><img width="100px" src="images/s.png"   alt="Blog"></a><br><br> 
               2. Daypo está dedicada a crear tests online. Con esta página podrás crear tus propios tests de autoaprendizaje, repitiéndolos hasta que los memorices y lo mejor de todo, totalmente gratis. Tu test puede servir a mucha otra gente que quiera aprender lo mismo que tú.
            </div>

        </div>

          <div class="wow fadeInUp col-md-3 col-sm-3" data-wow-delay="1s">
            <div class="blog-thumb">
               <a href="https://www.evaluacion.gob.ec/evaluaciones/wp-content/uploads/2017/07/F001.pdf"><img width="100px" src="images/pdf.png"   alt="Blog"></a><br><br> 
 3. PDF Preguntas para resolver del ser bachiller 
            </div>

        </div>

 <div class="wow fadeInUp col-md-3 col-sm-3" data-wow-delay="1s">
            <div class="blog-thumb">
               <a href="https://serbachiller.evaluacion.gob.ec/simulador/login"><img width="200px" src="images/ser.png"  alt="Blog"></a><br><br>  
               4. Puedes inscribirte directamente para rendir el examen ser bachiller o realizar simuladores del examen es 100% digital y contiene 160 preguntas (de las cuales 5 son piloto) distribuidas en los siguientes campos de evaluación:
 <br> Dominio Matemático
  <br>  Dominio Lingüístico
  <br>  Dominio Científico
  <br>  Dominio Social
  <br>  Aptitud Abstracta

            </div>

        </div>

<br>  
     

</div>
</div> <br><br>    <br>  <br>  <br><?php 
include 'header.php';

 ?>
</div> 
  </body>
</html>
