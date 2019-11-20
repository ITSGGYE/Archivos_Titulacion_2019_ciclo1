<?php
session_start();
	require_once 'connect.php';
	
	if(ISSET($_POST['save_book'])){
		 $book_codigo = $_POST['book_codigo'];
		 $book_title = $_POST['book_title'];
		 $book_desc = $_POST['book_desc'];
		 $book_category = $_POST['book_category'];
		 $book_author = $_POST['book_author'];
		 $date_publish = $_POST['date_publish'];
		 $qty = $_POST['qty'];
		$result = $conn->query("INSERT INTO `book`(book_codigo,book_title,book_description,book_category,book_author,date_publish,qty)
		VALUES($book_codigo, '$book_title', '$book_desc', '$book_category', '$book_author', '$date_publish', $qty)") or die(mysqli_error($conn));
		if ($result) {
			$action = "AGREGAR";
			$query = $conn->query("SELECT MAX(id)+1 AS COD FROM db_ls.auditoria");
			$cod = mysqli_fetch_array($query);
			$cod_auditoria = "INS".$cod['COD'];
			$id_admin = $_SESSION['admin_id'];
			$query = $conn->query("SELECT firstname,lastname FROM db_ls.admin WHERE admin_id = $id_admin");
			$id = mysqli_fetch_array($query);
			$nombre_admin = $id['firstname']." ".$id['lastname'];
			date_default_timezone_set("America/Guayaquil");
			$description = "EL ADMINISTRADOR ".$nombre_admin." AGREGO A UN NUEVO LIBRO NOMBRE->  ".$book_title." DESCRIPCION->  ".$book_desc." CATEGORIA->  ".$book_category." AUTOR-> ".$book_author." FECHA DE PUBLICACION ".$date_publish." STOCK-> ".$qty." EN LA FECHA DE ".date('Y-m-d')."A LA HORA: ".date("H:i:s")." EL CODIGO CON EL QUE SE REGISTRO ES EL: ".$book_codigo;
			$conn->query("INSERT INTO `auditoria` (cod_auditoria,action,description) VALUES ('$cod_auditoria','$action','$description')");
		}
		echo'
			<script type = "text/javascript">
				alert("Datos guardados con exitos");
				window.location = "book.php";
			</script>
		';
	}
