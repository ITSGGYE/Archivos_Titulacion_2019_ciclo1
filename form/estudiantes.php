<?php
require_once '../constantes.php';
require_once '../modelos/Cursos.php';

iniciarPagina();
?>

<h1>Administrar Estudiantes</h1><hr>
<div class="text-right mb-3"><button onclick="$('#form_actualizar').toggle(false);$('#form').toggle(true);" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Agregar</button></div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle Estudiante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form">
                <div class="modal-body">

                    <div id="form-nuevo">


                        <div class="form-group row">
                            <label class="col-md-4">Nombres:</label>
                            <input required name="txtnombres" id="txtnombres" class="col-md-6 form-control" type="text">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Apellidos:</label>
                            <input required="" name="txtapellidos" id="txtapellidos" class="col-md-6 form-control" type="text">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Año en curso:</label>
                            <select class="col-md-6 form-control" required name="txtanio" id="txtanio">
                                <option/>
                                <?php
                                foreach (Años::listar() as $a) {
                                    echo "<option value='$a'>$a</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label id="txtcontrasena-error" for="txtcontrasena" class="col-md-4 ">Curso:</label>
                            <select class="col-md-6 form-control" required name="txtcurso" id="txtcurso">
                                <option/>
                                <?php
                                foreach (Cursos::listar() as $c) {
                                    echo "<option value='$c'>$c</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Identificador:</label>
                            <input  required="" name="txtidentificador" id="txtidentificador" class="col-md-6 form-control" type="text">
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    <button id="btnnuevo" onclick="guardar();" type="button" class="btn btn-primary">Guardar</button>
                </div>
            </form>
            <form id="form_actualizar">
                <div class="modal-body">

                    <div id="form-nuevo">

                        <input type="hidden" id="idestudiante" name="idestudiante">
                        <div class="form-group row">
                            <label class="col-md-4">Nombres:</label>
                            <input required name="txt_nombres" id="txt_nombres" class="col-md-6 form-control" type="text">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Apellidos:</label>
                            <input required="" name="txt_apellidos" id="txt_apellidos" class="col-md-6 form-control" type="text">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Año en curso:</label>
                            <select class="col-md-6 form-control" required name="txt_anio" id="txt_anio">
                                <option/>
                                <?php
                                foreach (Años::listar() as $a) {
                                    echo "<option value='$a'>$a</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label id="txtcontrasena-error" for="txtcontrasena" class="col-md-4 ">Curso:</label>
                            <select class="col-md-6 form-control" required name="txt_curso" id="txt_curso">
                                <option/>
                                <?php
                                foreach (Cursos::listar() as $c) {
                                    echo "<option value='$c'>$c</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Identificador:</label>
                            <input  required="" name="txt_identificador" id="txt_identificador" class="col-md-6 form-control" type="text">
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button  onclick="actualizar();" type="button" class="btn btn-primary ">Actualizar</button>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="">
    <table id="tablaestudiante" class="table">
        <thead>
            <tr>
                <th class="no-sort">#</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Año/curso cursando</th>
                <th>Estado</th>
                <th class="no-sort"></th>
            </tr>
        <tbody id="tbody">

        </tbody>
        </thead>

    </table>

</div>
<script>
    $("#form").validate();
    $(document).ready(function () {
        cargarUsuarios();
    });
    function cargarUsuarios() {

        $('#tablaestudiante').DataTable({
            // reinicializa el datatable
            destroy: true,
            "order": [],
            "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false
                }],
            "ajax": {
                "url": "dist/ajax/a_estudiantes.php?listarestudiantes=1",
                "dataSrc": "",
            },
            columns: [
                {data: '#'},
                {data: 'nombres'},
                {data: 'apellidos'},
                {data: 'año'},
                {data: 'estado'},
                {data: ''},
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
    function guardar() {
        var parametros = new FormData($("#form")[0]);
        parametros.append("agregarestudiante", 1);
        $.ajax({
            url: "dist/ajax/a_estudiantes.php",
            data: parametros,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (data, textStatus, jqXHR) {
                $("#close").trigger('click');
                if (data.status === "correcto") {
                    cargarUsuarios();
                    $("#close").trigger('click');
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
    function eliminar(id) {

        swal({
            title: "Desea eliminar este registro?",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
                .then((willDelete) => {
                    if (willDelete) {
                        if (id) {
                            $.ajax({
                                url: 'dist/ajax/a_estudiantes.php',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    eliminarestudiante: id
                                },
                                success: function (data, textStatus, jqXHR) {
                                    if (data.status === "correcto") {
                                        cargarUsuarios();
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
                    } else {

                    }
                });
    }
    function editar(id) {
        $("#idestudiante").val("");
        if (id) {
            $.ajax({
                url: 'dist/ajax/a_estudiantes.php',
                data: {
                    editarestudiante: id
                },
                type: 'POST',
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    if (data.status === "correcto") {
                        $("#form_actualizar").toggle(true);
                        $("#form").toggle(false);
                        //  $('#exampleModal').modal('show');
                        //$('.modal').modal('toggle')
                        $("#idestudiante").val(data.estudiante.id);
                        $("#txt_nombres").val(data.estudiante.nombres);
                        $("#txt_apellidos").val(data.estudiante.apellidos);
                        $("#txt_anio").val(data.estudiante.anio_actual);
                        $("#txt_curso").val(data.estudiante.curso);
                        $("#txt_identificador").val(data.estudiante.identificador);
                    } else {
                        $("#close").trigger('click');
                        swal(data.mensaje, {
                            icon: 'error'
                        });
                    }
                }
            });
        }
    }

    function actualizar() {
        var parametros = new FormData($("#form_actualizar")[0]);
        parametros.append("actualizarestudiante", 1);
        if ($("#idestudiante").val()) {
            $.ajax({
                url: "dist/ajax/a_estudiantes.php",
                data: parametros,
                type: 'POST',
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    if (data.status === "correcto") {
                        $("#close").trigger('click');
                        cargarUsuarios();
                        swal(data.mensaje, {
                            icon: 'success'
                        })
                    } else {
                        swal(data.mensaje, {
                            icon: 'error'
                        });
                    }
                }
            });
        }
    }
</script>