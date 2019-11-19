<?php
require_once '../constantes.php';
iniciarPagina();
?>
<div class="h4 titulo p-2">Registro de Docentes</div>

<div class="text-right mb-3"><button onclick="$('#form_actualizar').toggle(false);$('#form').toggle(true);" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Agregar</button></div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle Docentes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form">
                <div class="modal-body">

                    <div id="form-nuevo">
                        <div class="form-group row">
                            <label class="col-md-4">Nombres:</label>
                            <input required name="nombres" id="nombres" class="col-md-6 form-control" type="text">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Cedula:</label>
                            <input required name="cedula" id="cedula" class="col-md-6 form-control" type="text">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Celular:</label>
                            <input required name="celular" id="celular" class="col-md-6 form-control" type="text">
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-4 pt-0">Seleccione carrera:</legend>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="carrera" id="carrera1" value="Marketing" checked>
                                        <label class="form-check-label" for="carrera1">
                                            Marketing
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="carrera" id="carrera2" value="Diseño Gráfico">
                                        <label class="form-check-label" for="carrera2">
                                            Diseño Gráfico
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <input class="form-check-input" type="radio" name="carrera" id="carrera3" value="Desarrollo de Software" >
                                        <label class="form-check-label" for="carrera3">
                                            Desarrollo de Software
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <input class="form-check-input" type="radio" name="carrera" id="carrera4" value="OFFset" >
                                        <label class="form-check-label" for="carrera4">
                                            OFFset
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <input class="form-check-input" type="radio" name="carrera" id="carrera5" value="administracion" >
                                        <label class="form-check-label" for="carrera5">
                                            Administracion
                                        </label>
                                    </div>








                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <div class="col-md-4">Administrador</div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input value="1" class="form-check-input" name="administrador" type="checkbox" id="administrador">
                                    <label class="form-check-label" for="administrador">
                                        SI
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Usuario:</label>
                            <input required name="usuario" id="usuario" class="col-md-6 form-control" type="text">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Contraseña:</label>
                            <input required name="clave" id="clave" class="col-md-6 form-control" type="password">
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

                        <input type="hidden" id="iddocente" name="iddocente">
                        <div class="form-group row">
                            <label class="col-md-4">Nombres:</label>
                            <input required name="nombres_" id="nombres_" class="col-md-6 form-control" type="text">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Cedula:</label>
                            <input required name="cedula_" id="cedula_" class="col-md-6 form-control" type="text">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Celular:</label>
                            <input required name="celular_" id="celular_" class="col-md-6 form-control" type="text">
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-4 pt-0">Seleccione carrera:</legend>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="carrera_" id="carrera1_" value="Marketing" checked>
                                        <label class="form-check-label" for="carrera1_">
                                            Marketing
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="carrera_" id="carrera2_" value="Diseño Gráfico">
                                        <label class="form-check-label" for="carrera2_">
                                            Diseño Gráfico
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <input class="form-check-input" type="radio" name="carrera_" id="carrera3_" value="Desarrollo de Software" >
                                        <label class="form-check-label" for="carrera3_">
                                            Desarrollo de Software
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <input class="form-check-input" type="radio" name="carrera_" id="carrera4_" value="OFFset" >
                                        <label class="form-check-label" for="carrera4_">
                                            OFFset
                                        </label>
                                    </div>

                                     <div class="form-check disabled">
                                        <input class="form-check-input" type="radio" name="carrera_" id="carrera5_" value="administracion" >
                                        <label class="form-check-label" for="carrera5_">
                                            administracion
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <div class="col-md-4">Administrador</div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input value="1" class="form-check-input" type="checkbox" name="administrador_" id="administrador_">
                                    <label class="form-check-label" for="administrador_">
                                        SI
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Usuario:</label>
                            <input required name="usuario_" id="usuario_" class="col-md-6 form-control" type="text">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Contraseña:</label>
                            <input required name="clave_" id="clave_" class="col-md-6 form-control" type="password">
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




<div class="table-responsive">
    <table id="tabladocente" class="table">
        <thead>
            <tr>
                <th class="no-sort">#</th>
                <th>Nombres y Apellidos</th>
                <th>Cedula</th>
                <th>Celular</th>
                <th>Tipo de carrera</th>
                <th>Usuario</th>
                <th class="no-sort"></th>
            </tr>
        <tbody id="tbody">

        </tbody>
        </thead>

    </table>

</div>
<script>
    $(document).ready(function () {
        cargasDocentes();
    });
    function cargasDocentes() {
        $('#tabladocente').DataTable({
            
            destroy: true,
            "order": [],
            "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false
                }],
            "ajax": {
                "url": "dist/ajax/a_docente.php?listardocentes=1",
                "dataSrc": "",
            },
            columns: [
                {data: '#'},
                {data: 'nombres'},
                {data: 'cedula'},
                {data: 'celular'},
                {data: 'carrera'},
                {data: 'usuario'},
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
        parametros.append("agregardocente", 1);
        $.ajax({
            url: "dist/ajax/a_docente.php",
            data: parametros,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (data, textStatus, jqXHR) {
                $("#close").trigger('click');
                if (data.status === "correcto") {
                    cargasDocentes();
                    $("#form")[0].reset();
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
                                url: 'dist/ajax/a_docente.php',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    eliminardocente: id
                                },
                                success: function (data, textStatus, jqXHR) {
                                    if (data.status === "correcto") {
                                        cargasDocentes();
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
                url: 'dist/ajax/a_docente.php',
                data: {
                    editardocente: id
                },
                type: 'POST',
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    if (data.status === "correcto") {
                        $("#form_actualizar").toggle(true);
                        $("#form").toggle(false);
                        $("#iddocente").val(data.docente.id);
                        $("#nombres_").val(data.docente.nombres);
                        $("#cedula_").val(data.docente.cedula);
                        $("#celular_").val(data.docente.celular);
                        $("input[name=carrera_][value='" + data.docente.carrera + "']").prop("checked", true);
                        if (data.docente.administrador === "1") {
                            $("#administrador_").prop('checked', true);
                        } else {
                            $("#administrador_").prop('checked', false);
                        }
                        $("#usuario_").val(data.docente.usuario);
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
        parametros.append("actualizardocente", 1);
        if ($("#iddocente").val()) {
            $.ajax({
                url: "dist/ajax/a_docente.php",
                data: parametros,
                type: 'POST',
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    if (data.status === "correcto") {
                        $("#close").trigger('click');
                        cargasDocentes();
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