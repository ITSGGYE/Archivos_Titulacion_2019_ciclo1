<?php session_start();
   require './head/head.php';
?>
<body>
    <header>
        <div class="menu_bar">
            <a href="#" class="bt-menu"><i class="fas fa-align-justify"></i>Menu</a>
        </div>
<a href=""></a>
        <nav>
            <ul>
                <li><a href="#"><i class="fas fa-home"></i> INICIO</a></li>
                <li><a href="media.php"><i class="fab fa-youtube"></i> VIDEOS</a></li>
                <li><a href="gestor/index.php"><i class="fas fa-cogs"></i> RECURSOS</a></li>
                <li><a href="juegos/matematicas/juegos.html"><i class="fas fa-child"></i> JUEGOS</a></li>
                <li><a href="cerrar.php"><i class="fas fa-sign-out-alt"></i> SALIR</a></li>
            </ul>
        </nav>
    </header>
    <center>
        <section>
            <div class="flip-box flip-up">
            <div class="object">
                <div class="front">
                <img src="image/aritmrtica-portada.gif" alt="">
                </div>
                <div class="back">
                  <h1 class="relieve">ARITMETICA</h1>
                </div>
                <div class="flank"></div>
            </div>
        </div>
         <div class="flip-box alternative">
            <div class="object">
                <div class="front">
                    <img src="image/geometria.jpg" alt="">
                </div>
                <div class="back">
                   <h1 class="relieve">GEOMETRIA</h1>
                </div>
                <div class="flank"></div>
            </div>
        </div><!-- /.flip-box -->
         <div class="flip-box flip-up">
            <div class="object">
                <div class="front">
                <img src="image/recursos.png" alt="">
                </div>
                <div class="back">
                       <h1 class="relieve">RECURSOS MATEMATICOS</h1>
                </div>
                <div class="flank"></div>
            </div>
        </div>
         <div class="flip-box alternative">
            <div class="object">
                <div class="front">
                    <img src="image/juegos-matematicos.jpg" alt="">
                </div>
                <div class="back">
                   
                    <h1 class="relieve">JUEGOS MATEMATICOS</h1>
                   <a href="">juegos.html</a>
                </div>
                <div class="flank"></div>
            </div>
        </div><!-- /.flip-box -->
        </section>

    </center>

</body>

</html>
