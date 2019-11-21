<?php
require_once '../constantes.php';

function roles() {
    return [
        1 => "ADMINISTRADOR",
        2 => "SECRETARIO"
    ];
}

iniciarPagina();
?>

<h1 class="card-header">Administrar Usuarios</h1><hr>
<div class="text-right mb-3"><button onclick="$('#form_actualizar').toggle(false);$('#form').toggle(true);" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Agregar</button></div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form">
                <div class="modal-body">

                    <div id="form-nuevo">

                        <div class="form-group row">
                            <label class="col-md-4">Usuario:</label>
                            <input required name="txtusuario" id="txtusuario" class="col-md-6 form-control" type="text">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Nombres:</label>
                            <input required name="txtnombres" id="txtnombres" class="col-md-6 form-control" type="text">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Apellidos:</label>
                            <input required="" name="txtapellidos" id="txtapellidos" class="col-md-6 form-control" type="text">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Rol:</label>
                            <select class="col-md-6 form-control" required name="idrol" id="idrol">
                                <option/>
                                <?php
                                foreach (roles() as $id => $rol) {
                                    echo "<option value='$id'>$rol</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label id="txtcontrasena-error" for="txtcontrasena" class="col-md-4 ">Contraseña:</label>
                            <input  name="txtcontrasena" id="txtcontrasena" class="col-md-6 form-control required" type="password">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">confirmar contraseña:</label>
                            <input  required="" name="txtconfirmar" id="txtconfirmar" class="col-md-6 form-control" type="password">
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
                        <input type="hidden" id="idusuario" name="idusuario">
                        <div class="form-group row">
                            <label class="col-md-4">Usuario:</label>
                            <input required name="txt_usuario" id="txt_usuario" class="col-md-6 form-control" type="text">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Nombres:</label>
                            <input required name="txt_nombres" id="txt_nombres" class="col-md-6 form-control" type="text">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Apellidos:</label>
                            <input required="" name="txt_apellidos" id="txt_apellidos" class="col-md-6 form-control" type="text">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">Rol:</label>
                            <select class="col-md-6 form-control" required name="id_rol" id="id_rol">
                                <option/>
                                <?php
                                foreach (roles() as $id => $rol) {
                                    echo "<option value='$id'>$rol</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label id="txtcontrasena-error" for="txt_contrasena" class="col-md-4 ">Nueva Contraseña:</label>
                            <input  name="txt_contrasena" id="txt_contrasena" class="col-md-6 form-control required" type="password">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4">confirmar contraseña:</label>
                            <input  required="" name="txt_confirmar" id="txt_confirmar" class="col-md-6 form-control" type="password">
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
    <table id="tablausuario" class="table">
        <thead class="thead-dark">
            <tr>
                <th class="no-sort">#</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Rol</th>
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

        $('#tablausuario').DataTable({
            // reinicializa el datatable
            destroy: true,
            "order": [],
            "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false,
                }],
            "ajax": {
                "url": "dist/ajax/a_usuario.php?listausuarios=1",
                "dataSrc": "",
            },
            columns: [
                {data: '#'},
                {data: 'usuario'},
                {data: 'nombre'},
                {data: 'rol'},
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
        parametros.append("agregarusuario", 1);
        $.ajax({
            url: "dist/ajax/a_usuario.php",
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
                                url: 'dist/ajax/a_usuario.php',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    eliminarusuario: id
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
        $("#idusuario").val("");
        if (id) {
            $.ajax({
                url: 'dist/ajax/a_usuario.php',
                data: {
                    editarusuario: id
                },
                type: 'POST',
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    if (data.status === "correcto") {
                        $("#form_actualizar").toggle(true);
                        $("#form").toggle(false);
                        //  $('#exampleModal').modal('show');
                        //$('.modal').modal('toggle')
                        $("#idusuario").val(data.usuario.id);
                        $("#txt_usuario").val(data.usuario.usuario);
                        $("#txt_nombres").val(data.usuario.nombres);
                        $("#txt_apellidos").val(data.usuario.apellidos);
                        $("#id_rol").val(data.usuario.idrol);
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
        parametros.append("actualizarusuario", 1);
        if ($("#idusuario").val()) {
            $.ajax({
                url: "dist/ajax/a_usuario.php",
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