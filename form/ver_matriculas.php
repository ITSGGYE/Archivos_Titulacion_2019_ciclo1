<?php
require_once '../constantes.php';
require_once '../modelos/Matricula.php';
require_once '../conexion.php';
$matriculas = Matricula::Listar();
iniciarPagina();
$objConexion = new Conexion();
$conexion = $objConexion::obtenerConexion();
$query = "SELECT MAX(cod_lectivo)AS lectivo FROM lectivo";
$stmt = $conexion->prepare($query);
$stmt->execute();
$periodo_lectivo = $stmt->fetch();
$mensaje = "Periodo lectivo en curso"." ".$periodo_lectivo['lectivo'];
?>
<h1>Matriculas Generadas</h1><hr>
<center><h3> <?php echo $mensaje; ?></h3></center>
<form method="POST">
    <table id="tabla" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Estudiante</th>
                <th>Fecha Matriculación</th>
                <th>Pdf</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($matriculas) {
                $cont = 1;
                foreach ($matriculas as $m) {
                    echo "<tr>";
                    echo "<th>$cont</th>";
                    echo "<td>{$m['apellidos']} {$m['nombres']}</td>";
                    echo "<td>{$m['fecha']}</td>";
                    echo "<td><button formaction='dist/ajax/a_matricula.php' value='{$m['id']}' name='pdfmatricula' class='btn btn-sm btn-danger'>pdf</button></td>";
                    echo "</tr>";
                    $cont++;
                }
            }
            ?>
        </tbody>
    </table>
</form>
<script>

    $("#tabla").DataTable({
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
</script>