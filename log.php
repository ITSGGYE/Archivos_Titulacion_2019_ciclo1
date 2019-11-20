
<?php include ('admin/conexion.php');
$json=array();
//$consulta="SELECT * From usuario_estudiante where carnet=".$_SESSION['carnet']."'";
//$ejes=mysqli_query($conexion,$consulta);
$resulta = mysqli_query($conexion, "SELECT anio From usuario_estudiante where  carnet=".$_SESSION['carnet']."");

/*if(!$resulta){
  echo mysqli_error($conexion);
}*/
if(mysqli_num_rows($resulta)>0){
	while($registro2 = mysqli_fetch_array($resulta)){
  echo "".$anios=$registro2['anio']."";
  $peticion = "INSERT INTO visitas VALUES (
'".date('U')."',
'".date('Y-m-d h:i:s')."',
'".$_SERVER['REMOTE_ADDR']."',
'".$_SERVER['HTTP_USER_AGENT']."',
'".$_SERVER['REQUEST_URI']."',
'$anios'
)";
$resultado = mysqli_query($conexion,$peticion);
mysqli_close($conexion);
}
}


?>

