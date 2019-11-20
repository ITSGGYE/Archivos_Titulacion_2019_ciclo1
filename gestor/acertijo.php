<html>

<head>
    <?php
        require 'header.php';
    ?>
    <link rel="stylesheet" href="css/menu.css">
    <title></title>
</head>

<body>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">ACERTIJOS PARADÓJICOS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">ACERTIJOS DE LÓGICA</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="panel-pdf.php">HOME</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane container active" id="home">
            <div class="d-flex flex-wrap justify-content-around">
                <div class="p-2">
                    <div class="div-imagen">
                        <div cont-texto>
                            <p>Se subió a un bloque de hielo que se convirtió en agua que, a su vez, se evaporó.// Nadie ha dicho que hubiera atado la cuerda al techo... Podía haberla atado a los barrotes de la celda.</p>
                        </div>
                        <img class="desvanecer" src="img/acertijos/ahorcado.png" />
                    </div>
                </div>
                <div class="p-2">
                    <div class="div-imagen">
                        <div cont-texto>
                            <p>El caballo se llama "Viernes" ya que la preposición "en" te lo indica.</p>
                        </div>
                        <img class="desvanecer" src="img/acertijos/vaquero.png" />
                    </div>
                </div>
                <div class="p-2">
                    <div class="div-imagen">
                        <div cont-texto>
                            <p>El hidroavión que recogió agua del lago para apagar el incendió lo enganchó y lo arrojó sobre el bosque.</p>
                        </div>
                        <img class="desvanecer" src="img/acertijos/avion.png" />
                    </div>
                </div>
                <div class="p-2">
                    <div class="div-imagen">
                        <div cont-texto>
                            <p>El avión vuela boca arriba.</p>
                        </div>
                        <img class="desvanecer" src="img/acertijos/bombaavionacertijo.png" />
                    </div>
                </div>
                <div class="p-2">
                    <div class="div-imagen">
                        <div cont-texto>
                            <p>El señor es enano y solo llega a pulsar el botón del cuarto piso, pero cuando llueve puede pulsar el botón del octavo con la punta del paraguas..</p>
                        </div>
                        <img class="desvanecer" src="img/acertijos/se%C3%B1or.png" />
                    </div>
                </div>
                <div class="p-2">
                    <div class="div-imagen">
                        <div cont-texto>
                            <p>Ha consumido parte de su gasolina por lo que pesa menos que cuando entró.</p>
                        </div>
                        <img class="desvanecer" src="img/acertijos/puente.png" />
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane container fade" id="menu1">
            <div class="d-flex flex-wrap justify-content-around">
                <div class="p-2">
                    <div class="div-imagen">
                        <div cont-texto>
                            <p>La pregunta que le haría es: "¿Cuál es la puerta que diría tu compañero que es la correcta?". En todo caso, la respuesta será la falsa.</p>
                        </div>
                        <img class="desvanecer" src="img/acertijos/log-prision.png" />
                    </div>
                </div>
                <div class="p-2">
                    <div class="div-imagen">
                        <div cont-texto>
                            <p class="text">Nadie puede decir de sí mismo que es escudero, puesto que, si es caballero, debe decir la verdad y, si es escudero, dirá igualmente que es caballero porque miente siempre. Por lo tanto, el segundo habitante miente: es escudero. Y, el tercero, dice la verdad, por lo tanto, es caballero.</p>
                        </div>
                        <img class="desvanecer" src="img/acertijos/log-visitante.png" />
                    </div>
                </div>
                <div class="p-2">
                    <div class="div-imagen">
                        <div cont-texto>
                            <p>Para que se cumpla que dos digan la verdad y dos mientan, el tesoro debe estar en el cofre 1</p>
                        </div>
                        <img class="desvanecer" src="img/acertijos/log-cofres.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".panel-heading").parent('.panel').hover(
            function() {
                $(this).children('.collapse').collapse('show');
            },
            function() {
                $(this).children('.collapse').collapse('hide');
            }
        );

    </script>

</body>

</html>
