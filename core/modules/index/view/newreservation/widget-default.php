<?php
$pacients = PacientData::getAll();
$medics = MedicData::getAll();
$conexion = Database::getCon();
$DATE = date("Y-m-d");
$query = "SELECT MAX(time_at) AS HORA FROM reservation WHERE date_at = '$DATE'";
$stmt = $conexion->query($query);
$fetch = $stmt->fetch_array(MYSQLI_ASSOC);
date_default_timezone_set("America/Guayaquil");
$time = $fetch['HORA'];
$new_hora = date("H:i", strtotime($time) + 1500);
$hora_limit = date("H:i", strtotime("17:00"));
if ($new_hora >= $hora_limit) {
    $new_hora = date("H:i", strtotime("08:00") + 1800);
    $fecha1 = date("Y-m-d");
    echo $fecha = date("Y-m-d", strtotime($fecha1."+ 1 day"));
}

if($time == null){
    echo $fecha = date("Y-m-d");
}

?>

<div class="row">
    <div class="col-md-10">
        <h1>Nueva Cita</h1>
        <form class="form-horizontal" role="form" method="post" action="./?action=addreservation">
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Asunto</label>
                <div class="col-lg-10">
                    <select name="title" class="form-control" required>
                        <option disabled="" selected="">--SELECCIONE--</option>
                        <option value="LIMPIEZA">LIMPIEZA</option>
                        <option value="EXTRACCION">EXTRACCION</option>
                        <option value="ORTODONCIA">ORTODONCIA</option>
                        <option value="ENDODONCIA">ENDODONCIA</option>
                        <option value="PLACAS">PLACAS DENTALES</option>
                        <option value="BLANQUEAMIENTO">BLANQUEAMIENTO DENTAL</option>
                        <option value="CORONAS">CORONAS DE PORCELANAS</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Paciente</label>
                <div class="col-lg-10">
                    <select name="pacient_id" class="form-control" required>
                        <option value="">-- SELECCIONE --</option>
                        <?php foreach ($pacients as $p): ?>
                            <option value="<?php echo $p->id; ?>"><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Medico</label>
                <div class="col-lg-10">
                    <select name="medic_id" class="form-control" required>
                        <option value="">-- SELECCIONE --</option>
                        <?php foreach ($medics as $p): ?>
                            <option value="<?php echo $p->id; ?>"><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Fecha/Hora</label>
                <div class="col-lg-5">
                    <input  type="date" name="date_at" required class="form-control" id="inputEmail1" placeholder="Fecha" value="<?php if (isset($fecha)) {
                            echo $fecha;
                        }else{
                        echo $fecha = date("Y-m-d");}?>">
                        
                </div>
                <div class="col-lg-5">
                    <input  type="time" name="time_at" required class="form-control" id="inputEmail1" placeholder="Hora" value="<?php echo $new_hora; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Nota</label>
                <div class="col-lg-10">
                    <textarea class="form-control" name="note" placeholder="Nota"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-default">Agregar Cita</button>
                </div>
            </div>
        </form>

    </div>
</div>