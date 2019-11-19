<?php

include('db/dbconn.php');

if (isset($_POST['Iniciar_sesión']))

	{

		$email = $_POST['email'];
		$password=md5($_POST['contrasena']);
			$result=mysqli_query($conn, "SELECT * FROM customer WHERE email='$email' AND contrasena='$password' AND status = 1")
				or die('cannot login' . mysqli_error($conn));
			$row=mysqli_fetch_array  ($result);
			$run_num_rows = mysqli_num_rows($result);

						if ($run_num_rows > 0 )
						{
							session_start ();
							$_SESSION['id_customer'] = $row['customerid'];
							header ("location:home.php");
						}

						else
						{
							echo "<script>alert('Invalid Email or Password')</script>";
							header("location:home.php");
						}
	}

?>
