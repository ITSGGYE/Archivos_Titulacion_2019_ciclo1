<?php
require_once '../db/dbconn.php';
session_start();
echo $_email = $_GET['email'];
$query = "SELECT customerid FROM La_Bodeguita.customer WHERE email = '$_email'";
$stmt = mysqli_query($conn,$query) or die (mysqli_error($conn));
$row = mysqli_fetch_array($stmt);
echo $id = $row['customerid'];
$query = "UPDATE La_Bodeguita.customer set status = 0 WHERE customerid = '$id'";
echo $stmt = mysqli_query($conn,$query);
if ($stmt) {
  echo "<script>alert('DADO DE BAJA CON EXITO');
  window.location = 'customer.php';
  </script>";
}else {
  echo "<script>alert('ERROR');
  window.location = 'customer.php';</script>";

}
 ?>
