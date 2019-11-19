<?php
require_once '../constantes.php';
require_once '../conexion.php';
require_once '../modelos/Pension.php';
$meses = Pension::MesesDisponibles();
$anio = Pension::AñosDisponible();
iniciarPagina();
$usuario = Conexion::buscarRegistro("select d.id,c.anio,c.mes,e.nombres,e.apellidos,d.anio_curso,d.curso,d.total "
                . " from pension_cab c "
                . " inner join pension_det d on c.id=d.idpension "
                . " inner join estudiantes e on e.id=d.idestudiante"
                . " where c.estado='1' and d.cancelado='1' and c.anio=? and c.mes=? ", [date('Y'), date('m')]);
?>
<h3>Detalle Ordenes Mes Actual</h3><hr>
<div class="row">
    <button onclick="enviar();" type="button" class="btn btn-primary">Enviar Datos a Entidad Bancaria</button>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Estudiante</th>
                <th>Añio/curso</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>


    <!--    <div class="card col-md-6">
            <form method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label>Año</label>
                    <select class="form-control" name="anio">
                        <option/>
    <?php
//                    foreach ($anio as $a) {
//                        echo "<option value='{$a}'>$a</option>";
//                    }
    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Mes</label>
                    <select class="form-control" name="mes">
                        <option/>
    <?php
//                    foreach ($meses as $m => $mes) {
//                        echo "<option value='{$m}'>$mes</option>";
//                    }
    ?>
                    </select>
                </div>
                <button class="btn btn-primary" name="generar" value="generar">Generar</button>
            </form>
            </div>
        </div>-->
</div>

<script>
    function enviar() {
        swal({
            title: 'Confirmación',
            text: 'Esta seguro de enviar datos a entidad?',
            buttons: true,
            dangerMode: true,
        }).then((res) => {
            if (res) {
                swal("Se envio correo con las claves generadas", {
                    icon: 'success'
                });
            }
        });
    }
</script>
<?php
if (filter_has_var(INPUT_POST, "generar")) {
    $mes = filter_input(INPUT_POST, "mes");
    $anio = filter_input(INPUT_POST, "anio");
    if ($mes && $anio) {
        echo 'se eligio';
    }
}