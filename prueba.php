<?php
require("conexion.php");
?>
<br />

    <link rel="stylesheet" href="css/style.css">


<tr>

<form action="imprimir_historial.php" method="post"  target="_blank">
<table width="500" align="center"  class="tabla">
<tr>
	<td class="tdatos" colspan="2" align="center"><h3>DATOS PERSONALES</h3></td>
</tr>
<tr>
	<td class="tdatos">Numero de Historia</td>
	<td class="dtabla">
	 <input type="hidden" name="paciente" value=""></td>
</tr>


<tr>
	<td class="tdatos">Nombre del Profesional</td>
	<td class="dtabla">
	<input type="hidden" name="nomprf" value=""></td>
	</tr>
<tr>
	<td class="tdatos">Observaci&oacute;n</td>
	<td class="dtabla">
	<input type="hidden" name="representante" value=""></td>
	</tr>


<td colspan="2" align="center" class="cdato">

&nbsp; <input type="submit" name="imp" value="" class="imprimir"></td>
</tr>

</form>