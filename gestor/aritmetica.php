<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/videos.css">
    <?php
include "header.php";
?>

    <script src="js/main.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="wrap">
        <ul class="tabs">
            <li><a href="#tab1"><span class="fas fa-brain"></span><span class="tab-text">SUMA DE DECIMALES</span></a></li>
            <li><a href="#tab2"><i class="fab fa-buromobelexperte"></i><span class="tab-text">RESTA DE DECIMALES</span></a></li>
            <li><a href="#tab3"><i class="fas fa-memory"></i></span><span class="tab-text">MULTIPLICACION DE DECIMALES</span></a></li>
            <li><a href="#tab4"><span class="fa fa-bookmark"></span><span class="tab-text">DIVICION DE DECIMALES</span></a></li>
            <div class="me">
                <span class="fa fa-home"> <a href="panel-pdf.php">Menu</a>
            </div>
        </ul>
    </div>
    <div class="secciones">
        <article id="tab1" class="decimales">
            <div class="contenido">
                <h1>SUMA DE NUMEROS DECIMALES</h1>
                <div class="texto">
                    <p>En este post vamos a ver cómo se realiza una suma con números decimales.

                        Lo más importante a la hora de sumar decimales es colocar los números decimales en la posición correcta para sumarlos de la forma adecuada. Para eso tenemos que hacer que coincidan las unidades en la misma columna, por lo tanto la coma de los números debe estar también en la misma columna.

                        Primer ejercicio de suma con números decimales
                        52,7 + 4,6</p>
                    <img src="img/aritmetica/Suma-de-n%C3%BAmeros-decimales.png" alt="">
                    <p>Una vez colocado, tan solo nos queda sumar los dos números: se suman de la misma manera que los números sin coma, y al terminar la suma se coloca la coma en la misma posición.

                    </p>
                    <img src="img/aritmetica/Suma-de-n%C3%BAmeros-decimales-2.png" alt="">
                </div>

            </div>

        </article>
        <article id="tab2">
            <h1>RESTA DE DECIAMLES</h1>
            <p>Vamos a restar 9,756 – 8,27. Por lo tanto, tendremos que poner las unidades debajo de las unidades, las décimas debajo de las décimas, las centésimas debajo de las centésimas, y así con todos los números a restar, tal y como muestra la imagen.</p>
            <img src="img/aritmetica/resta-decimales.jpg" alt="">
            <p>Como 8,27 no tiene milésimas se puede poner un 0 para que nos sea más sencillo realizar la operación. Y ya podemos proceder a realizar la resta, escribiendo la coma en la misma posición. El resultado sería 1,486</p>

        </article>
        <article id="tab3">
            <h1>MULTIPLICACION</h1>
            <p>Para multiplicar un número decimal por un número entero, se multiplica como si el número decimal fuera un número entero.

                En el resultado se separan tantas cifras decimales como tenía el número decimal.</p>
            <img src="img/aritmetica/multiplicaciones-con-decimales-4.png" alt="">
            <p>Al realizar la multiplicación de 74,15 x 3, primero multiplicamos como si no existiesen los decimales, 7415 x 3

                Una vez terminada la multiplicación, contamos que 74,15 tiene dos decimales, por lo que ponemos una coma contando dos posiciones de derecha a izquierda.

                Por lo tanto, el resultado será 222,45</p>
        </article>
        <article id="tab4">
            <h1>MULTIPLICACION</h1>
            <p>¿Has aprendido ya a hacer multiplicaciones con decimales? Hoy vamos a repasarlas en distintos casos.
                Multiplicaciones con decimales y números enteros
                En el este caso multiplicamos un número con decimales por otro sin decimales, como por ejemplo:</p>
            <img src="img/aritmetica/multiplicaciones-con-decimales-4.png" alt="">
            <p>Paso 1:
                Colocamos los dos números de modo que el factor más largo esté arriba y el más corto, debajo.</p>
        </article>
    </div>
</body>

</html>
