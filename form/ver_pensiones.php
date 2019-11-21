<?php
require_once '../constantes.php';
require_once '../conexion.php';
require_once '../modelos/Pension.php';
iniciarPagina();
$pensiones;
try {
    $pensiones = Conexion::buscarVariosRegistro("select *,d.id as iddetalle "
                    . " from pension_det d "
                    . " inner join pension_cab c on d.idpension=c.id"
                    . " inner join estudiantes e on e.id=d.idestudiante "
                    . " where c.estado='1' and d.cancelado='0'");
} catch (Exception $ex) {
    
}
?>
<h1 class="h1">Pensiones</h1>
<table id="tabla" class="table table table-striped">
    <thead>
    <th>#</th>
    <th>Año</th>
    <th>Mes</th>
    <th>Estudiante</th>
    <th>Año / Curso</th>
    <th></th>
</thead>
<tbody>
    <?php
    $con = 1;
    foreach ($pensiones as $p) {
        echo "<tr>";
        echo "<td>$con</td>";
        echo "<td>{$p['anio']}</td>";
        echo "<td>{$p['mes']}</td>";
        echo "<td>{$p['apellidos']} {$p['nombres']}</td>";
        echo "<td>{$p['anio_curso']} {$p['curso']}</td>";
        echo "<td><button onclick='cancelar(" . $p['iddetalle'] . ");' class='btn btn-info btn-sm'>Cancelar valor</button></td>";
        echo "</tr>";
        $con++;
    }
    ?>
</tbody>
</table>
<script>
    $(document).ready(function () {
        $('#tabla').DataTable({
            // reinicializa el datatable
            destroy: true,
            "order": [],
            "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false
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
    function cancelar(id) {
        swal({
            title: "Desea cancelar está pensión?",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((res) => {
            if (res) {
                $.ajax({
                    url: "dist/ajax/a_pension.php",
                    data: {
                        cancelarPensionAdmin: id
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        if (data.status === "correcto") {
                            swal(data.mensaje, {
                                icon: 'success'
                            }).then((res) => {
                                if (res) {
                                    location.reload(true);
                                }
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
