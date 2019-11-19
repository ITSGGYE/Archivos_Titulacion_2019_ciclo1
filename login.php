<html lang="es">
    <head>
        <meta>
        <title>MRP</title>
        <link rel="shortcut icon" href="dist/img/logo.png">
        <link rel="stylesheet" href="dist/bootstrap.css" >
        <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
        <script type="text/javascript" src="dist/jquery-3.4.1.js"></script>
        <script src="dist/popper.js" ></script>
        <script src="dist/bootstrap.js" ></script>
        <script src="dist/sweetalert.js"></script>
    </head>
    <style>
        body{
            background: url('dist/img/bg-2.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        .card{
            background: wheat;
        }
    </style>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>

                <div class="col-md-4">

                    <div  style="margin-top: 25%" class="card w-100 ">
                        <div class="card-header">
                            <div class="text-center"><img class="" width="130px" src="dist/img/logo.png"></div>
                        </div>
                        <div class="card-body">

                            <div class="card-title text-center"><h3>Iniciar Sessión</h3></div>
                            <form method="POST">
                                <div class="form-group">
                                    <label class="font-weight-bold">Usuario:</label>
                                    <input class="form-control" type="text" name="txtusuario" id="txtusuario">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Contraseña:</label>
                                    <input  class="form-control"type="password" name="txtclave" id="txtclave">
                                </div>
                                <div class="text-center"><button type="button" onclick="acceder()" class="btn btn-primary">Acceder</button></div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script>
            function acceder() {
                if ($("#txtusuario").val() && $("#txtclave").val()) {
                    $.ajax({
                        url: "dist/ajax/a_usuario.php",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            usuario: $("#txtusuario").val(),
                            clave: $("#txtclave").val()
                        },
                        success: function (data, textStatus, jqXHR) {
                            if (data.status === "correcto") {
                                window.location.href = "index.php";
                            } else {
                                swal("Inicio de sessión", data.mensaje, "error");
                            }
                        }
                    });
                } else {
                    swal("Aviso", "... por favor ingrese usuario y contraseña !");
                }
            }
        </script>
    </body>
    <script>
    </script>
</html>

