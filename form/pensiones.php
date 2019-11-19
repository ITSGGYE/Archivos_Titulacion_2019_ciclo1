<?php
require_once '../constantes.php';
require_once '../modelos/Pension.php';
iniciarPagina();
?>
<h1>Generación de Pensiones</h1>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Elija información necesaria</h5><hr>

        <div class="form-group col-md-4">
            <div class="alert alert-warning">
                <b>Nota:</b> Solo se podran generar pensiones del presente año.
            </div>
            <label class="">Seleccione un mes: </label>
            <select class="form-control" id="mes" name="mes">
                <option/>
                <?php
                foreach (Pension::MesesDisponibles() as $n => $m) {
                    echo "<option value='{$n}'>$m</option>";
                }
                ?>
            </select>
            <br>
            <button class="btn btn-info" onclick="generar();">Generar</button>
        </div>

    </div>

</div>
<script>
    function generar() {
        if (!$("#mes").val()) {
            swal("Seleccione un mes ...", {
                icon: 'warning'
            });
            return 0;
        }
        swal({
            text: 'Está seguro de generar pension con el mes seleccionado?',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((res) => {
            if (res) {
                $.ajax({
                    url: "dist/ajax/a_pension.php",
                    data: {
                        generarpension: $("#mes").val()
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        if (data.status === "correcto") {
                            swal(data.mensaje, {
                                icon: 'success'
                            });
                        } else {
                            swal(data.mensaje, {
                                icon: 'error'
                            });
                        }
                    }
                });
            }
        });
    }
</script>