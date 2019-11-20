<?php
if (isset($_GET['term'])){
	# conectare la base de datos
        require_once 'conn.php';
	$name = $_GET['term'];
$return_arr = array();
/* Si la conexión a la base de datos , ejecuta instrucción SQL. */
if ($conn)
{
	$fetch = mysqli_query($conn,"SELECT * FROM paciente where nombrepac like '%$name%' LIMIT 0 ,50"); 
	
	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$especie=$row['especie'];

		$row_array['value'] = $row['nombrepac']." | ".$row['nombrerep'];

		$row_array['codigo']=$row['nombrepac'];
		$row_array['descripcion']=$row['nombrerep'];
		$row_array['especie']=$especie;
                $row_array['idpaciente']=$row['id_paciente'];
		array_push($return_arr,$row_array);//j
    }
}

/* Cierra la conexión. */
mysqli_close($con);


/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);

}
?>