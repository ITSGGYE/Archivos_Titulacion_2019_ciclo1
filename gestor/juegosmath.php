<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require 'header.php';
    ?>
    <link rel="stylesheet" href="css/descargas.css">
    <script src="js/flip.js"></script>
</head>

<body>
    <!-- Nav tabs -->
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">Multiplicar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">sumar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu2">Restar</a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="panel-pdf.php">Home</a>
            </li>
        </ul>
    </div>


    <!-- Tab panes -->
    <div class="contenido tab-content">
        <div class="tab-pane container active" id="home">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card card-flip h-100">
                            <div class="card-front text-white bg-dark">
                                <div class="card-body">
                                    <i class="fas fa-download fa-5x float-right"></i>
                                    <h3 class="card-title">FICHAS PDF</h3>
                                    <p class="card-text">Descarga de fichas de juegos de la tabla de multiplicar desde el 2 hasta el 9.</p>

                                </div>
                            </div>
                            <div class="card-back bg-white">
                                <div class="card-body">
                                    <h3 class="card-title">MULTIPLICACION</h3>
                                    <p class="card-text">Tabla del 1 y la del 2</p>
                                    <a href="cont-pdf/juegos-matematicos.pdf" download="multiplicacion" class="btn btn-outline-secondary">Descargar</a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        Visualizacion
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card card-flip h-100">
                            <div class="card-front text-white bg-warning">
                                <div class="card-body">
                                    <i class="fa fa-search-plus fa-5x float-right"></i>
                                    <h3 class="card-title">FICHAS PDF</h3>
                                    <p class="card-text">Descarga de fichas de juegos de la tabla de multiplicar desde el 2 hasta el 9.</p>
                                </div>
                            </div>
                            <div class="card-back bg-dark text-white">
                                <div class="card-body">
                                    <h3 class="card-title">MULTIPLICACION</h3>
                                    <p class="card-text">Tabla del 3</p>
                                    <a href="cont-pdf/Juegos-de-matematicas-tabla-del-3.pdf" download="multiplicacion" class="btn btn-outline-secondary">Descargar</a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal2">
                                        Visualizacion
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card card-flip h-100">
                            <div class="card-front text-white bg-primary">
                                <div class="card-body">
                                    <i class="fa fa-arrow-circle-right fa-5x float-right"></i>
                                    <h3 class="card-title">FICHAS PDF</h3>
                                   <p class="card-text">Descarga de fichas de juegos de la tabla de multiplicar desde el 2 hasta el 9.</p>
                                </div>
                            </div>
                            <div class="card-back bg-white">
                                <div class="card-body text-primary">
                                    <h3 class="card-title">MULTIPLICACION</h3>
                                     <p class="card-text">Tabla del 4</p>
                                    <a href="cont-pdf/Juego-de-la-tabla-del-4.pdf" download="multiplicacion" class="btn btn-outline-secondary">Descargar</a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal3">
                                        Visualizacion
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 my-3">
                        <div class="card card-flip h-100">
                            <div class="card-front text-white bg-dark">
                                <div class="card-body">
                                    <i class="fa fa-search fa-5x float-right"></i>
                                    <h3 class="card-title">FICHAS PDF</h3>
                                    <p class="card-text">Descarga de fichas de juegos de la tabla de multiplicar desde el 2 hasta el 9.</p>
                                </div>
                            </div>
                            <div class="card-back bg-white">
                                <div class="card-body">
                                   <h3 class="card-title">MULTIPLICACION</h3>
                                     <p class="card-text">Tabla del 5</p>
                                    <a href="cont-pdf/Juego-de-la-tabla-del-5.pdf" download="multiplicacion" class="btn btn-outline-secondary">Descargar</a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal4">
                                        Visualizacion
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 my-3">
                        <div class="card card-flip h-100">
                            <div class="card-front text-white bg-danger">
                                <div class="card-body">
                                    <i class="fa fa-search fa-5x float-right"></i>
                                    <h3 class="card-title">FICHA PDF</h3>
                                    <p class="card-text">Descarga de fichas de juegos de la tabla de multiplicar desde el 2 hasta el 9.</p>
                                </div>
                            </div>
                            <div class="card-back bg-white">
                                <div class="card-body">
                                     <h3 class="card-title">MULTIPLICACION</h3>
                                     <p class="card-text">Tabla del 6</p>
                                    <a href="cont-pdf/Juego-de-la-tabla-del-6.pdf" download="multiplicacion" class="btn btn-outline-secondary">Descargar</a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal5">
                                        Visualizacion
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 my-3">
                        <div class="card card-flip h-100">
                            <div class="card-front text-white bg-success">
                                <div class="card-body">
                                    <i class="fa fa-search fa-5x float-right"></i>
                                    <h3 class="card-title">Front</h3>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                </div>
                            </div>
                            <div class="card-back bg-white">
                                <div class="card-body">
                                    <h3 class="card-title">Back</h3>
                                    <p class="card-text">Suprise this one has more more more more content on the back!</p>
                                    <a href="#" class="btn btn-outline-secondary">Action</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--        SEGUNDO TAB-->
        <div class="tab-pane container fade" id="menu1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card card-flip h-100">
                            <div class="card-front text-white bg-dark">
                                <div class="card-body">
                                    <i class="fas fa-download fa-5x float-right"></i>
                                    <h3 class="card-title">SUMAS</h3>
                                    <p class="card-text"> Estos ejercicios de restas de iniciación fomentan en los niños la práctica inicial de las operaciones de sumar y restar de una forma entretenida y amena..</p>
                                </div>
                            </div>
                            <div class="card-back bg-white">
                                <div class="card-body">
                                    <h3 class="card-title">SUMAS</h3>
                                     <p class="card-text">Ejercicios 1</p>
                                    <a href="cont-pdf/suma/Ejercicios-de-sumas-1.pdf" download="multiplicacion" class="btn btn-outline-secondary">Descargar</a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suma1">
                                        Visualizacion
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card card-flip h-100">
                            <div class="card-front text-white bg-warning">
                                <div class="card-body">
                                    <i class="fa fa-search-plus fa-5x float-right"></i>
                                    <h3 class="card-title">SUMAS</h3>
                                    <p class="card-text"> Estos ejercicios de restas de iniciación fomentan en los niños la práctica inicial de las operaciones de sumar y restar de una forma entretenida y amena..</p>
                                </div>
                            </div>
                            <div class="card-back bg-dark text-white">
                                <div class="card-body">
                                    <h3 class="card-title">SUMAS</h3>
                                     <p class="card-text">Ejercicios 2</p>
                                    <a href="cont-pdf/suma/Ejercicios-de-sumas-2.pdf" download="multiplicacion" class="btn btn-outline-secondary">Descargar</a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suma2">
                                        Visualizacion
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card card-flip h-100">
                            <div class="card-front text-white bg-primary">
                                <div class="card-body">
                                    <i class="fa fa-arrow-circle-right fa-5x float-right"></i>
                                    <h3 class="card-title">SUMAS</h3>
                                    <p class="card-text"> Estos ejercicios de restas de iniciación fomentan en los niños la práctica inicial de las operaciones de sumar y restar de una forma entretenida y amena..</p>
                                </div>
                            </div>
                            <div class="card-back bg-white">
                                <div class="card-body text-primary">
                                  <h3 class="card-title">SUMAS</h3>
                                     <p class="card-text">Ejercicios 3</p>
                                    <a href="cont-pdf/suma/Sumas-con-llevadas-1.pdf" download="multiplicacion" class="btn btn-outline-secondary">Descargar</a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suma3">
                                        Visualizacion
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 my-3">
                        <div class="card card-flip h-100">
                            <div class="card-front text-white bg-dark">
                                <div class="card-body">
                                    <i class="fa fa-search fa-5x float-right"></i>
                                    <h3 class="card-title">SUMAS</h3>
                                    <p class="card-text"> Estos ejercicios de restas de iniciación fomentan en los niños la práctica inicial de las operaciones de sumar y restar de una forma entretenida y amena..</p>
                                </div>
                            </div>
                            <div class="card-back bg-white">
                                <div class="card-body">
                                     <h3 class="card-title">SUMAS</h3>
                                     <p class="card-text">Ejercicios 4</p>
                                    <a href="cont-pdf/suma/sumas-de-los-vegetales.pdf" download="multiplicacion" class="btn btn-outline-secondary">Descargar</a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suma4">
                                        Visualizacion
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 my-3">
                        <div class="card card-flip h-100">
                            <div class="card-front text-white bg-danger">
                                <div class="card-body">
                                    <i class="fa fa-search fa-5x float-right"></i>
                                    <h3 class="card-title">SUMAS</h3>
                                    <p class="card-text"> Estos ejercicios de restas de iniciación fomentan en los niños la práctica inicial de las operaciones de sumar y restar de una forma entretenida y amena..</p>
                                </div>
                            </div>
                            <div class="card-back bg-white">
                                <div class="card-body">
                                    <h3 class="card-title">SUMAS</h3>
                                     <p class="card-text">Ejercicios 5</p>
                                    <a href="cont-pdf/suma/Sumas-Iniciaci%C3%B3n.pdf" download="multiplicacion" class="btn btn-outline-secondary">Descargar</a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#suma5">
                                        Visualizacion
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 my-3">
                        <div class="card card-flip h-100">
                            <div class="card-front text-white bg-success">
                                <div class="card-body">
                                    <i class="fa fa-search fa-5x float-right"></i>
                                    <h3 class="card-title">Front</h3>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                </div>
                            </div>
                            <div class="card-back bg-white">
                                <div class="card-body">
                                    <h3 class="card-title">Back</h3>
                                    <p class="card-text">Suprise this one has more more more more content on the back!</p>
                                    <a href="#" class="btn btn-outline-secondary">Action</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--        TAB 3-->
        <div class="tab-pane container fade" id="menu2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card card-flip h-100">
                            <div class="card-front text-white bg-dark">
                                <div class="card-body">
                                    <i class="fas fa-download fa-5x float-right"></i>
                                    <h3 class="card-title">RESTAS</h3>
                                    <p class="card-text">Razonamiento matematico.</p>
                                </div>
                            </div>
                            <div class="card-back bg-white">
                                <div class="card-body">
                                    <h3 class="card-title">Back #2</h3>
                                    <p class="card-text">Suprise this one has content on the back!</p>
                                    <a href="#" class="btn btn-outline-secondary">Descargar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card card-flip h-100">
                            <div class="card-front text-white bg-warning">
                                <div class="card-body">
                                    <i class="fa fa-search-plus fa-5x float-right"></i>
                                    <h3 class="card-title">Front</h3>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                </div>
                            </div>
                            <div class="card-back bg-dark text-white">
                                <div class="card-body">
                                    <h3 class="card-title">Back #2</h3>
                                    <p class="card-text">Suprise this one has content on the back!</p>
                                    <a href="#" class="btn btn-outline-secondary">Action</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card card-flip h-100">
                            <div class="card-front text-white bg-primary">
                                <div class="card-body">
                                    <i class="fa fa-arrow-circle-right fa-5x float-right"></i>
                                    <h3 class="card-title">Front</h3>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content. This one is a little because it has more text!</p>
                                </div>
                            </div>
                            <div class="card-back bg-white">
                                <div class="card-body text-primary">
                                    <h3 class="card-title">Wow! #3</h3>
                                    <p class="card-text">Suprise this one has content on the back!</p>
                                    <a href="#" class="btn btn-outline-primary">Action</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 my-3">
                        <div class="card card-flip h-100">
                            <div class="card-front text-white bg-dark">
                                <div class="card-body">
                                    <i class="fa fa-search fa-5x float-right"></i>
                                    <h3 class="card-title">Front</h3>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                </div>
                            </div>
                            <div class="card-back bg-white">
                                <div class="card-body">
                                    <h3 class="card-title">Back</h3>
                                    <p class="card-text">Suprise this one has more more more more content on the back!</p>
                                    <a href="#" class="btn btn-outline-secondary">Action</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 my-3">
                        <div class="card card-flip h-100">
                            <div class="card-front text-white bg-danger">
                                <div class="card-body">
                                    <i class="fa fa-search fa-5x float-right"></i>
                                    <h3 class="card-title">Front</h3>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                </div>
                            </div>
                            <div class="card-back bg-white">
                                <div class="card-body">
                                    <h3 class="card-title">Back</h3>
                                    <p class="card-text">Suprise this one has more more more more content on the back!</p>
                                    <a href="#" class="btn btn-outline-secondary">Action</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 my-3">
                        <div class="card card-flip h-100">
                            <div class="card-front text-white bg-success">
                                <div class="card-body">
                                    <i class="fa fa-search fa-5x float-right"></i>
                                    <h3 class="card-title">Front</h3>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                </div>
                            </div>
                            <div class="card-back bg-white">
                                <div class="card-body">
                                    <h3 class="card-title">Back</h3>
                                    <p class="card-text">Suprise this one has more more more more content on the back!</p>
                                    <a href="#" class="btn btn-outline-secondary">Action</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- The Modal 1-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Multiplicacion</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <embed src="cont-pdf/juegos-matematicos.pdf" type="application/pdf" width="100%" height="300px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- The Modal 2-->
<div class="modal fade" id="modal2">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Multiplicacion</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <embed src="cont-pdf/Juegos-de-matematicas-tabla-del-3.pdf" type="application/pdf" width="100%" height="300px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- The Modal 3-->
<div class="modal fade" id="modal3">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Multiplicacion</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <embed src="cont-pdf/Juego-de-la-tabla-del-4.pdf" type="application/pdf" width="100%" height="300px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- The Modal 4-->
<div class="modal fade" id="modal4">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Multiplicacion</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <embed src="cont-pdf/Juego-de-la-tabla-del-5.pdf" type="application/pdf" width="100%" height="300px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- The Modal 5-->
<div class="modal fade" id="modal5">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Multiplicacion</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <embed src="cont-pdf/Juego-de-la-tabla-del-6.pdf" type="application/pdf" width="100%" height="300px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- The Modal sumas 1-->
<div class="modal fade" id="suma1">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Multiplicacion</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <embed src="cont-pdf/suma/Ejercicios-de-sumas-1.pdf" type="application/pdf" width="100%" height="300px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- The Modal sumas 2-->
<div class="modal fade" id="suma2">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Multiplicacion</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <embed src="cont-pdf/suma/Ejercicios-de-sumas-2.pdf" type="application/pdf" width="100%" height="300px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- The Modal sumas 3-->
<div class="modal fade" id="suma3">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Multiplicacion</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <embed src="cont-pdf/suma/Sumas-con-llevadas-1.pdf" type="application/pdf" width="100%" height="300px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- The Modal sumas 4-->
<div class="modal fade" id="suma4">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">SUMA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <embed src="cont-pdf/suma/sumas-de-los-vegetales.pdf" type="application/pdf" width="100%" height="300px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal sumas 5-->
<div class="modal fade" id="suma5">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">SUMA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <embed src="cont-pdf/suma/Sumas-Iniciaci%C3%B3n.pdf" type="application/pdf" width="100%" height="300px" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</body>

</html>
