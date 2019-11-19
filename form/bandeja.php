<?php
require_once '../constantes.php';
require_once '../conexion.php';
iniciarPagina();
if (!isset($_SESSION['u'])) {
    session_start();
}
$docente_actual = $_SESSION['u']['id'];
$bandeja;
try {
    $bandeja = Conexion::buscarVariosRegistro("select a.de,a.identificador,a.fecha,d.nombres,a.asunto,a.mensaje from archivos a"
                    . " inner join docentes d on d.id=a.iddocente "
                    . " where iddocente=? and a.eliminado='0'  group by identificador", [$docente_actual]);

} catch (Exception $ex) {
    echo "Error: " . $ex->getMessage();
}
?>
<div class="h4 titulo p-2">Bandeja de Entrada</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Archivos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="cuerpo">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Fecha</th>
                <th>Nombres</th>
                <th>Asunto</th>
                <th>Mensaje</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($bandeja) {
                $cont = 1;
                foreach ($bandeja as $a) {
                    echo "<tr>";
                    echo "<th>{$cont}</th>";
                    echo "<td>{$a['fecha']}</td>";
                    echo "<td>{$a['de']}</td>";
                    echo "<td>{$a['asunto']}</td>";
                    echo "<td>{$a['mensaje']}</td>";
                    echo "<td><button onclick=\"verArchivos('{$a['identificador']}');\" class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>ver</button></td>";
                   

                    echo "</tr>";
                    $cont++;
                }
            } else {
                echo "<div>No hay información.</div>";
            }
            ?>
        </tbody>
    </table>

</div>
<script>
    function verArchivos(id) {
        if (id) {
            $.ajax({
                url: "dist/ajax/a_archivo.php",
                data: {
                    identificador: id
                },
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    $("#cuerpo").html(data);
                }
            });
        }
    }


</script>