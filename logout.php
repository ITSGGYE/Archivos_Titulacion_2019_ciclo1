<?php
	session_start();
	session_unset($_SESSION['admin_id']);
	$_SESSION = array();
	session_destroy();
	header('location: index1.php');
