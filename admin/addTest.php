<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>User Signup</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");
extract($_POST);
require("../database.php");
$query3="insert into test(sub_id,test_nombre,total_que) values ('$subid','$testname','$totque'";
$rs3=mysqli_query($con,$query3)or die(mysqli_error());
echo "<p align=center>Test <b>\"$testname\"</b> Added Successfully.</p>";

unset($_POST);

?>
</body>
</html>

