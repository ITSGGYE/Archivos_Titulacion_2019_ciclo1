<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "rapidservices_histovet";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `especie`";

// for method 1

$result1 = mysqli_query($connect, $query);

// for method 2

$result2 = mysqli_query($connect, $query);

$options = "";

while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[1]</option>";
}

?>
<?php include("header_user.php");?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Flat Table</title>
  
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
      <link rel="stylesheet" href="css/style-button.css?nocache=" type="text/css" media="screen" />
      <link rel="stylesheet" href="css/style.css?nocache=" type="text/css" media="screen" />
      <link rel="stylesheet" href="css/style-nave.css?nocache=" type="text/css" media="screen" />
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css?nocache="> 
     


  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript">
$(function() {
          $("#codigo").autocomplete({
          source: "completar_paciente.php",
          minLength: 2,
          select: function(event, ui) {
          event.preventDefault();
          $('#codigo').val(ui.item.codigo);
          $('#descripcion').val(ui.item.descripcion);
          $('#especie').val(ui.item.especie);
           }
            });
    });
</script>

</head>

<body>

<?php
date_default_timezone_set('America/Bogota');
$script_tz = date_default_timezone_get();
?>

  <form action="guardar_historial.php" method="POST">
  <table>
  <thead>
    <tr>
      <th colspan="3">HISTORIAL</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>PACIENTE</td>
      <td><input id="codigo" name="paciente" placeholder="Escribir el nombre del paciente"/>
      </td>
    </tr>
   <tr>
      <td>DUEÑO / REPRESENTANTE</td>
      <td><input name="representante" id="descripcion" readonly>
      </td>
    </tr>
   <tr>
      <td>ESPECIE</td>
      <td><input name="especie" id="especie" readonly>
      </td>
    </tr>
    <tr>
      <td>FECHA</td>
      <td><input type="text" readonly required name="fecha" value="<?php echo date("Y/m/d"); ?>"  />
      </td>
    </tr>
    <tr>
      <td>HORA</td>
      <td><input type="text" readonly required name="hora" value="<?php echo date("H:i:s"); ?>" />
      </td>
    </tr>
   <tr>
      <td>TIPO DE ATENCIÓN</td>
      <td>
      <select name="tipo_atencion">
      <option value="">Seleccione</option>
      <option value="consulta" <?php if (@$_REQUEST["atencion"]=="consulta") echo "selected" ?>>CONSULTA</option>
      <option value="cita" <?php if (@$_REQUEST["atencion"]=="cita") echo "selected" ?>>CITA</option>
      <option value="emergencia" <?php if (@$_REQUEST["atencion"]=="emergencia") echo "selected" ?>>EMERGENCIA</option>
      </select>
      </td>
    </tr>
    <tr>
      <td>REGISTRO</td>
      <td><textarea rows="4" name="registro" cols="43"></textarea>
      </td>
    </tr>
     <tr>
      <td>MEDICAMENTO</td>
      <td><textarea rows="4" name="medicamento" cols="43"></textarea>
      </td>
    </tr>
   <tr>
      <td>ATENDIDO POR</td>
      <td><input type="text" required name="atendido" placeholder="" value="" />
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
