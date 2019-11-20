<?php

include ('db.php');
$eid = $_GET['eid'];
$approval ="Permitida";
$napproval="No Permitida";

$view="select * from contact where id = '$eid' ";
$re = mysqli_query($con,$view);
while ($row=mysqli_fetch_array($re))
{
	$id =$row['approval'];

}

if($id=="No Permitida")
{
	$sql ="UPDATE `contact` SET `approval`= '$approval' WHERE id = '$eid' ";
	if(mysqli_query($con,$sql))
	{
		echo '<script>alert("New Room Added") </script>' ;
		header("Location: messages.php");
	}
}
else {
$sql ="UPDATE `contact` SET `approval`= '$napproval' WHERE id = '$eid' ";
	if(mysqli_query($con,$sql))
	{
		echo '<script>alert("
Nueva sala agregada") </script>' ;
		header("Location: messages.php");
	}



}
?>