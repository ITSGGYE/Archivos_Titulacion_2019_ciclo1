<?php
include("function/login.php");
include("function/customer_signup.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>La Bodeguita</title>
        <link rel="icon" href="img/logo.jpg" />
        <link rel = "stylesheet" type = "text/css" href="css/style.css" media="all">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery-1.7.2.min.js"></script>
        <script src="js/carousel.js"></script>
        <script src="js/button.js"></script>
        <script src="js/dropdown.js"></script>
        <script src="js/tab.js"></script>
        <script src="js/tooltip.js"></script>
        <script src="js/popover.js"></script>
        <script src="js/collapse.js"></script>
        <script src="js/modal.js"></script>
        <script src="js/scrollspy.js"></script>
        <script src="js/alert.js"></script>
        <script src="js/transition.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/inputs.js"></script>
    </head>
    <body>
        <div id="header">
            <img src="img/logo.jpg">
            <label>Sistema de Ventas Online La Bodeguita</label>
            <ul>
                <li><a href="#Regístrate"   data-toggle="modal">Regístrate</a></li>
                <li><a href="#Iniciar_sesión"   data-toggle="modal">Iniciar sesión</a></li>
            </ul>
        </div>
        <div id="Iniciar_sesión" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 id="myModalLabel">Iniciar sesión...</h3>
            </div>
            <div class="modal-body">
                <form method="post">
                    <center>
                        <input type="email" name="email" placeholder="Email" style="width:250px;">
                        <input type="password" name="contrasena" placeholder="Contraseña" style="width:250px;">
                    </center>
            </div>
            <div class="modal-footer">
                <input class="btn btn-primary" type="submit" name="Iniciar_sesión" value="Iniciar sesión">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                </form>
            </div>
        </div>

        <div id="Regístrate" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 id="myModalLabel">Registro de cliente...</h3>
            </div>
            <div class="modal-body">
                <center>
                    <form method="post">
                        <input onkeypress="return soloLetras(event);" type="text" name="primer_nombre" placeholder="Primer nombre" required>
                        <input onkeypress="return soloLetras(event);" type="text" name="segundo_nombre" placeholder="Segundo nombre" required>
                        <input onkeypress="return soloLetras(event);" type="text" name="apellido" placeholder="Apellido" required>
                        <input onkeypress="return soloMail(event);" type="text" name="direccion" placeholder="Dirección" style="width:430px;"required>
                        <input onkeypress="return soloLetras(event);" type="text" name="pais" placeholder="Provincia" required>
                        <input onkeypress="return soloMail(event);" type="text" name="codigo_postal" placeholder="Código postal" required maxlength="6">
                        <input onkeypress="return soloNumeros(event);" type="text" name="movil" placeholder="Número de Celular" maxlength="13">
                        <input onkeypress="return soloNumeros(event);" type="text" name="telefono" placeholder="Número de Teléfono" maxlength="7">
                        <input onkeypress="return soloMail(event);" type="email" name="email" placeholder="Email" required>
                        <input type="password" name="contrasena" placeholder="Contraseña" required><br><br>
                        <input type="radio" name="terminos" value="YES" required> <a href="#Terminos" data-toggle="modal">TERMINOS Y CONDICIONES</a>
                </center>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" name="Regístrate" value="Regístrate">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
            </div>
        </form>
    </div>

    <div id="Terminos" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <span>SI REALIZAS DOS COMPRAS FRAUDULENTAS TU CUENTA SERA SUSPENDIDA</span><br>
        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>

    </div>

    <style media="screen">
        #Terminos{
            margin-top: 5%;
            max-height: 150px;
            width: 200px;
            text-align: center;
            margin-left: 1%;
            margin-right: 2%;
            background-color: #FACDC4;
            padding-top: 1%;
            padding-left: 1%;
            padding-right: 1%;
            padding-bottom: 1%;
        }
        span{
            font-weight: bold;
            font-size: 1rem;
        }
    </style>

    <br>
    <div id="container">
        <div class="nav">

            <ul>
                <li><a href="index.php"><i class="icon-home"></i>Inicio</a></li>
                <li><a href="Bebidas.php"><i class="icon-th-list"></i>Productos</a>
                <li><a href="aboutus.php"><i class="icon-bookmark"></i>Acerca de Nosotros</a></li>
                <li><a href="contactus.php"><i class="icon-inbox"></i>Contacto</a></li>
                <li><a href="faqs.php"><i class="icon-question-sign"></i>Preguntas frecuentes</a></li>
            </ul>
        </div>

        <div id="carousel">
            <div id="myCarousel" class="carousel slide">
                <div class="carousel-inner">
                    <div class="active item" style="padding:0; border-bottom:0 solid #111;"><img src="img/banner1.jpg" class="carousel"></div>
                    <div class="item" style="padding:0; border-bottom:0 solid #111;"><img src="img/banner2.jpg" class="carousel"></div>
                    <div class="item" style="padding:0; border-bottom:0 solid #111;"><img src="img/banner3.jpg" class="carousel"></div>
                </div>
                <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
            </div>
        </div>

        <div id="video">
            <video controls autoplay width="445px" height="300px">
                <source src="video/commercial.mp4" type="video/mp4">
            </video>
        </div>

        <div id="content">
            <div id="product" style="position:relative; margin-top:30%;">
                <center><h2><legend>Ofertas</legend></h2></center>
                <br />

                <?php
                $query = mysqli_query($conn, "SELECT *FROM product WHERE category='Ofertas' ORDER BY product_id DESC") or die(mysqli_error());

                while ($fetch = mysqli_fetch_array($query)) {

                    $pid = $fetch['product_id'];

                    $query1 = mysqli_query($conn, "SELECT * FROM stock WHERE product_id = '$pid'") or die(mysqli_error());
                    $rows = mysqli_fetch_array($query1);

                    $qty = $rows['qty'];
                    if ($qty <= 5) {
                        
                    } else {
                        echo "<div class='float'>";
                        echo "<center>";
                        echo "<a href='details.php?id=" . $fetch['product_id'] . "'><img class='img-polaroid' src='photo/" . $fetch['product_image'] . "' height = '300px' width = '300px'></a>";
                        echo " " . $fetch['product_name'] . "";
                        echo "<br />";
                        echo "$" . $fetch['product_price'] . "";
                        echo "<br />";

                        echo "</center>";
                        echo "</div>";
                    }
                }
                ?>
            </div>

        </div>

        <br />
    </div>
    <br />
    <div id="footer">
        <div class="foot">
            <label style="font-size:17px;"> Copyright &copy; </label>
            <p style="font-size:25px;">La Bodeguita <?php echo $YEAR = date('Y'); ?></p>
        </div>

        <div id="foot">
            <h4>Enlaces con redes sociales</h4>
            <ul>
                <a href="https://www.facebook.com/BodeguitaOficial/"><li><img src="./facebook.png" width="20px" alt="">&nbsp;&nbsp;&nbsp;Facebook</li></a><br>
                <a href="https://www.instagram.com/bodeguitaoficial/"><li><img src="./instagram.png" width="20px" alt="">&nbsp;&nbsp;&nbsp;Instagram</li></a>
            </ul>
        </div>
    </div>
</body>
</html>
