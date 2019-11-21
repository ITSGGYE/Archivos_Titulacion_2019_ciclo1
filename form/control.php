<?php
require_once '../constantes.php';
require_once '../conexion.php';
iniciarPagina();
$usuarios;
try {
    $usuarios = Conexion::buscarVariosRegistro("select * from ingreso_usuarios i inner join usuarios u on u.id=i.idusuario order by fecha desc", []);
} catch (Exception $ex) {
    echo "Error: " . $ex->getMessage();
}
?>
<h3 class="h3">Control de Usuarios</h3>
<table id="tablausuario" class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Fecha/hora inicio</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($usuarios) {
            $cont = 1;
            foreach ($usuarios as $u) {
                echo "<tr>";
                echo "<th>$cont</th>";
                echo "<td>{$u['usuario']}</td>";
                echo "<td>{$u['apellidos']} {$u['nombres']}</td>";
                echo "<td>{$u['fecha']}</td>";
                echo "</tr>";
                $cont++;
            }
        }
        ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $('#tablausuario').DataTable({
            // reinicializa el datatable
            destroy: true,
            "order": [],
            "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false,
                }],
            language: {
                "lengthMenu": "Mostrar _MENU_ entradas",
                "search": "Buscar:",
                "emptyTable": "No hay información",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
</script>
