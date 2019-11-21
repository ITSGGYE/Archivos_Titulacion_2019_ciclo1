<?php
require_once '../constantes.php';
iniciarPagina();
if (!isset($_SESSION['u']['usuario'])) {
    session_start();
}
?>
<h1 class="h2 card-header">Pensiones a Cancelar</h1><hr>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cancelar Valor de Pensión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="iddetallepension" id="iddetallepension">
                    <label for="txtclave">Ingrese codigo de validación:</label>
                    <input class="form-control" type="text" name="txtclave" id="txtclave">
                </div>
            </div>
            <div class="modal-footer">
                <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" onclick="cancelar();" class="btn btn-primary">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<form method="POST">
    <table id="tabla" class="table">
        <thead>
            <tr>
                <th class="no-sort">#</th>
                <th>Estudiante</th>
                <th>Año</th>
                <th>Mes</th>
                <th>Año/Curso</th>
                <th>Curso</th>
                <th>Total</th>
                <th class="no-sort"></th>
            </tr>
        <tbody id="tbody">

        </tbody>
        </thead>

    </table>
</form>
<script>
    $(document).ready(function () {
        cargarTabla();
    });

    function abrir(id) {
        $("#iddetallepension").val(id);
    }
    function cargarTabla() {
        $('#tabla').DataTable({
            // reinicializa el datatable
            destroy: true,
            "order": [],
            "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false
                }],
            "ajax": {
                "url": "dist/ajax/a_pension.php?tablapensionesestudiante=<?php echo $_SESSION['u']['id']; ?>",
                "dataSrc": ""
            },
            columns: [
                {data: '#'},
                {data: 'estudiante'},
                {data: 'año'},
                {data: 'mes'},
                {data: 'añocurso'},
                {data: 'curso'},
                {data: 'total'},
                {data: ''}
            ],
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
    }
    function cancelar() {
        var iddetalle = $("#iddetallepension").val();
        var codigo = $("#txtclave").val();
        if (iddetalle && codigo) {
            $.ajax({
                url: "dist/ajax/a_pension.php",
                data: {
                    cancelarpension: iddetalle,
                    codigo: codigo
                },
                type: 'POST',
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    if (data.status === "correcto") {
                        $("#close").trigger('click');
                        cargarTabla();
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
        } else {
            swal('Ingrese el codigo de validación', {
                icon: 'warning'
            });
        }
    }

</script>