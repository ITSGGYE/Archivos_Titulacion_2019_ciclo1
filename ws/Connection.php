<?php
$host = "3.19.59.231";   //Host
$username = "JSZAMBRANOR";    //User
$password = "#password100296Js"; //Passsword
$database = "dbadita";     // Database Name

//creating a new connection object using mysqli
$conn = new mysqli($host, $username, $password, $database);

//if there is some error connecting to the database
//with die we will stop the further execution by displaying a message causing the error.
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
