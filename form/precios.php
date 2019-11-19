<?php
require_once '../constantes.php';
require_once '../conexion.php';
require_once '../modelos/Cursos.php';
iniciarPagina();
$precios = Conexion::buscarVariosRegistro("select *from precios ");
$banco = Conexion::buscarRegistro("select * from bancos");
$nombre_banco = $banco['banco'];
$cuenta_banco = $banco['cuenta'];
?>
<h1>Precios Pensiones</h1><hr>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="banco">Banco:</label>
            <input class="form-control" value="<?php echo $nombre_banco; ?>" type="text" name="banco" id="banco">
        </div>
        <div class="form-group">
            <label for="cuenta">N. Cuenta:</label>
            <input class="form-control" value="<?php echo $cuenta_banco; ?>" type="text" name="cuenta" id="cuenta">
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Año</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (Años::listar() as $a) {

                        echo "<tr>";
                        echo "<td>$a</td>";
                        echo "<td>";
                        if ($precios) {
                            $val = array_search($a, array_column($precios, 'anio'));
                            echo "<input value='{$precios[$val]['precio']}' class='text-right form-control' type='number'  name='txtprecio[]' min='0' step='any'>";
                        } else {
                            echo "<input value='' class='text-right form-control' type='number'  name='txtprecio[]' min='0' step='any'>";
                        }

                        echo "<td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
        <div class="text-center"><button onclick="guardarprecio();" class="btn btn-primary">Guardar</button></div>
    </div>
</div>
<script>

    function guardarprecio() {
        var precios = [];
        $("input[name^=txtprecio]").each(function (i, e) {
            precios[i] = $(e).val();
        });
        $.ajax({
            url: "dist/ajax/a_pension.php",
            type: 'POST',
            dataType: 'json',
            data: {
                actualizarprecios: 1,
                precios: precios,
                banco: $("#banco").val(),
                cuenta: $("#cuenta").val()
            },
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
</script>