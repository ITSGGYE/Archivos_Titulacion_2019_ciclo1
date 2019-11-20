<?php
	require_once 'connect.php';
	$date = date("Y-m-d", strtotime("+72 HOURS"));
	$conn->query("UPDATE `borrowing` SET `status` = 'Returned', `date_delivery` = '$date' WHERE `borrow_id` = '$_GET[cod]'") or die(mysqli_error());
	header('location: returning.php');