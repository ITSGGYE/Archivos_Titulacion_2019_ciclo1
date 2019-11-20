<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/AlumnoCurso.php";
	$obj= new alumnocurso();
	$c= new conectar();
		$conexion=$c->conexion();
	$id=$_POST['curso'];
	echo $id;
	/*$sql2="SELECT fk_curso, fk_paralelo from  curso_paralelo  where id_cursoparalelo=$id";
							$result=mysqli_query($conexion,$sql2)
 							while($ver2=mysqli_fetch_row($result)){

 								$id_curso=$ver2[0];
 								$id_paralelo=$ver2[1];
							 }*/

	
		

	$datos=array(
				$_POST['alumno'],
				$id,								
				$_POST['anio'],
				$_POST['estado']
			
				);
	
	echo $obj->agregarAlumnoCurso($datos);
	
 ?>