<?php $user = PacientData::getById($_GET["id"]);?>
<script> 

function Mayus(q) {
    q.value = q.value.toUpperCase();
}

function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}

function soloLetras(e) {
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
	<h1>Editar Paciente</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatepacient" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cedula*</label>
    <div class="col-md-6">
        <input onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)" readonly="" type="text" name="cedula" value="<?php echo $user->cedula;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input onkeyup="Mayus(this);" onkeypress="return soloLetras(event)" type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label  for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input onkeyup="Mayus(this);" onkeypress="return soloLetras(event)" type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
    <div class="col-md-6">
      <input onkeyup="Mayus(this);" onkeypress="return soloMail(event)" type="text" name="address" value="<?php echo $user->address;?>" class="form-control" required id="username" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input onkeyup="Mayus(this);" onkeypress="return soloMail(event)" type="text" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono</label>
    <div class="col-md-6">
      <input onkeyup="Mayus(this);" onkeypress="return soloNumeros(event)" type="text" name="phone"  value="<?php echo $user->phone;?>"  class="form-control" id="inputEmail1" placeholder="Telefono">
    </div>
  </div>


  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Paciente</button>
    </div>
  </div>
</form>
	</div>
</div>