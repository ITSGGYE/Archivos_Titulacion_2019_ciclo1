<form action="index2.php?action=nuevo" method="post">
  <div class="form-group">
    <label for="start">Fecha de inicio</label>
    <div class="input-group date" id="datetimepicker1">
      <input type="text" name="start" class="form-control" readonly /><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
  </div>

  <div class="form-group">
    <label for="end">Fecha de finalización</label>
    <div class="input-group date" id="datetimepicker2">
      <input type="text" name="end" class="form-control" readonly /><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
  </div>
	
	<div class="form-group">
    <label for="user">Nombre</label>
    <input type="text" name="user" class="form-control" placeholder="Nombre" autocomplete="off" required >
  </div>

  <div class="form-group">
    <label for="class">Tipo de evento</label>
    <select class="form-control" name="class" id="title">
      <option></option>
      <option value="Pediente">Pendiente</option>
    </select>
  </div>

  <div class="form-group">
    <label for="title"><b>Nombre de Servicio</b></label>
    <SELECT type="select" name="title" class="form-control" id="title" readonly>
          		<option value="combo_besame">COMBO B&Eacute;SAME</option>
 						</SELECT>
            </div>
	
  <div class="form-group">
	
    <label for="body">Precio</label>
	  
    <SELECT type="select" name="body" class="form-control" id="body" readonly>
          		<option value="veinticinco">$25.00</option>
 						</SELECT>
            </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-calendar"></span> Nuevo evento</button>
  </div>
</form>