<?php

require_once "../../clases/conexion.php";
require_once "../../clases/Calificaciones.php";
 $c= new conectar();
    $conexion=$c->conexion();
    $obj=new calificaciones();
   
$alumno=$_POST['alumno'];
	$estado=$_POST['estado'];
	



	
	

for ($i=0; $i < count($alumno); $i++) { 

	/*$sql.="('".$alumno[$i]."','$materia','$profesor','$curso','$parcial','".$nota[$i]."','".$nota2[$i]."',
	'".$nota3[$i]."','".$nota4[$i]."','".$nota5[$i]."'),";*/
	# code...
	$datos=array($alumno[$i],$estado[$i]);
	$result= $obj->updateesatadoalumno($datos);

}
/*$cadena=substr($sql, 0,-1);
$cadena.=";";
echo mysqli_query($conexion,$cadena);*/

echo $result;


/*echo mysqli_query($conexion,$cadena);*/
/*echo $result;*/

?>