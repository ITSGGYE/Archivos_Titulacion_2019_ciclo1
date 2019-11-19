<?php	
session_start();

	if (!isset($_SESSION['active']) AND $_SESSION['active'] != true) {
        include("../loguot.php"); 
		exit;
        }        
$Rol_Id=$_SESSION['rol'];


 date_default_timezone_set('America/Guayaquil');   