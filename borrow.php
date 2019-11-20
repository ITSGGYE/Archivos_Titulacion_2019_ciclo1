<?php
	require_once 'connect.php';
	if(!ISSET($_POST['student_no'])){
		echo '
			<script type = "text/javascript">
				alert("Seleccione el nombre!");
				window.location = "borrowing.php";
			</script>
		';
	}else{
		if(!ISSET($_POST['selector'])){
			echo '
				<script type = "text/javascript">
					alert("seleccione el libro!");
					window.location = "borrowing.php";
				</script>
			';
		}else{
			//echo var_dump($book_id = $_POST['book_id']);echo "<br>";
			//echo var_dump($s = $_POST['selector']);
			$c = 0;
			foreach($_POST['selector'] as $key=>$value){
				$book_qty = 1;echo "<br>";
				$student_no = $_POST['student_no'];echo "<br>";
				$s = $_POST['selector'][$c];echo "<br>";
				$date = date("Y-m-d", strtotime("+72 HOURS"));
				date_default_timezone_set('America/Guayaquil');
				$fecha = date("Y-m-d");
				$query = "SELECT * FROM `borrowing` WHERE book_id = $s AND student_no = '$student_no' AND status = 'Borrowed'";
				$result = $conn->query($query);
				$row = $result->num_rows;
				if ($row > 0) {
					echo '
						<script type = "text/javascript">
							alert("Libro ya Prestado al Usuario");
						</script>
					';
					$c =$c+1;
				}else {
					$conn->query("INSERT INTO `borrowing`(book_id,student_no,qty,date_departure,date_delivery,status) VALUES($s, '$student_no', $book_qty, '$fecha', '$date', 'Borrowed')") or die(mysqli_error($conn));
					$c =$c+1;
					echo '
						<script type = "text/javascript">
							alert("Prestado con exito");
						</script>
					';
				}
				echo '
					<script type = "text/javascript">
						window.location = "borrowing.php";
					</script>
				';
			}
		}
	}
