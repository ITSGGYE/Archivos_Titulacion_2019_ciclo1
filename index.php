<?php
require './conexion.php';
require_once './constantes.php';
if (!isset($_SESSION['u']['usuario'])) {
    session_start();
    if (!isset($_SESSION['u']['usuario'])) {
        header("Location: login.php");
    }
}
iniciarPagina();
?>
<h1>BIENVENIDO: ESCUELA DE EDUCACIÓN BÁSICA PARTICULAR “GRAL ELOY ALFARO DELGADO” N°3245" </h1>
<?php
if ($_SESSION['u']['idrol'] == "1" || $_SESSION['u']['idrol'] == 1) {
    ?>
    <h4 class="mt-5">Panel</h4>
    <div class="row">
        <div class="col-md-3">
            <a href="form/pensiones.php">
                <div class="card-group">
                    <div class="card bg-danger text-white">
                        <!--<img src="..." class="card-img-top" alt="...">-->
                        <div class="card-body text-center">
                            <h5 class="card-title">Generar Pensiones</h5>
                        </div>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-md-3">
            <a href="form/recaudacion.php">
                <div class="card-group">
                    <div class="card bg-primary text-white">
                        <!--<img src="..." class="card-img-top" alt="...">-->
                        <div class="card-body text-center">
                            <h5 class="card-title">Reporte de Recaudaciones</h5>
                        </div>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-md-3">
            <a href="form/ordenes.php">
                <div class="card-group">
                    <div class="card bg-success text-white">
                        <!--<img src="..." class="card-img-top" alt="...">-->
                        <div class="card-body text-center">
                            <h5 class="card-title">Orden de Pago</h5>
                        </div>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-md-3">
            <a href="form/ver_pensiones.php">
                <div class="card-group">
                    <div class="card bg-secondary text-white">
                        <!--<img src="..." class="card-img-top" alt="...">-->
                        <div class="card-body text-center">
                            <h5 class="card-title">Ver Pensiones</h5>
                        </div>
                    </div>
                </div>

            </a>
        </div>
    </div>
    <?php
}