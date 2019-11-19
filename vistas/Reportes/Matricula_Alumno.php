
<style type="text/css">
	p{
		font-size: 12px;
		line-height: 5px;
	}
	td{
		line-height: 5px;
	}
	h5{
		line-height: 2px;
	}
	}
</style>

<?php 
require_once "../../clases/conexion.php";
require_once "../dependencias.php";
$obj= new conectar();
$conexion=$obj->conexion();
$alumno=$_GET["alumno"];


?>

<div class="row">
	
 <div class="col-lg-8">
				<div class="card ">
					<div  style="text-align: center; padding: 3px;">
						<h3 style="color: green; margin-bottom: 2px; padding: 2px;">Centro de Educación Inicial C.E.I. "Mundo de Colores" </h3>
						<h4 style="color: red; margin-bottom: 2px; padding: 2px;">Reporte de Cobro de Matricula  </h4>
						<?php 
						$sql="SELECT c.nombre_Curso from 
 alumno a , curso c, aniolectivo anio, curso_alumno cr where
 cr.fk_alumno='$alumno' and cr.fk_curso=c.id_curso and 
 cr.fk_anio=1";

$result=mysqli_query($conexion,$sql);
while ($mostrar=mysqli_fetch_row($result)) {
	$curso=$mostrar[0];
}






							$sql="SELECT anio_lectivo from aniolectivo  where estado_aniolectivo=1";
							$result=mysqli_query($conexion,$sql);
							while($mostrar=mysqli_fetch_row($result)){
								$anio=$mostrar[0];
							}
							?>
							</p>
							
					</div>
				</div>
			</div>
			<?php 

$i=0;
$imgVer="";
?>
	<table>
		<tr>
			<td width="200px">
				<center>
			<img width="80" height="80" src="../../Imagenes/logo/logo.png">
		</center>
	
	</td>
	<td> <p> Cdla. Alborada Quinta Etapa Mz.40 Solar 5 </p> <p> Telf.: 2234993-2272488</p> <p> Guayaquil-Ecuador </p>
		<p> R.U.C 091803855001 </p>
		<p> Lcda. Karla Lucia Meza Aspiazu </p>
	</td>
</tr>
</table>

<?php
$sql="SELECT direc_alumno FROM alumno where id_alumno='$alumno'";
$result=mysqli_query($conexion,$sql);
while ($mostrar=mysqli_fetch_row($result)) {
	$direccion=$mostrar[0];
	
	
}

$sql="SELECT 	nombre_repre, celular_repre, cedula_repre  FROM datos_representante  where  fk_alumno='$alumno' ";
$result=mysqli_query($conexion,$sql);
while ($mostrar=mysqli_fetch_row($result)) {

	$nombre_repre=$mostrar[0];
	
	$celular=$mostrar[1];
	$cedula=$mostrar[2];
	
}

$sql="SELECT fechareg , fk_cobro, detalle  FROM  cobro_matricula where fk_alumno='$alumno' ";
$result=mysqli_query($conexion,$sql);
while ($mostrar=mysqli_fetch_row($result)) {

	
	$fecha=$mostrar[0];
	$cobro=$mostrar[1];
	$detalle=$mostrar[2];

}

$sql="SELECT 
			valor	
 from  cobro_valores where id_cobro='$cobro'  ";
$result=mysqli_query($conexion,$sql);
while ($mostrar=mysqli_fetch_row($result)) {

	
	$valor=$mostrar[0];
}

?>

<table>
<tr> 
<td> <p> FECHA/EMISION : <?php echo $fecha ?> </p> </td>
</tr>
<tr>
<td> <p> CLIENTE: <?php echo $nombre_repre ?> </p></td>
</tr>
<tr>
<td> <p> DIRECCION:  <?php echo $direccion ?> </p></td>
</tr>
<tr>
<td> <p> R.U.C/C.I <?php echo $cedula?> </p></td>

<td> <p> TELF: <?php echo $celular?> </p></td>
</tr>
</table>

<table>
	<tr>
		<td><p> CANT. </p> </td>
		<td width="150px"><p> DESCRIPCION  </p></td>
		<td width="150px"><p> V. UNIT  </p></td>
		<td><p> V. VENTA </p> </td>
	</tr>
	<tr>
		<td><p> 1  </p></td>
		<td><p> <?php echo $detalle; ?>  </p></td>
		<td> </td>
		<td><p><?php echo number_format($valor,2);?> </p></td>
	</tr>
</table>

<br>
<br>




<table  style="margin-left: 200px; margin-top: 50px">
	
	<tr>
		<td> <p>SUBTOTAL 12% </p></td>
		<td></td>
	</tr>
	<tr>
		<td> <p> SUBTOTAL 0%</p></td>
		<td><p><?php echo number_format($valor,2);?> </p></td>
	</tr>
	<tr>
		<td> <p> IVA 12% </p></td>
		<td></td>
	</tr>
	<tr>
		<td> <p> V. TOTAL </p></td>
		<td><p><?php echo number_format($valor,2);?> </p></td>
	</tr>
</table>
<br>
<table>
	<tr> 
		<td>_____________________<br> 
			<p style="text-align: center;"> FIRMA AUTORIZADA </p> </td>
		<td>_____________________ <br> 
			<p style="text-align: center;"> RECIBI CONFORME </p> </td>
	</tr>
</table>






</div>
