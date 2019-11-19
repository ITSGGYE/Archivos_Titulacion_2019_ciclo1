<?php
if (isset($_GET['term'])){
include("../../config/db.php");
include("../../config/conexion.php");
$return_arr = array();
/* If connection to database, run sql statement. */
if ($con)
{
	
	$fetch = mysqli_query($con,"SELECT * FROM clientes where concat(Cli_Nombre,' ',Cli_Apellido) like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50" ); 
	/* Retrieve and store in array the results of the query.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_cliente=$row['Cli_Id'];

		$row_array['value'] = $row['Cli_Nombre']." ".$row['Cli_Apellido'];
		 

		$row_array['id_cliente']=$id_cliente;
	$row_array['cli_cliente']=$row['Cli_Id'];
		$row_array['nombre_cliente']=$row['Cli_Nombre'];
		$row_array['cliente']=$row['Cli_Nombre'];

		$row_array['apellido_cliente']=$row['Cli_Apellido'];
		$row_array['telefono_cliente']=$row['Cli_Numero'];
		$row_array['email_cliente']=$row['Cli_Correo'];
		array_push($return_arr,$row_array);
    }
	 
	
}

/* Free connection resources. */
mysqli_close($con);

 
echo json_encode($return_arr);

}
?>