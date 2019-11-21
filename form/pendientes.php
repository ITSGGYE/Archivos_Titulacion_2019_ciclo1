<?php
require_once '../constantes.php';
require_once '../conexion.php';
iniciarPagina();
$pendientes = Conexion::buscarVariosRegistro("select m.id,e.nombres,e.apellidos,m.doc_completo,m.fotos from matriculas m"
                . " inner join estudiantes e on m.idestudiante=e.id "
                . " where anio=? and (doc_completo='0' or fotos='0')", [date('Y')]);

$objConexion = new Conexion();
$conexion = $objConexion::obtenerConexion();
$query = "SELECT MAX(cod_lectivo)AS lectivo FROM lectivo";
$stmt = $conexion->prepare($query);
$stmt->execute();
$periodo_lectivo = $stmt->fetch();
$mensaje = "Periodo electivo en curso"." ".$periodo_lectivo['lectivo'];
?>
<h1>Matricula con Documentos Pendientes</h1>
<center><h3> <?php echo $mensaje; ?></h3></center>
<div class="card">
    <div class="card-body">
        <?php
        if ($pendientes) {
            ?>
            <form method="POST">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Estudiante</th>
                            <th>Pendiente documento</th>
                            <th>Pendiente fotos</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $con = 1;
                        foreach ($pendientes as $p) {
                            echo "<tr>";
                            echo "<td>$con</td>";
                            echo "<td>{$p['apellidos']} {$p['nombres']}</td>";
                            if ($p['doc_completo'] == 0 || $p['doc_completo'] == "0") {
                                echo "<td>Si</td>";
                            } else {
                                echo "<td>No</td>";
                            }
                            echo "<td>" . ($p['fotos'] == 0 ? "Si" : "No") . "</td>";
                            echo "<td><button type='button' onclick=\"completar(" . $p['id'] . ");\" value='{$p['id']}' name='idmatricula' class='btn btn-danger'>Completar</button></td>";
                            echo "</tr>";
                            $con++;
                        }
                        ?>
                    </tbody>
                </table>
            </form>
            <?php
        } else {
            echo '<div class="alert alert-primary" role="alert">
  No hay matriculas con documentos pendientes
</div>';
        }
        ?>
    </div>
</div>
<script>
    function completar(id) {

        swal({
            title: 'Desea completar los documentos?',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((res) => {
            if (res) {
                $.ajax({
                    url: "dist/ajax/a_matricula.php",
                    data: {
                        completar: id
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        if (data.status === "correcto") {
                            swal(data.mensaje, {
                                icon: 'success'
                            }).then((res) => {
                               window.location.reload();
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
