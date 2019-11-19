<?php
require_once '../constantes.php';
iniciarPagina();
?>
<div class="h4 titulo p-2">Cambio de Contraseña</div>
<div class="card">
    <div class="card-body">
        <form method="POST">
            <div class="form-group ">
                <label>Ingrese nueva contraseña:</label>
                <input class="form-control col-md-5" type="password" name="clave" id="clave">
            </div>
            <div><button type="button" onclick="cambiar();" class="btn btn-primary">Guardar</button></div>
        </form>
    </div>
</div>
<script>
    function cambiar() {
        var clave = $("#clave").val();
        if (clave) {
            $.ajax({
                url: "dist/ajax/a_usuario.php",
                data: {
                    cambiarclave: clave
                },
                type: 'POST',
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    if (data.status === "correcto") {
                        swal(data.mensaje, {
                            icon: 'success'
                        });
                        $("#clave").val("");
                    } else {
                        swal(data.mensaje, {
                            icon: 'error'
                        });
                    }
                }
            });
        }
    }
</script>