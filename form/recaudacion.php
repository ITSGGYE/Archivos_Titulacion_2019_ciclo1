<?php
require_once '../constantes.php';
require_once '../conexion.php';
require_once '../modelos/Pension.php';
iniciarPagina();
$idreporte = 0;
$meses = Pension::MesesDisponibles();
?>
<h1 class="h1">Reporte Recaudación</h1>
<hr>
<div class="card">
    <div class="card-body">
        <form method="POST">
            <div class="form-group col-md-4">
                <label>Reporte:</label>
                <select onchange="validarReporte(this);" required="" class="form-control" name="idreporte" id="idreporte">
                    <option></option>
                    <option  <?php echo ($idreporte == 1 ? " selected " : "") ?> value="1">Anual</option>
                    <option  <?php echo ($idreporte == 2 ? " selected " : "") ?> value="2">Mensual</option>
                    <option  <?php echo ($idreporte == 3 ? " selected " : "") ?> value="3">Por Año Acádemico</option>

                </select>
            </div>
            <div style="display: none" id="selectAnio" class="form-group col-md-4 ">
                <label>Año:</label>
                <select class="form-control" name="anio" id="anio">
                    <option></option>
                    <?php
                    foreach (Pension::AñosDisponible() as $a => $anio) {
                        echo "<option value='$anio'>$anio</option>";
                    }
                    ?>
                </select>
            </div>
            <div style="display: none" id="selectMes" class="form-group col-md-4 ">
                <label>Mes:</label>
                <select class="form-control" name="mes" id="mes">
                    <option></option>
                    <?php
                    foreach (Pension::MesesDisponibles() as $m => $mes) {
                        echo "<option value='$m'>$mes</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4"><button class="btn btn-info ">Generar</button></div>
        </form>
    </div>

</div>
<br>
<?php
if (filter_has_var(INPUT_POST, "idreporte")) {
    if (filter_input(INPUT_POST, "idreporte") > 0) {
        echo "<div class='card'><div class='card-body'>";
        switch (filter_input(INPUT_POST, "idreporte")) {
            case 1:
                try {
                    $pensiones = Conexion::buscarVariosRegistro("select anio,sum(total)as total from pension_cab where estado='1 group by anio order by anio desc'");
                    if (!$pensiones) {
                        echo '<div class="alert alert-secondary" role="alert">
                                   No hay información para mostrar.
                                </div>';
                        break;
                    }
                    ?>
                    <h5 class="card-title">Recaudación Anual </h5>
                    <table class="table  table-striped">
                        <thead>
                            <tr>

                                <th>Año</th>
                                <th>Total Recaudado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($pensiones as $p) {
                                echo "<tr>";

                                echo "<td>{$p['anio']}</td>";
                                echo "<td>$ {$p['total']}</td>";
                                echo "</tr>";
                                $total = $total + $p['total'];
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total:</th>
                                <th>$ <?php echo $total; ?></th>
                            </tr>
                        </tfoot>
                    </table>
                    <?php
                } catch (Exception $ex) {
                    echo "Error: " . $ex->getMessage();
                }

                break;
            case 2:
                $anio = filter_input(INPUT_POST, "anio");
                try {
                    $pensiones = Conexion::buscarVariosRegistro("select distinct(mes)as mes,sum(total)as total from pension_cab where anio=? group by mes order by mes", [$anio]);
                    if (!$pensiones) {
                        echo '<div class="alert alert-secondary" role="alert">
                                   No hay información para mostrar.
                                </div>';
                        break;
                    }
                    ?>
                    <h5 class="card-title">Recaudación - Mensual Año <?php echo $anio ?></h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Mes</th>
                                <th>Recaudado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($pensiones as $p) {
                                echo "<tr>";
                                echo "<td>{$meses[$p['mes']]}</td>";
                                echo "<td>$ {$p['total']}</td>";
                                echo "</tr>";
                                $total = $total + $p['total'];
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total:</th>
                                <th>$ <?php echo $total; ?></th>
                            </tr>
                        </tfoot>
                    </table>
                    <?php
                } catch (Exception $ex) {
                    echo "Error: " . $ex->getMessage();
                }
                break;
            case 3:
                $anio = filter_input(INPUT_POST, "anio");
                $mes = filter_input(INPUT_POST, "mes");
                try {
                    $pensiones = Conexion::buscarVariosRegistro("select d.anio_curso,sum(d.total) as total "
                                    . " from pension_cab c "
                                    . " inner join pension_det d on c.id=d.idpension "
                                    . " where c.anio=? and c.mes=? group by d.anio_curso order by anio_curso", [$anio, $mes]);
                    if (!$pensiones) {
                        echo '<div class="alert alert-secondary" role="alert">
                                   No hay información para mostrar.
                                </div>';
                        break;
                    }
                    ?>
                    <h5 class="card-title">Recaudación - Años Acádemicos <?php echo $meses[$mes] . "-" . $anio ?></h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Año Acádemico</th>
                                <th>Recaudado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($pensiones as $p) {
                                echo "<tr>";
                                echo "<td>{$p['anio_curso']}</td>";
                                echo "<td>$ {$p['total']}</td>";
                                echo "</tr>";
                                $total = $total + $p['total'];
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total:</th>
                                <th>$ <?php echo $total; ?></th>
                            </tr>
                        </tfoot>
                    </table>
                    <?php
                } catch (Exception $ex) {
                    echo "Error: " . $ex->getMessage();
                }
                break;
        }
        echo "</div></div>";
    }
}
?>
<script>
    function validarReporte(sender) {

        switch ($(sender).val()) {
            case "1":
                $("#selectAnio").toggle(false);
                $("#selectMes").toggle(false);
                $("#anio").prop('required', '');
                $("#mes").prop('required', '');
                break;
            case "2":
                $("#selectAnio").toggle(true);
                $("#selectMes").toggle(false);
                $("#anio").prop('required', 'required');
                $("#mes").prop('required', '');
                break;
            case "3":
                $("#selectAnio").toggle(true);
                $("#selectMes").toggle(true);
                $("#anio").prop('required', 'required');
                $("#mes").prop('required', 'required');
                break;
        }
    }
</script>