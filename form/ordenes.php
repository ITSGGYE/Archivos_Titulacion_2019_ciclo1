<?php
require_once '../constantes.php';
require_once '../conexion.php';
require_once '../modelos/Cursos.php';
require_once '../modelos/Pension.php';
iniciarPagina();
$anio = filter_input(INPUT_POST, "anio");
$curso = filter_input(INPUT_POST, "curso");
$meses = Pension::MesesDisponibles();
?>
<h2 class="h2">Generación de Ordenes de Pago</h2>
<div class="card">
    <div class="card-body">
        <form method="POST">
            <div class="col-md-4">
                <div class="form-group row">
                    <label class="col-md-4">Año:</label>
                    <select required="" class="form-control col-md-8" name="anio" id="anio">
                        <option></option>
                        <?php
                        foreach (Años::listar() as $i => $a) {
                            echo "<option " . ($anio == $a ? " selected" : "") . " value='$a'>$a</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-md-4">Curso:</label>
                    <select required="" class="form-control col-md-8" name="curso" id="curso">
                        <option></option>
                        <?php
                        foreach (Cursos::listar() as $i => $c) {
                            echo "<option " . ($curso == $c ? " selected" : "") . " value='$c'>$c</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="generar" value="generar" class="btn btn-info">Generar</button>
            </div>
        </form>
    </div>

</div>
<?php
if (filter_has_var(INPUT_POST, "generar")) {
    $pensiones = array();
    if ($anio && $curso) {
        try {
            $pensiones = Conexion::buscarVariosRegistro("select e.nombres,e.apellidos,c.anio,c.mes,d.id as iddetalle "
                            . " from pension_det d "
                            . " inner join pension_cab c on c.id=d.idpension "
                            . " inner join estudiantes e on e.id=d.idestudiante "
                            . " where cancelado='0' and anio_curso=? and d.curso=? and c.estado='1'"
                            . " order by c.mes desc,c.anio", [$anio, $curso]);
        } catch (Exception $ex) {
            
        }
        if ($pensiones) {
            ?>
            <form method="POST">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Estudiante</th>
                            <th>Año</th>
                            <th>Mes</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pensiones as $p) {
                            echo "<tr>";
                            echo "<td>{$p['apellidos']} {$p['nombres']}</td>";
                            echo "<td>{$p['anio']}</td>";
                            echo "<td>{$meses[$p['mes']]}</td>";
                            echo "<td><button name='pdfpension' value='{$p['iddetalle']}' formtarget='_blank' formaction='dist/ajax/a_pension.php' class='btn btn-danger btn-sm'>PDF</button></tr>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </form>
            <?php
        } else {
            echo "<div class='alert alert-warning'>";
            echo "No se encontro información de ordenes de pago para este año y curso";
            echo "</div>";
        }
    }
}