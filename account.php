<?php
session_start();
	require_once 'connect.php';
        $id = $_SESSION['admin_id'];
	$qadmin = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = $id") or die(mysqli_error());
	$fadmin = $qadmin->fetch_array(MYSQLI_ASSOC);
	$name = $fadmin['firstname']." ".$fadmin['lastname'];