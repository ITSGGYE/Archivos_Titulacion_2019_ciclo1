<?php
require_once '../constantes.php';
require_once '../conexion.php';
require_once '../modelos/Pension.php';
$meses= Pension::MesesDisponibles();
iniciarPagina();
$pensiones = Conexion::buscarVariosRegistro("select e.nombres,e.apellidos,c.anio, c.mes,e.anio_actual,e.curso,c.valor, c.idestudiante  from cobros c "
                . " inner join estudiantes e on e.id=c.idestudiante "
                . " where c.estado='1'");

$objConexion = new Conexion();
$conexion = $objConexion::obtenerConexion();
$query = "SELECT MAX(cod_lectivo)AS lectivo FROM lectivo";
$stmt = $conexion->prepare($query);
$stmt->execute();
$periodo_lectivo = $stmt->fetch();
$mensaje = "Periodo lectivo en curso"." ".$periodo_lectivo['lectivo'];
?>
<h3 class="card-header">Pensiones</h3><hr>
<center><h3> <?php echo $mensaje; ?></h3></center>

<table  id="tabla" class="table">
    <thead class="thead-dark">
        <tr>
            <th class="no-sort">#</th>
            <th>Estudiante</th>
            <th>Curso</th>
            <th>Año</th>
            <th>Mes</th>
            <th>Pensión</th>
            <th>Pdf</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $cont = 1;
        foreach ($pensiones as $p) {
            echo "<tr>";
            echo "<th>$cont</th>";
            echo "<td>{$p['apellidos']} {$p['nombres']}</td>";
            echo "<td>{$p['anio_actual']} - {$p['curso']}</td>";
            echo "<td>{$p['anio']}</td>";
            echo "<td>{$meses[$p['mes']]}</td>";
            echo "<td>$ {$p['valor']}</td>";
            echo "<td><a href='./form/view_report_mes.php?id=".$p['idestudiante']."&mes=".$p['mes']."' name='pdfmatricula' class='btn btn-sm btn-danger'>pdf</a></td>";
            echo "</tr>";
            $cont++;
        }
        ?>
    </tbody>
</table>
        
<script>
    $(document).ready(function () {
        $('#tabla').DataTable({

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
    })
</script>