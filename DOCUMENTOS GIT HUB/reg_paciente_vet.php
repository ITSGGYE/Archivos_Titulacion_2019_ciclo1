<?php
error_reporting(E_ALL ^ E_DEPRECATED);
date_default_timezone_set("America/Guayaquil");
require_once("conn.php");
require_once("header_vet.php");


?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
<title>SUPER DOC - SISTEMA VETERINARIO</title>
  
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <link rel="stylesheet" href="css/style-button.css?nocache=" type="text/css" media="screen" />
  <link rel="stylesheet" href="css/style.css?nocache=" type="text/css" media="screen" />

  <script src="bootstrap/js/validarcampos.js"></script>       

</head>

<body>

    <form action="guardar_paciente_vet.php" method="POST" enctype="multipart/form-data">
  <table>
  <thead>
    <tr>
      <th colspan="3">PACIENTE</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>NOMBRE</td>
      <td><input type="text" required name="nombrepac" placeholder="Nombre..." value="" onkeypress="return val(event)" onKeyDown="if(this.value.length==15 && event.keyCode!=8) return false;"/>
      </td>
    </tr>
   <tr>
      <td>FECHA DE NAC.</td>
      <td><input type="date" required name="fechanac" id="" min="1980-01-01" max="2999-12-30" />
      </td>
    </tr>
   <tr>
      <td>ESPECIE</td>
      <td>
      <select name="especie">
      <option value="">Seleccione</option>
      <option value="perro" <?php if (@$_REQUEST["sexo"]=="perro") echo "selected" ?>>PERRO</option>
      <option value="gato" <?php if (@$_REQUEST["sexo"]=="gato") echo "selected" ?>>GATO</option>
      <option value="tortuga" <?php if (@$_REQUEST["sexo"]=="tortuga") echo "selected" ?>>TORTUGA</option>
      <option value="erizo de tierra" <?php if (@$_REQUEST["sexo"]=="erizo de tierra") echo "selected" ?>>ERIZO DE TIERRA</option>
      <option value="serpientes" <?php if (@$_REQUEST["sexo"]=="serpientes") echo "selected" ?>>SERPIENTES</option>
      <option value="peces" <?php if (@$_REQUEST["sexo"]=="peces") echo "selected" ?>>PECES</option>
      <option value="conejo" <?php if (@$_REQUEST["sexo"]=="conejo") echo "selected" ?>>CONEJO</option>
      <option value="caballo" <?php if (@$_REQUEST["sexo"]=="caballo") echo "selected" ?>>CABALLO</option>
      <option value="burro" <?php if (@$_REQUEST["sexo"]=="burro") echo "selected" ?>>BURRO</option>
      <option value="oveja" <?php if (@$_REQUEST["sexo"]=="oveja") echo "selected" ?>>OVEJA</option>
      <option value="cabra" <?php if (@$_REQUEST["sexo"]=="cabra") echo "selected" ?>>CABRA</option>
      <option value="porcino" <?php if (@$_REQUEST["sexo"]=="porcino") echo "selected" ?>>PORCINO</option>
      <option value="hamster" <?php if (@$_REQUEST["sexo"]=="hamster") echo "selected" ?>>HAMNSTER</option>
      <option value="huron" <?php if (@$_REQUEST["sexo"]=="huron") echo "selected" ?>>HURON</option>
      <option value="loro" <?php if (@$_REQUEST["sexo"]=="loro") echo "selected" ?>>LORO</option>
      <option value="ardilla" <?php if (@$_REQUEST["sexo"]=="ardilla") echo "selected" ?>>ARDILLA</option>
      <option value="camaleon" <?php if (@$_REQUEST["sexo"]=="camaleon") echo "selected" ?>>CAMALEON</option>
      </select>
      </td>
    </tr>
    <tr>
      <td>SEXO</td>
      <td>
      <select name="sexo">
      <option value="">Seleccione</option>
      <option value="M" <?php if (@$_REQUEST["sexo"]=="M") echo "selected" ?>>MACHO</option>
      <option value="F" <?php if (@$_REQUEST["sexo"]=="F") echo "selected" ?>>HEMBRA</option>
      </select>
      </td>
    </tr>
    <tr>
      <td>RAZA</td>
      <td><input type="text" required name="raza" placeholder="Raza..." value="" onkeypress="return val(event)" onKeyDown="if(this.value.length==15 && event.keyCode!=8) return false;" />
      </td>
    </tr>
   <tr>
      <td>PESO</td>
      <td>
        <input type="number"  name="peso" placeholder="Peso..." value="" onkeypress="return val2(event)" />
      </td>
    </tr>
    <tr>
      <td>FOTO</td>
      <td><input type="file"  name="foto" placeholder="foto..." value="" />
      </td>
    </tr>
  </tbody>
  <thead>
    <tr>
      <th colspan="3">REPRESENTANTE Ó DUEÑO</th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <td>NOMBRE</td>
      <td><input type="text" required name="nombrerep" placeholder="Nombre..." value="" onkeypress="return val(event)" onKeyDown="if(this.value.length==25 && event.keyCode!=8) return false;"/>
      </td>
    </tr>
   <tr>
      <td>C.I</td>
      <td><input type="text" required name="dni" placeholder="C.I..." onkeypress="return val2(event)" onKeyDown="if(this.value.length==10 && event.keyCode!=8) return false;" value="" />
      </td>
    </tr>
   <tr>
      <td>TELÉFONOS</td>
      <td><input type="tel" required name="telefonos" placeholder="Teléfonos..." value="" onkeypress="return val2(event)" onKeyDown="if(this.value.length==10 && event.keyCode!=8) return false;"/>
      </td>
    </tr>
    <tr>
      <td>DIRECCIÓN</td>
      <td><input type="text" required name="direccion" placeholder="Dirección..." value="" onKeyDown="if(this.value.length==50 && event.keyCode!=8) return false;"/>
      </td>
    </tr>
    <tr>
      <td>CORREO</td>
      <td><input type="email" required name="correo" placeholder="Correo web..." value="" />
      </td>
    </tr>
    <tr>
      <td>FECHA DE REGISTRO</td>
      <td><input type="text" readonly required name="fechareg" value="<?php echo date("Y/m/d"); ?>"  />
      </td>
    </tr>
    <tr>
    <td colspan="2" align="center">
    <button class="fill" type="submit" name="acc" value="Registrar">Registrar</button>
    <button class="pulse" name="Restablecer" type="reset" value="Limpiar">Limpiar</button>
    </tr>
  </tbody>
</table>
<p>

  </form>
  
</body>
</html>
