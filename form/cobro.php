<?php
require_once '../constantes.php';
require_once '../conexion.php';
require_once '../modelos/Pension.php';
iniciarPagina();
$estudiantes = Conexion::buscarVariosRegistro("select * from estudiantes where estado='1'");

$objConexion = new Conexion();
$conexion = $objConexion::obtenerConexion();
$query = "SELECT MAX(cod_lectivo)AS lectivo FROM lectivo";
$stmt = $conexion->prepare($query);
$stmt->execute();
$periodo_lectivo = $stmt->fetch();
$mensaje = "Periodo lectivo en curso"." ".$periodo_lectivo['lectivo']
?>
<h3 class="card-header">Cobro de Pensiones</h3><hr>
<center><h3> <?php echo $mensaje; ?></h3></center>
<form>
    <div class="row">
        <div class="col-5 ">
            <div class="form-group row">
                <label class="font-weight-bold col-md-4">Estudiante: </label>
                <select onchange="info(this);" class=" select2 form-control col-md-8" id="estudiante" name="estudiante">
                    <option/>
                    <?php
                    if ($estudiantes) {
                        foreach ($estudiantes as $e) {
                            echo "<option value='{$e['id']}'>{$e['apellidos']} {$e['nombres']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div id="informacion"></div>
            <div class="form-group row">
                <label class="col-md-4 font-weight-bold">Mes: </label>
                <select class="form-control col-md-8" name="mes" id="mes">
                    <option/>
                    <?php
                    foreach (Pension::MesesDisponibles() as $m => $mes) {
                        echo "<option value='$m'>$mes</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="button" onclick="cobrar();" class="btn btn-primary">Cobrar</button>
        </div>
    </div>
</form>
<script>
    $(document).ready(function () {
        $(".select2").select2();
    });

    function info(sender) {
        $("#informacion").html("");
        var id = $(sender).val();
        if (id > 0) {
            $.ajax({
                url: "dist/ajax/a_matricula.php",
                data: {
                    preciopension: id
                },
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    $("#informacion").html(data);
                }
            });
        }
    }

    function cobrar() {
        var idestudiante = $("#estudiante").val();
        var mes = $("#mes").val();
        var valor = $("#valor").val();
        if (!valor) {
            swal("No se ha establecido un precio de pension para ese año de educación.", {
                icon: 'warning'
            });
            return 1;
        }
        if (idestudiante && mes) {
            $.ajax({
                url: "dist/ajax/a_matricula.php",
                data: {
                    cobrarpension: idestudiante,
                    mes: mes,
                    valor: valor
                },
                type: 'POST',
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    if (data.status === "correcto") {
                        swal(data.mensaje, {
                            icon: 'success'
                        }).then((res) => {
                            window.location.reload();
                        });
                    } else {
                        swal(data.mensaje, {
                            icon: 'error'
                        });
                    }
                }
            });
        } else {
            swal("complete los campos", {
                icon: 'warning'
            });
        }
    }
</script>