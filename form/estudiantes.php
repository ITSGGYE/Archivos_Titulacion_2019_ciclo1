<?php
require_once '../constantes.php';
require_once '../modelos/Cursos.php';
require_once '../conexion.php';

iniciarPagina();
$objConexion = new Conexion();
$conexion = $objConexion::obtenerConexion();
$query = "SELECT MAX(cod_lectivo)AS lectivo FROM lectivo";
$stmt = $conexion->prepare($query);
$stmt->execute();
$periodo_lectivo = $stmt->fetch();
$mensaje = "Periodo lectivo en curso"." ".$periodo_lectivo['lectivo'];

?>
<h1>Estudiantes</h1><hr>
<center><h3><?php echo $mensaje; ?></h3></center>
<div class="text-right mb-3"><button onclick="$('#form_actualizar').toggle(false);$('#form').toggle(true);" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Agregar</button></div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle Estudiante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" >
                <div class="modal-body">

                    <div id="form-nuevo">
                        <div class="row">
                            <div class="col-md-6">
<!--                                <input type="text" id="ced">
                                <button type="button" name="button" onclick="validar()">Validar</button><br><br>
                                 <div id="salida"></div>-->
                                <div class="form-group row">
 
                                <br> <label class="col-md-4">Nombres:</label><br>
                                    <input onkeypress="return soloLetras(event);" required name="txtnombres" id="txtnombres" class="col-md-6 form-control" type="text" autocomplete="off">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Apellidos:</label>
                                    <input required="" name="txtapellidos" onkeypress="return soloLetras(event);" autocomplete="off" id="txtapellidos" class="col-md-6 form-control" type="text">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Curso:</label>
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
                                    <label id="txtcontrasena-error" for="txtcontrasena" class="col-md-4 ">Seccion:</label>
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
                                    <label class="col-md-4">Cedula del Alumno/a:</label>
                                    <input  required="" name="txtidentificador" id="txtidentificador" minlength="10" autocomplete="off" class="col-md-6 form-control" type="text" onkeypress="return soloNumeros(event);">
                              
              
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Lugar de Nacimiento:</label>
                                    <input class="form-control col-md-6" type="text" autocomplete="off" onkeypress="return soloLetras(event);" name="txtlugarnacimiento" id="txtlugarnacimiento">
                                </div>
<!--                                id="salida"-->
                                 <div class="form-group row" >
                                    <label class="col-md-4">Fecha Nacimiento:</label>
                                    <input class="form-control col-md-6" type="date" autocomplete="off"  name="txtfechanacimiento" id="txtfechanacimiento">
<!--                               onkeypress="return soloNumeros(event);"-->
                                </div>
                            </div>
                       <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4">Sexo:</label>
                                    <select class="form-control col-md-6" name="txtsexo" id="txtsexo">
                                        <option></option>
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    </select>
                                </div>
                                <hr style="height: 2px;border: 0;background-color: black;color: black">

                                <div class="form-group row">
                                    <label class="col-md-4">Nombre de Representante:</label>
                                    <input class="form-control col-md-6" type="text" onkeypress="return soloLetras(event);" name="txtnombrerepresentante" pattern="[a-z]" id="txtnombrerepresentante" autocomplete="off">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Direccion de Representante:</label>
                                    <input class="form-control col-md-6" type="text" name="txtdireccionrepresentante" id="txtdireccionrepresentante">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Telefono de Representante:</label>
                                    <input class="form-control col-md-6" autocomplete="off" minlength="6" onkeypress="return soloNumeros(event);" type="text" name="txttelefonorepresentante" id="txttelefonorepresentante">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Cedula del Representante:</label>
                                    <input class="form-control col-md-6" type="text" minlength="10" autocomplete="off" name="txttidentificadorrepresentante" id="txttidentificadorrepresentante" onkeypress="return soloNumeros(event);">
                                </div>
                            </div>

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
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" id="idestudiante" name="idestudiante">
                                <div class="form-group row">
                                    <label class="col-md-4">Nombres:</label>
                                    <input required name="txt_nombres" onkeypress="return soloLetras(event);" id="txt_nombres" class="col-md-6 form-control" type="text">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Apellidos:</label>
                                    <input required="" name="txt_apellidos" onkeypress="return soloLetras(event);" id="txt_apellidos" class="col-md-6 form-control" type="text">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Curso:</label>
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
                                    <label id="txtcontrasena-error" for="txtcontrasena" class="col-md-4 ">Seccion:</label>
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
                                    <label class="col-md-4">Cedula del Alumno/a:</label>
                                    <input  required="" name="txt_identificador" minlength="10" onkeypress="return soloNumeros(event);" id="txt_identificador" class="col-md-6 form-control" type="text">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Lugar de Nacimiento:</label>
                                    <input class="form-control col-md-6" onkeypress="return soloLetras(event);" type="text" name="txt_lugarnacimiento" id="txt_lugarnacimiento">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Fecha Nacimiento:</label>
                                    <input class="form-control col-md-6" onkeypress="return soloLetras(event);" type="date" name="txt_fechanacimiento" id="txt_fechanacimiento">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4">Sexo:</label>
                                    <select class="form-control col-md-6" name="txt_sexo" id="txt_sexo">
                                        <option></option>
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    </select>
                                </div>
                                <hr style="height: 2px;border: 0;background-color: black;color: black">

                                <div class="form-group row">
                                    <label class="col-md-4">Nombre de Representante:</label>
                                    <input class="form-control col-md-6" type="text" onkeypress="return soloLetras(event);" name="txt_nombrerepresentante" id="txt_nombrerepresentante">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Direccion de Representante:</label>
                                    <input class="form-control col-md-6" type="text" name="txt_direccionrepresentante" id="txt_direccionrepresentante">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Telefono de Representante:</label>
                                    <input class="form-control col-md-6" type="text" minlength="6" onkeypress="return soloNumeros(event);" name="txt_telefonorepresentante" id="txt_telefonorepresentante">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Cedula del Representante:</label>
                                    <input class="form-control col-md-6" minlength="10" type="text" onkeypress="return soloNumeros(event);" name="txt_identificadorrepresentante" id="txt_identificadorrepresentante">
                                </div>
                            </div>
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
        <thead class="thead-dark">
            <tr>
                <th class="no-sort">#</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Curso/Seccion cursando</th>
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
        
var i;
 var cedula;
 var acumulado;
 cedula=document.getElementById("txtidentificador").value.trim();
 var instancia;
 acumulado=0;
 for (i=1;i<=9;i++)
 {
  if (i%2!=0)
  {
   instancia=cedula.substring(i-1,i)*2;
   if (instancia>9) instancia-=9;
  }
  else instancia=cedula.substring(i-1,i);
  acumulado+=parseInt(instancia);
 }
 while (acumulado>0)
  acumulado-=10;
 if (cedula.substring(9,10)!=(acumulado*-1))
 {
  swal("Cedula del Alumno/a no valida!!");
  document.formacedula.textocedula.setfocus();
 }
 swal("Cedula del Alumno/a valida !!");

   
         var nombre,apellido,identificador,curso,seccion,cedula;
        nombre=document.getElementById("txtnombres").value;
        apellido=document.getElementById("txtapellidos").value;
        identificador=document.getElementById("txtidentificador").value;
        curso=document.getElementById("txtanio").value;
        seccion=document.getElementById("txtcurso").value;
        cedula=document.getElementById("txttidentificadorrepresentante").value;
        if(nombre === ""){
            swal("Todos los campos son obligatorios");
            return false;
        }else if(apellido === ""){
            swal("Todos los campos son obligatorios");
            return false;
        }else if(curso === ""){
            swal("Todos los campos son obligatorios");
            return false;
        }else if (identificador ===""){
             swal("Todos los campos son obligatorios");
            return false;
        }else if(seccion === ""){
            swal("Todos los campos son obligatorios");
            return false;
        }else if(cedula === ""){
            swal("Todos los campos son obligatorios");
            return false;
        }else if(nombre.length>30){
            swal("El nombre es muy largo");
            return false;
        }else if(apellido.length>50){
            swal("El nombre es muy largo");
            return false;
        }else if(identificador.length>10){
            swal("El numero de cedula del estudiante es muy largo");
            return false;
        }else if(cedula.length>10){
            swal("El numero de cedula del representante es muy largo");
            return false;
        }else if (isNaN(identificador)){
             swal("La cedula ingresada del estudiante deben ser numeros");
            return false;
        }else if (isNaN(cedula)){
             swal("La cedula ingresada del representante deben ser numeros");
            return false;    
        }
             
             var i;
 var id;
 var acumulado;
 id=document.getElementById("txttidentificadorrepresentante").value.trim();
 var instancia;
 acumulado=0;
 for (i=1;i<=9;i++)
 {
  if (i%2!=0)
  {
   instancia=id.substring(i-1,i)*2;
   if (instancia>9) instancia-=9;
  }
  else instancia=id.substring(i-1,i);
  acumulado+=parseInt(instancia);
 }
 while (acumulado>0)
  acumulado-=10;
 if (id.substring(9,10)!=(acumulado*-1))
 {
  swal("Cedula  del representante no valida!!");
  document.formacedula.textocedula.setfocus();
 }
 swal("Cedula del representante valida !!");
             
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
                        $("#txt_lugarnacimiento").val(data.estudiante.lugar_nacimiento);
                        $("#txt_fechanacimiento").val(data.estudiante.fecha_nacimiento);
                        $("#txt_sexo").val(data.estudiante.sexo);
                        $("#txt_nombrerepresentante").val(data.estudiante.nombre_representante);
                        $("#txt_direccionrepresentante").val(data.estudiante.direccion_representante);
                        $("#txt_telefonorepresentante").val(data.estudiante.telefono_representante);
                        $("#txt_identificadorrepresentante").val(data.estudiante.identificador_representante);
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
 
      
//   function validar() {
//           var cad = document.getElementById("ced").value.trim();
//        var total = 0;
//        var longitud = cad.length;
//        var longcheck = longitud - 1;
//
//        if (cad !== "" && longitud === 10){
//          for(i = 0; i < longcheck; i++){
//            if (i%2 === 0) {
//              var aux = cad.charAt(i) * 2;
//              if (aux > 9) aux -= 9;
//              total += aux;
//            } else {
//              total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
//            }
//          }
//
//          total = total % 10 ? 10 - total % 10 : 0;
//
//          if (cad.charAt(longitud-1) === total) {
//            document.getElementById("salida").innerHTML = ("Cedula Válida");
//          }else{
//            document.getElementById("salida").innerHTML = ("Cedula Inválida");
//          }
//        }
//      }
 
</script>

<!--onsubmit="validar"()-->
<!-- function validar()´{
        var nombre,apellido,identificador;
        nombre=document.getElementById("txtnombres").value;
        apellido=document.getElementById("txtapellidos").value;
        identificador=document.getElementById("txtidentificador").value;
        
        if(nombre === ""){
            alert("Todos los campos son obligatorios");
            return false;
        }
        
    }-->