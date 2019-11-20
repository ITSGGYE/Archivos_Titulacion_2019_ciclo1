<?php
	$conn = new mysqli('18.219.68.231', 'BellaYagual', '#passwordYagual2019', 'db_ls') or die(mysqli_error());
	$conn->query("SET NAMES 'utf8'");
        $conn->query("SET CHARSET 'utf8'");
	if(!$conn){
		die("Error fatal: error de conexión!");
	}