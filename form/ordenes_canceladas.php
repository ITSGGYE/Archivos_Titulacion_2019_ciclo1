<?php
require_once '../constantes.php';
require_once '../conexion.php';
require_once '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

iniciarPagina();
if (!isset($_SESSION['u']['usuario'])) {
    session_start();
}

$usuarios = Conexion::buscarVariosRegistro("select d.id,c.anio,c.mes,e.nombres,e.apellidos,d.anio_curso,d.curso,d.total "
                . " from pension_cab c "
                . " inner join pension_det d on c.id=d.idpension "
                . " inner join estudiantes e on e.id=d.idestudiante"
                . " where c.estado='1' and d.cancelado='1' "
                . " and d.idestudiante='" . $_SESSION['u']['id'] . "'");
?>
<h1 class="h2">Ordenes Canceladas</h1><hr>
<div class="card">
    <div class="card-body">
        <form method="POST">
            <table class="table table-bordered table-striped">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Estudiante</th>
                        <th>Año</th>
                        <th>Mes</th>
                        <th>Año/curso</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($usuarios) {
                        $cont = 1;
                        foreach ($usuarios as $u) {
                            echo "<tr>";
                            echo "<th>$cont</th>";
                            echo "<td>{$u['apellidos']} {$u['nombres']}</td>";
                            echo "<td>{$u['anio']}</td>";
                            echo "<td>{$u['mes']}</td>";
                            echo "<td>{$u['anio_curso']} {$u['curso']}</td>";

                            echo "<td>$ {$u['total']}</td>";
                            echo "<td><button formaction='dist/ajax/a_pension.php' value='{$u['id']}' formtarget='_blank' name='comprobante' class='btn btn-sm btn-success'>comprobante</button></td>";
                            echo "</tr>";
                            $cont++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</div>

<?php
if (filter_has_var(INPUT_POST, "comprobante")) {
    
}