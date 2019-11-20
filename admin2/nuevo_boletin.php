<?php

include ('db.php');

$id=$_GET['eid'];
if($id=="")
{
echo '<script>alert("Sorry ! Wrong Entry") </script>' ;
		header("Location: mensajes.php");


}

else{
$view="DELETE FROM `contact` WHERE id ='$id' ";

	if($re = mysqli_query($con,$view))
	{
		echo '<script>alert("
Nuevo suscriptor de cartas Eliminar") </script>' ;
		header("Location: mensajes.php");
	}


}







?>