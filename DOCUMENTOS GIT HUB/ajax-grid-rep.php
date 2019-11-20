<?php
session_start();
if (isset($_SESSION['user'])) {
if ($_SESSION['rol']==2) {
        header('location: ./princ_vet.php ');
}elseif ($_SESSION['rol']==3) {
    header('location: ./princ_user.php ');
}
}

 include "conn.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'id_historial',
    1 => 'fecha',
    2 => 'paciente', 
	3 => 'representante',
	4 => 'especie',
    5 => 'registro',
    6 => 'medicamento',
    7 => 'atendido'  
);

// getting total number records without any search
$sql = "SELECT id_historial, fecha, paciente, representante, especie, registro, medicamento, atendido ";
$sql.=" FROM historial";
$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT id_historial, fecha, paciente, representante, especie, registro, medicamento, atendido ";
	$sql.=" FROM historial";
	$sql.=" WHERE fecha LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT id_historial, fecha, paciente, representante, especie, registro, medicamento, atendido ";
	$sql.=" FROM historial";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["id_historial"];
	$nestedData[] = $row["fecha"];
    $nestedData[] = $row["paciente"];
	$nestedData[] = $row["representante"];
	$nestedData[] = $row["especie"];
    $nestedData[] = $row["registro"];
    $nestedData[] = $row["medicamento"];
    $nestedData[] = $row["atendido"];
    $nestedData[] = '<td><center>
                     <a href="reporte_pdf.php?id='.$row['id_historial'].'"  data-toggle="tooltip" title="Reporte PDF" class="btn btn-sm btn-info"> <img src="images/adobe.png"> </a>
				     </center></td>';		
	
	$data[] = $nestedData;
    
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
