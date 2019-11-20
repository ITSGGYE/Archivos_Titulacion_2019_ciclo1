<!DOCTYPE html>
<html lang="es">
<?php
    session_start();
    
$id = $_SESSION['rol']; 
if($id != 0){

     $_SESSION = array();
     session_destroy();
     header("location: login.php");
     exit(); 
}else{
   // session_start();
}

if ($_SESSION["loggedin"] != true) {
    header("location: login.php");
} else {
    // echo("entraste");
}

class conectar
{
    public function conexion()
    {
        $conexion = mysqli_connect('localhost', 'root', '', 'puntofrio');
        $conexion->set_charset('utf8');
        return $conexion;
    }
}
$obj      = new conectar();
$conexion = $obj->conexion();


$sql      = "SELECT id_vehiculo, placa, idmarca1, modelo, color, motor, anio, id_clientes
            from vehiculo";
$result = mysqli_query($conexion, $sql);



$sqlClientes="SELECT * from clientes where rol = 1";
$resultClientes = mysqli_query($conexion, $sqlClientes); //usamos la conexion para dar un resultado a la variable
 
if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit="";
    while ($row = $resultClientes ->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobit .=" <option value='".$row['id_clientes']."'>".$row['nombre']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else{    echo "No hubo resultados";};



$sqlmarca="SELECT * from marca";
$resultmarca = mysqli_query($conexion, $sqlmarca); //usamos la conexion para dar un resultado a la variable
 
if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combomarca="";
    while ($row = $resultmarca ->fetch_array(MYSQLI_ASSOC)) 
    {
        $combomarca .=" <option value='".$row['idmarca1']."'>".$row['idmarca']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else{ echo "No hubo resultados";};






?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>PUNTO FRIO VEHICULO</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link href="../plugins/components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- ===== Animation CSS ===== -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="css/style.css" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="mini-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- ===== Top-Navigation ===== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="top-left-part">
                    <a class="logo">
                        <h4 class="text-center text-white"><img src="img/13.jpg" width="30" height="30" class="d-inline-block align-top" alt=""> PUNTO FRIO</h4>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li>
                        <a href="javascript:void(0)" class="sidebartoggler font-20 waves-effect waves-light"><i class="icon-arrow-left-circle"></i></a>
                    </li>
                </ul>

            </div>
        </nav>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php include 'menu.php';?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <span class="btn btn-info" style="float: right;" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
                                Agregar nuevo <span class="fas fa-plus-circle"></span>
                            </span>

                            <h3 class="box-title m-b-0">LISTA DE VEHICULOS</h3>
                            <p class="text-muted m-b-30">Exportar datos : Copy, Excel, CSV, PDF & Print</p>



                                <div id="tablaDatatable">

                                    <div class="table-responsive">
                                        <table class="display nowrap" id="iddatatable">
                                            <thead >
                                                <tr>
                                                    <td>Placa</td>
                                                    <td>Marca</td>
                                                    <td>Modelo</td>
                                                    <td>Color</td>
                                                    <td>Motor</td>
                                                    <td>Año</td>
                                                    <td>Propietario</td>
                                                    <td>Editar</td>
                                                    <td>Eliminar</td>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <td>Placa</td>
                                                    <td>Marca</td>
                                                    <td>Modelo</td>
                                                    <td>Color</td>
                                                    <td>Motor</td>
                                                    <td>Año</td>
                                                    <td>Propietario</td>
                                                    <td>Editar</td>
                                                    <td>Eliminar</td>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                    while ($mostrar = mysqli_fetch_row($result)) {
                                                        $propietario = $mostrar[7];
                                                        $marca = $mostrar[2];
                                                        $sqlNombre="SELECT nombre from clientes where id_clientes = $propietario";
                                                        $sqlMarca="SELECT idmarca from marca where idmarca1 = $marca";
                                                        $ClienteNombre = mysqli_query($conexion, $sqlNombre);
                                                        $AutoMarca = mysqli_query($conexion, $sqlMarca);
                                                        $nombre="";
                                                            while ($row = $ClienteNombre ->fetch_array(MYSQLI_ASSOC)) 
                                                            {   $nombre .=$row['nombre'];  }
                                                        $marcaName="";
                                                            while ($row = $AutoMarca ->fetch_array(MYSQLI_ASSOC)) 
                                                            {   $marcaName .=$row['idmarca'];  }
                                                        ?>
                                                    <tr>
                                                        <td><?php echo $mostrar[1] ?></td>
                                                        <td class="text-center"><?php echo $marcaName ?></td>
                                                        <td class="text-center"><?php echo $mostrar[3] ?></td>
                                                        <td><?php echo $mostrar[4] ?></td>
                                                        <td><?php echo $mostrar[5] ?></td>
                                                        <td><?php echo $mostrar[6] ?></td>
                                                        <td><?php echo $nombre ?></td>
                                                        <td style="text-align: center;">
                                                            <span class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')">
                                                                <span class="fas fa-edit"></span>
                                                            </span>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <span class="btn btn-danger btn-sm" onclick="eliminarDatos('<?php echo $mostrar[0] ?>')">
                                                                <span class="fa fa-trash"></span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        <!-- Modal agregar-->
                        <div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agrega nuevos vehiculos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form id="frmnuevo">
                                    <!-- <input type="hidden" class="d-none" id="rol" name="rol"> -->
                                    <label for="">Placa</label>
                                    <input type="text" class="form-control input-group-sm" id="placa" name="placa">
                                    <label for="">Modelo</label>
                                    <input type="text" class="form-control input-group-sm" id="modelo" name="modelo">
                                    <label for="">Color</label>
                                    <input type="text" class="form-control input-group-sm" id="color" name="color">
                                    <label for="">Motor</label>
                                    <input type="text" class="form-control input-group-sm" id="motor" name="motor">
                                    <label for="">Año</label>
                                    <input type="date" class="form-control input-group-sm" id="anio" name="anio">
<!--                                     <label for="">Propietario</label>
                                    <input type="text" class="form-control input-group-sm" id="propietario" name="propietario"> <--><br></-->
                                    <label for="">Cliente</label>
                                    <select name="clientes" id="clientes" class="form-control">
                                        <?php echo $combobit; ?>
                                    </select><br><br>
                                    <label for="">Marca</label>
                                    <select name="marca" id="marca" class="form-control">
                                        <?php echo $combomarca; ?>
                                    </select>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Modal editar-->
                        <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Actualizar vehiculo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form id="frmnuevoU">
                                    <input type="text" hidden="" id="idjuego" name="idjuego">
                                    <label for="">Placa</label>
                                    <input type="text" class="form-control input-group-sm" id="placaU" name="placaU">
                                    <label for="">Marca</label>
                                    <input type="text" class="form-control input-group-sm" id="marcaU" name="marcaU">
                                    <label for="">Modelo</label>
                                    <input type="text" class="form-control input-group-sm" id="modeloU" name="modeloU">
                                    <label for="">Color</label>
                                    <input type="text" class="form-control input-group-sm" id="colorU" name="colorU">
                                    <label for="">Motor</label>
                                    <input type="text" class="form-control input-group-sm" id="motorU" name="motorU">
                                    <label for="">Año</label>
                                    <input type="date" class="form-control input-group-sm" id="anioU" name="anioU">
                                    <label for="">Propietario</label>
                                    <input type="text" class="form-control input-group-sm" id="propietarioU" name="propietarioU">
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-info" id="btnActualizar">Actualizar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer t-a-c">
                © 2019 PUNTO FRIO
            </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="  crossorigin="anonymous"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="js/sidebarmenu.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
    <script src="../plugins/components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->

    <script>

    $(function() {
        $('#marca,#color,#propietario,#marcaU,#colorU,#propietarioU').keydown(function (e) {
          if (e.shiftKey || e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
            if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
              e.preventDefault(); 
            }
          }
        });
     });
    //DATOS REALES DE TABLA
    $(document).ready(function() {
        $('#iddatatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            language:{
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    } );
    //FIN DATOS REALES DE TABLA
    //BOTON AGREGAR NUEVO REGISTRO
       $('#btnAgregarnuevo').click(function(){
           datos = $('#frmnuevo').serialize();

           $.ajax({
               type:"POST",
               data:datos,
               url:"procesos/agregarv.php",
               success:function(r){
                   if(r==1){
                    $('#frmnuevo')[0].reset();
                     $('#tablaDatatable');
                     $('.close').trigger('click');
                     location.reload();
                     alertify.success("Agregado con exito :D");
                   }else{
                    alertify.error("Fallo al agregar :C");
                   }
               }
            });
       });
    function agregaFrmActualizar(idjuego){
        $.ajax({
              type:"POST",
              data:"idjuego=" + idjuego,
              url:"procesos/obtenDatosv.php",
              success:function(r){
                datos=jQuery.parseJSON(r);
                $('#idjuego').val(datos['id_vehiculo']);
                $('#placaU').val(datos['placa']);
                $('#marcaU').val(datos['marca']);
                $('#modeloU').val(datos['modelo']);
                $('#colorU').val(datos['color']);
                $('#motorU').val(datos['motor']);
                $('#anioU').val(datos['anio']);
                $('#propietarioU').val(datos['propietario']);
              }
        });
    }
    //FIN BOTON AGREGAR
    //BOTON AGREGAR
       $('#btnActualizar').click(function(){
           datos = $('#frmnuevoU').serialize();

           $.ajax({
               type:"POST",
               data:datos,
               url:"procesos/actualizarv.php",
               success:function(r){
                   if(r==1){
                     $('#tablaDatatable');
                     $('.close').trigger('click');
                     location.reload();
                     alertify.success("Actualizado con exito :D");
                   }else{
                    alertify.error("Fallo al actualizar :C");
                   }
               }
            });
       });
    function eliminarDatos(idjuego){
    $.ajax({
              type:"POST",
              data:"idjuego=" + idjuego,
              url:"procesos/eliminarv.php",
              success:function(r){
                if(r==1){
                     $('.close').trigger('click');
                     location.reload();
                    // alertify.success("Eliminado con exito !");
                }else{
                    alertify.error("No se pudo eliminar...");
                }
              }
            });
             alertify.confirm('Eliminar un juego', '¿ Seguro de eliminar este juego :( ?',
                  function(){

         }
            , function(){
      });
    }
    //FIN BOTON AGREGAR
    $(function() {
        $('#myTable').DataTable();

        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="6">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
</body>

</html>