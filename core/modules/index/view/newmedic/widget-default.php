<script> 

function Mayus(q) {
    q.value = q.value.toUpperCase();
}

function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}

function soloNombres(e) {
    key = e.KeyCode || e.which;
    tecla = String.fromCharCode(key).toUpperCase();
    letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZÑ ';
    especiales = '8-37-39-46';
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}


function soloMail(e) {
    key = e.KeyCode || e.which;
    tecla = String.fromCharCode(key).toUpperCase();
    letras = '1234567890@._/$#-ABCDEFGHIJKLMNOPQRSTUVWXYZÑ ';
    especiales = '8-37-39-46';
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function soloCedula(e) {
    key = e.KeyCode || e.which;
    tecla = String.fromCharCode(key).toUpperCase();
    letras = '1234567890VIE';
    especiales = '8-37-39-46';
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}


</script>
<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Medico</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addmedic" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cedula o Ruc*</label>
    <div class="col-md-6">
      <input type="text" name="cedula" class="form-control" id="name" placeholder="Cedula" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" onkeyup="Mayus(this);" onkeypress="return soloNombres(event)">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido" onkeyup="Mayus(this);" onkeypress="return soloNombres(event)">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
    <div class="col-md-6">
      <input type="text" name="address" class="form-control"  id="address" placeholder="Direccion" onkeyup="Mayus(this);" onkeypress="return soloMail(event)">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email" class="form-control" id="email" placeholder="Email" onkeyup="Mayus(this);" onkeypress="return soloMail(event)">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono*</label>
    <div class="col-md-6">
      <input type="text" name="phone" class="form-control" id="phone" placeholder="Telefono" onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)">
    </div>
  </div>



  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Medico</button>
    </div>
  </div>
</form>
	</div>
</div>