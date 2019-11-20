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
	0 => 'id_paciente',
    1 => 'nombrepac',
    2 => 'fechanac', 
    3 => 'especie', 
	4 => 'sexo',
	5 => 'raza',
	6 => 'peso',

);

// getting total number records without any search
$sql = "SELECT id_paciente, nombrepac, fechanac, especie, sexo, raza, peso ";
$sql.=" FROM paciente";
$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT id_paciente, nombrepac, fechanac, especie, sexo, raza, peso ";
	$sql.=" FROM paciente";
	$sql.=" WHERE id_paciente LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR nombrepac LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR fechanac LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR especie LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR sexo LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR raza LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR peso LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT id_paciente, nombrepac, fechanac, especie, sexo, raza, peso ";
$sql.=" FROM paciente";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
	
}
$cont = 0;
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
        $cont++;
	$nestedData[] = $cont;
	$nestedData[] = $row["nombrepac"];
	$nestedData[] = $row["fechanac"];
	$nestedData[] = $row["especie"];
	$nestedData[] = $row["sexo"];
	$nestedData[] = $row["raza"];
	$nestedData[] = $row["peso"];
    $nestedData[] = '<td><center>
                     <a href="editar_pac.php?id='.$row['id_paciente'].'"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="menu-icon icon-pencil"></i> </a>
                     <a href="deletepaciente.php?action=delete&id='.$row['id_paciente'].'"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"> <i class="menu-icon icon-trash"></i> </a>
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
