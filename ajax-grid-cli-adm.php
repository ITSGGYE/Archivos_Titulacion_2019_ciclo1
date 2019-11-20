<?php

session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['rol'] == 2) {
        header('location: ./princ_vet.php ');
    } elseif ($_SESSION['rol'] == 3) {
        header('location: ./princ_user.php ');
    }
}

include "conn.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData = $_REQUEST;


$columns = array(
// datatable column index  => database column name
    0 => 'id',
    1 => 'user',
    2 => 'password'
);

// getting total number records without any search
$admin = "admin";
$sql = "SELECT * ";
$sql .= " FROM login WHERE user != '$admin'";
$query = mysqli_query($conn, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if (!empty($requestData['search']['value'])) {
    // if there is a search parameter
    $sql = "SELECT id, user ";
    $sql .= " FROM login";
    $sql .= " WHERE id LIKE '" . $requestData['search']['value'] . "%' ";    // $requestData['search']['value'] contains search parameter
    $sql .= " OR user LIKE '" . $requestData['search']['value'] . "%' AND user != '$admin'";
    $query = mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

    $sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "   LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
    $query = mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit
} else {

    $sql = "SELECT * ";
    $sql .= " FROM login where user != '$admin' ";
    $sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "   LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
    $query = mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
}

$data = array();
$cont = 0;
while ($row = mysqli_fetch_array($query)) {
    // preparing an array
    $cont++;
    $nestedData = array();

    $nestedData[] = $cont;
    $nestedData[] = $row["user"];
    $nestedData[] = '<td><center>
                     <a href="editar_cli_adm.php?id=' . $row['id'] . '"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="menu-icon icon-pencil"></i>Modificar</a>
                    <a href="eliminar_cli_adm.php?id=' . $row['id'] . '"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-danger"> <i class="menu-icon icon-pencil"></i>Eliminar</a>

</center></td>';

    $data[] = $nestedData;
}



$json_data = array(
    "draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
    "recordsTotal" => intval($totalData), // total number of records
    "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
    "data" => $data   // total data array
);

echo json_encode($json_data);  // send data as json format
?>
