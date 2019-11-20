<!DOCTYPE html>
<html lang="es">
<?php 
session_start();
if ($_SESSION["loggedin"] != true) {
    header("location: login.php");
} else {
    // echo("entraste");
}
     class conectar  {
        public function conexion(){
            $conexion = mysqli_connect('localhost', 'root', '', 'puntofrio');
            $conexion->set_charset('utf8');
            return $conexion;
        }
     }
    $obj= new conectar();
    $conexion=$obj->conexion();
    $sql="SELECT id_precio,
    descripcion,
    modelo,
    anio,
    precio
    from precio";
    $result=mysqli_query($conexion,$sql);

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>PUNTO FRIO COTIZACIÓN</title>
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
        <?php include 'menuUsuario.php'; ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <div class="row">
                        <div class="white-box d-none" id="imprimible">
                            <h3 class="box-title m-b-0">SERVICIOS SELECCIONADOS</h3>
                            <h4>Proforma realizada por: <?=usuario();?></h4>

                                <div class="table-responsive m-t-40" style="clear: both;">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#CODIGO</th>
                                                <th>DESCRIPCIÓN</th>
                                                <th class="text-right">Año</th>
                                                <th class="text-right">PRECIO</th>
                                            </tr>
                                        </thead>
                                        <tbody id="items">
                                            <!-- LISTA DE ELEMENTOS ESCOGIDOS -->
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th class="text-center">TOTAL</th>
                                                <th></th>
                                                <th class="text-right"></th>
                                                <th class="text-right" id="sumaTotal">$200</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            <div class="text-right">
                                <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Guardar PDF o Imprimir</span> </button>
                                <h5><span><i class="fab fa-cc-visa"></i> Aceptamos todas las tarjetas de Credito</span></h5>
                            </div>                        
                       </div>
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">LISTA DE SERVICIOS : VEHICULOS LIVIANOS</h3>
                            <p class="text-muted m-b-30">Exportar datos : Copy, Excel, CSV, PDF & Print</p>
                                <div id="tablaDatatable">
                                    <div class="table-responsive">
                                        <table class="display nowrap" id="iddatatable">
                                            <thead >
                                                <tr>
                                                    <td>Ítem</td>
                                                    <td>Descripción</td>
                                                    <td>Modelo</td>
                                                    <td>Año</td>
                                                    <td>Precio</td>
                                                    <td>Acción</td>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <td>Ítem</td>
                                                    <td>Descripción</td>
                                                    <td>Modelo</td>
                                                    <td>Año</td>
                                                    <td>Precio</td>
                                                    <td>Acción</td>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php 
                                                while ($mostrar=mysqli_fetch_row($result)) {
                                                    ?>
                                                    <tr>
                                                        <td class="item<?php echo $mostrar[0] ?>" data-precio="<?php echo $mostrar[4] //usar precio orita esta usando el id nomas ?>" data-nombre="<?php echo $mostrar[1] ?>" data-modelo="<?php echo $mostrar[3] ?>" data-modelo="<?php echo $mostrar[3] ?>"><?php echo $mostrar[0] ?></td>
                                                        <td><?php echo $mostrar[1] ?></td>
                                                        <td><?php echo $mostrar[2] ?></td>
                                                        <td><?php echo $mostrar[3] ?></td>
                                                        <td><?php echo $mostrar[4] ?></td>
                                                        <td><button id="item<?php echo $mostrar[0] ?>" class="btn btn-info agregar">agregar</button></td>
                                                    </tr>
                                                    <?php 
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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
    <script src="js/jquery.PrintArea.js" type="text/JavaScript"></script>
    <!-- jquery area imprimible - jquery PrintArea -->
    <script>

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
    // Area de PDF o IMPRESION
    $(function() {
        $("#print").on("click", function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("#imprimible").printArea(options);
        });
    });
    //Area de PDF o IMPRESION FIN

    // FUNCION AUTOSUMA
     function autosuma () {
            var sum = 0;
            $(".valorUnico").each(function(){
                // sum += +$(this).val();
                sum += +$(this).data("preciounico");
            });
            $("#sumaTotal").html("$"+sum.toFixed(2));
            console.log(sum);
            // $(sum).html("#sumaTotal");
        };

    // AGREGAR ITEM EVENTO
    $(".agregar").on("click", function(e){
        $("#imprimible").removeClass("d-none");
        var elementoActual = (event.currentTarget.id) ;
        var precio = $("."+elementoActual).data("precio");
        var nombre = $("."+elementoActual).data("nombre");
        var modelo = $("."+elementoActual).data("modelo");
        // console.log(elementoActual);
        // console.log(precio+nombre+modelo);
        $("<tr>"+ 
            "<td class='text-center'>"+precio+"</td>"+
            "<td>"+nombre+"</td>"+
            "<td class='text-right'>"+modelo+"</td>"+
            "<td data-preciounico='"+precio+"' class='text-right valorUnico'>$ "+precio+"</td>"+ 
            "</tr>").prependTo("#items");
        autosuma();
    });

    </script>
</body>

</html>
