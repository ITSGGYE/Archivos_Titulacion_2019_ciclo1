<?php
require_once '../constantes.php';
require_once '../conexion.php';
require_once '../modelos/Cursos.php';

$estudiantes = Conexion::buscarVariosRegistro("select * from estudiantes where estado='1'");
iniciarPagina();
?>
<form method="POST" action="form/view_report_estudiantes.php">
    <div class="container d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header h3">Reporte de Estudiantes</div>
            <div class="card-body">
                <div class="">
                </div>
                <br>
                <div id="informacion">

                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Curso a Elegir</label>
                    <select class="form-control" name="anio_curso" id="anio_curso" required>
                        <option/>
                        <?php
                        foreach (Años::listar() as $a) {
                            echo "<option value='$a'>$a</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Paralelo a Elegir:</label>
                    <select class="form-control" name="curso" id="curso" required>
                        <option/>
                        <?php
                        foreach (Cursos::listar() as $c) {
                            echo "<option value='$c'>$c</option>";
                        }
                        ?>
                    </select>
                </div><br>
                <br>
                <button type="submit"  class="btn btn-success">Generar Reporte</button>
            </div>
        </div>
    </div>
</form>
