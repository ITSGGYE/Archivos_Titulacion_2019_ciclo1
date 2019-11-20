<?php

require_once "../../clases/conexion.php";
require_once "../../clases/Calificaciones.php";
 $c= new conectar();
    $conexion=$c->conexion();
    $obj=new calificaciones();
   
$n=0;
$sql="INSERT INTO notas (fk_alumno ,fk_materia,fk_profesor,fk_curso,,nota, nota2 ) values";


	$alumno=$_POST['alumno'];
	$nota=$_POST['nota1'];
	$nota2=$_POST['nota2'];
	
	$materia=$_POST['materia2'];
	$curso=$_POST['curso'];
	$profesor=$_POST['profesor'];
	
	$aniolectivo=$_POST['aniolectivo'];

	
	

for ($i=0; $i < count($nota); $i++) { 

	/*$sql.="('".$alumno[$i]."','$materia','$profesor','$curso','$parcial','".$nota[$i]."','".$nota2[$i]."',
	'".$nota3[$i]."','".$nota4[$i]."','".$nota5[$i]."'),";*/
	# code...
	$datos=array($alumno[$i],$materia,$profesor,$curso,$aniolectivo,$nota[$i],$nota2[$i]);
	$result=$obj->agregarnotas($datos);

}
/*$cadena=substr($sql, 0,-1);
$cadena.=";";
echo mysqli_query($conexion,$cadena);*/

if($result==1){
	echo json_encode(array('error' => false ));
}
else{
	echo json_encode(array('error' => true ));
}


/*echo mysqli_query($conexion,$cadena);*/
/*echo $result;*/

?>