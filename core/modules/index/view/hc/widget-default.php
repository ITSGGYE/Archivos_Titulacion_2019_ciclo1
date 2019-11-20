<?php
$reservation = ReservationData::getById($_GET["id"]);
$pacients = PacientData::getAll();
$medics = MedicData::getAll();
?>
<div class="row">
    <div class="col-md-8">
        <h1>Editar Cita</h1>
        <br>
        <form class="form-horizontal" role="form" method="post" action="?action=hc">
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Asunto</label>
                <div class="col-lg-10">
                    <input readonly="" type="text" name="title" value="<?php echo $reservation->title; ?>" required class="form-control" id="inputEmail1" placeholder="Asunto">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Paciente</label>
                <div class="col-lg-10">
                    <select readonly name="pacient_id" class="form-control" required>
                        <option value="">-- SELECCIONE --</option>
                        <?php foreach ($pacients as $p): ?>
                            <option value="<?php echo $p->id; ?>" <?php if ($p->id == $reservation->pacient_id) {
                            echo "selected";
                        } ?>><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
<?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Medico</label>
                <div class="col-lg-10">
                    <select readonly name="medic_id" class="form-control" required>
                        <option value="">-- SELECCIONE --</option>
                        <?php foreach ($medics as $p): ?>
                            <option value="<?php echo $p->id; ?>" <?php if ($p->id == $reservation->medic_id) {
                            echo "selected";
                        } ?>><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
<?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Fecha/Hora</label>
                <div class="col-lg-5">
                    <input disabled="" type="date" name="date_at" value="<?php echo $reservation->date_at; ?>" required class="form-control" id="inputEmail1" placeholder="Fecha">
                </div>
                <div class="col-lg-5">
                    <input disabled="" readonly type="time" name="time_at" value="<?php echo $reservation->time_at; ?>" required class="form-control" id="inputEmail1" placeholder="Hora">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Nota</label>
                <div class="col-lg-10">
                    <input readonly="" type="text" name="note" value="<?php echo $reservation->note; ?>" required class="form-control" id="inputEmail1" placeholder="Hora">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Registro de HC</label>
                <div class="col-lg-10">
                    <textarea  class="form-control" name="descripcion" placeholder="descripcion"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <input type="hidden" name="id" value="<?php echo $reservation->id; ?>">
                    <button type="submit" name="regis_hc" class="btn btn-default">Registrar HC</button>
                </div>
            </div>
        </form>

    </div>
</div>