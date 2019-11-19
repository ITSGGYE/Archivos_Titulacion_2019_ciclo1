<?php
    session_start();
    include 'conexion.php';
    if(isset($_SESSION['usuarios'])){
    echo '<script> window.location="index.php"; </script>';
    }

$hola='
<html>
    <head>
        <meta>
        <base href="/admin_archivo/">
        <title>Sistema correo</title>
        <link rel="shortcut icon" href="dist/img/logo.png">
        <link rel="stylesheet" href="dist/css/boostrap.css">        
        <script type="text/javascript" src="dist/jquery-3.4.1.js"></script>
        <script type="text/javascript" src="dist/css/boostrap.js"></script>        
        <script type="text/javascript" src="dist/css/sweetalert.js"></script>
    </head>
    <style>
        body{
            background: url(dist/img/bg.jpg);
            background-repeat: no-repeat;
            background-size: cover
        }
        #logo{
            position: absolute;
            top: -71px;
            left: calc( 50% - 70px );
        }
    </style>
    <body>
        <div class="container" >
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div  style="height: 450px;margin-top: 100px;" class="card bg-dark text-white ">
                        <img id="logo" style="width: 142px;height: 142px" src="dist/img/logo.png">
                        <div style="margin-top: 71px" class="card-body">
                            <div class="mb-4 text-center"><h3 class="card-title font-weight-bold">Iniciar Sesión</h3></div>
                            <div class="form-group">
                                <label class="font-weight-bold">Usuario:</label>
                                <input name="usuario" id="usuario" style="background: none !important" class="form-control text-white">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Contraseña:</label>
                                <input name="clave" id="clave" type="password" style="background: none !important" class="form-control text-white">
                            </div>
                            <button onclick="validar();" class="btn btn-primary btn-block font-weight-bold">Ingresar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function validar() {
                var usuario = $("#usuario").val();
                var clave = $("#clave").val();
                if (usuario && clave) {
                    $.ajax({
                        url: "dist/ajax/a_usuario.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            validarusuario: 1,
                            usuario: usuario,
                            clave: clave
                        },

                        success: function (data, textStatus, jqXHR) {
                            if (data.status === "correcto") {
                                window.location.href = "index.php";
                            } else {
                                swal(data.mensaje, {
                                    icon: "error"
                                });
                            }
                        }
                    });
                } else {
                    swal({
                        title: "complete los campos",
                        icon: "error"
                    });
                }
            }
        </script>
    </body>

</html>';
echo $hola;
?>
