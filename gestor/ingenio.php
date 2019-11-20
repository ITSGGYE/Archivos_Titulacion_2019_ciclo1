<!DOCTYPE html>
<html lang="en">

<head>
<?php
include "header.php";
?>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/main.js"></script>
     <title>INGENIO</title>
</head>

<body>
    <div class="wrap">
        <ul class="tabs">
            <li><a href="#tab1"><span class="fas fa-brain"></span><span class="tab-text">SODOKU</span></a></li>
            <li><a href="#tab2"><i class="fab fa-buromobelexperte"></i><span class="tab-text">ROMPECABEZAS</span></a></li>
            <li><a href="#tab3"><i class="fas fa-memory"></i></span><span class="tab-text">JUEGOS DE MEMORIA</span></a></li>
            <li><a href="#tab4"><span class="fa fa-bookmark"></span><span class="tab-text">CRUCIGRMAS</span></a></li>
            <div class="me">
            <span class="fa fa-home"> <a href="panel-pdf.php">Menu</a>
            </div>
        </ul>
 </div>
        <div class="secciones">
            <article class="sodoku" id="tab1">
               <div class="contenedor">
                  <div class="box">
                      <div class="imgBx">
                          <img src="img/sodoku2.jpg">
                      </div>
                      <div class="content">
                          <h3>Descargar</h3>
                         <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal1"><span class="spinner-border spinner-border-sm"></span> VISUALIZAR</button>
                           
                      </div>
                  </div>
                   <div class="box">
                      <div class="imgBx">
                          <img src="img/sodoku1.jpg">
                      </div>
                      <div class="content">
                          <h3>Descargar</h3>
                         <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal2"><span class="spinner-border spinner-border-sm"></span> VISUALIZAR</button>
                           
                      </div>
                  </div>
                   <div class="box">
                      <div class="imgBx">
                          <img src="img/sodoku3.jpg">
                      </div>
                      <div class="content">
                          <h3>Descargar</h3>
                         <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal3"><span class="spinner-border spinner-border-sm"></span> VISUALIZAR</button>
                           
                      </div>
                  </div>
               </div>
               <!-- The Modal 1 -->
<div class="modal" id="myModal1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">SODOKU</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <embed src="cont-pdf/ingenio/sodoku/formasycolres.pdf" type="application/pdf" width="100%" height="400px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
               <!-- The Modal 2 -->
<div class="modal" id="myModal2">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">SODOKU</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <embed src="cont-pdf/ingenio/sodoku/GUIADELNINO.+3+sudokus+con+formas+y+colores.pdf" type="application/pdf" width="100%" height="400px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
                          <!-- The Modal 3 -->
<div class="modal" id="myModal3">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">SODOKU</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <embed src="cont-pdf/ingenio/sodoku/GUIADELNINO.+3+sudokus+con+n%C3%BAmeros+de+1+a+4.pdf" type="application/pdf" width="100%" height="400px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
            </article>
            <article id="tab2">
                 <div class="contenedor">
                  <div class="box">
                      <div class="imgBx">
                          <img src="img/Operaciones-variadas-01.png">
                      </div>
                      <div class="content">
                          <h3>Descargar</h3>
                         <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#rompecabezas1"><span class="spinner-border spinner-border-sm"></span> VISUALIZAR</button>
                           
                      </div>
                  </div>
                   <div class="box">
                      <div class="imgBx">
                          <img src="img/rompecabezas-divisiones-2.jpg">
                      </div>
                      <div class="content">
                          <h3>Descargar</h3>
                         <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#rompecabezas2"><span class="spinner-border spinner-border-sm"></span> VISUALIZAR</button>
                      </div>
                  </div>
                   <div class="box">
                      <div class="imgBx">
                          <img src="img/rompecabezas-sumas-restas.jpg">
                      </div>
                      <div class="content">
                          <h3>Descargar</h3>
                         <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#rompecabezas3"><span class="spinner-border spinner-border-sm"></span> VISUALIZAR</button>
                           
                      </div>
                  </div>
               </div>
               
               <!-- The Modal 1 -->
<div class="modal" id="rompecabezas1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">ROMPECABEZAS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <embed src="cont-pdf/ingenio/rompecabezas/rompecabezas%20d%20sumas%20y%20restas.pdf" type="application/pdf" width="100%" height="400px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
               <!-- The Modal 2 -->
<div class="modal" id="rompecabezas2">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">ROMPECABEZAS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <embed src="cont-pdf/ingenio/rompecabezas/Rompecabezas%20Divisiones.pdf" type="application/pdf" width="100%" height="400px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
                          <!-- The Modal 3 -->
<div class="modal" id="rompecabezas3">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">ROMPECABEZAS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <embed src="cont-pdf/ingenio/rompecabezas/rompecabezas%20d%20sumas%20y%20restas.pdf" type="application/pdf" width="100%" height="400px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
            </article>
            <article id="tab3">
                    <div class="contenedor">
                  <div class="box">
                      <div class="imgBx">
                          <img src="img/LABERITNOS.jpg">
                      </div>
                      <div class="content">
                          <h3>LABERINTO</h3>
                         <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#juego1"><span class="spinner-border spinner-border-sm"></span> VISUALIZAR</button>
                           
                      </div>
                  </div>
                   <div class="box">
                      <div class="imgBx">
                          <img src="img/sopa-numeros.jpg">
                      </div>
                      <div class="content">
                          <h3>SOPA DE NUMEROS </h3>
                         <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#juego2"><span class="spinner-border spinner-border-sm"></span> VISUALIZAR</button>
                      </div>
                  </div>
                   <div class="box">
                      <div class="imgBx">
                          <img src="img/diferencias-entre-conjuntos1.jpg">
                      </div>
                      <div class="content">
                          <h3>FIGURAS</h3>
                         <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#juego3"><span class="spinner-border spinner-border-sm"></span> VISUALIZAR</button>
                           
                      </div>
                  </div>
               </div>
                              <!-- The Modal 1 -->
<div class="modal" id="juego1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">LABERINTO</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <embed src="cont-pdf/juegos-memoria/Laberintos-para-ni%C3%B1os-de-5-a%C3%B1os.pdf" type="application/pdf" width="100%" height="400px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
               <!-- The Modal 2 -->
<div class="modal" id="juego2">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">SOPA DE NUMEROS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <embed src="cont-pdf/juegos-memoria/COLECCION-DE-SOPAS-MATEMATICAS-ORIENTACION-ANDUJAR.pdf" type="application/pdf" width="100%" height="400px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
                          <!-- The Modal 3 -->
<div class="modal" id="juego3">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">FIGURAS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <embed src="cont-pdf/juegos-memoria/que-figuras-faltan-en-el-otro-lado-1.pdf" type="application/pdf" width="100%" height="400px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
            </article>
            <article id="tab4">
                  <div class="contenedor">
                  <div class="box">
                      <div class="imgBx">
                          <img src="img/crusigrama-100.jpg">
                      </div>
                      <div class="content">
                          <h3>CRUSIGRAMA TABLA 100</h3>
                         <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#crusigrama1"><span class="spinner-border spinner-border-sm"></span> VISUALIZAR</button>
                           
                      </div>
                  </div>
                   <div class="box">
                      <div class="imgBx">
                          <img src="img/crusigrama-ooperaciones.png">
                      </div>
                      <div class="content">
                          <h3>OPERACIONES COMBINADAS</h3>
                         <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#crusigrama2"><span class="spinner-border spinner-border-sm"></span> VISUALIZAR</button>
                      </div>
                  </div>
                   <div class="box">
                      <div class="imgBx">
                          <img src="img/Crucigrama-de-Divisiones-para-Cuarto-Grado-de-Primaria.jpg">
                      </div>
                      <div class="content">
                          <h3>DIVISIONES</h3>
                         <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#crusigrama3"><span class="spinner-border spinner-border-sm"></span> VISUALIZAR</button>
                           
                      </div>
                  </div>
               </div>
                                             <!-- The Modal 1 -->
<div class="modal" id="crusigrama1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">TABLA 100</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <embed src="cont-pdf/crusigrama/Crucigramas-en-la-tabla-del-100-con-la-Pandilla-de-la-Rejilla.pdf" type="application/pdf" width="100%" height="400px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
               <!-- The Modal 2 -->
<div class="modal" id="crusigrama2">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">SOPA DE NUMEROS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <embed src="cont-pdf/crusigrama/Crucigramas%20matem%C3%A1ticos-convertido.pdf" type="application/pdf" width="100%" height="400px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
                          <!-- The Modal 3 -->
<div class="modal" id="crusigrama3">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">FIGURAS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <embed src="cont-pdf/crusigrama/Crucigrama-de-Divisiones-para-Cuarto-Grado-de-Primaria.pdf" type="application/pdf" width="100%" height="400px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
            </article>
        </div>
   
</body>

</html>
