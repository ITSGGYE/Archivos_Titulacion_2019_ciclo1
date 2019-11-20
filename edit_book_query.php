<?php
session_start();
	require_once 'connect.php';
	if(ISSET($_POST['edit_book'])){
		$book_codigo = $_POST['book_codigo'];
		$book_title = $_POST['book_title'];
		$book_desc = $_POST['book_desc'];
		$book_category = $_POST['book_category'];
		$book_author = $_POST['book_author'];
		$date_publish = $_POST['date_publish'];
		$qty = $_POST['qty'];
		$before_edit = $conn->query("SELECT * FROM db_ls.book WHERE book_codigo = '$book_codigo'");
		$result = $before_edit->fetch_array(MYSQLI_ASSOC);
		$stado = $conn->query("UPDATE `book` SET `book_codigo` = '$book_codigo', `book_title` = '$book_title', `book_description` = '$book_desc', `book_category` = '$book_category', `book_author` = '$book_author', `date_publish` = '$date_publish', `qty` = '$qty' WHERE `book_id` = '$_REQUEST[book_id]'") or die(mysqli_error());
		if ($stado) {
			$query = $conn->query("SELECT MAX(id)+1 AS COD FROM db_ls.auditoria");
			$cod = mysqli_fetch_array($query);
			$cod_auditoria = "UPT".$cod['COD'];
			$id_admin = $_SESSION['admin_id'];
			$query = $conn->query("SELECT firstname,lastname FROM db_ls.admin WHERE admin_id = $id_admin");
			$id = mysqli_fetch_array($query);
			$nombre_admin = $id['firstname']." ".$id['lastname'];
			date_default_timezone_set("America/Guayaquil");
                        $action = "ACTUALIZAR";
			$description = "EL ADMINISTRADOR ".$nombre_admin." ACTUALIZO EL LIBRO CON EL ID # ".$result['book_id']." EL CODIGO DEL LIBRO ES: ".$result['book_codigo']." TITULO DEL LIBRO ES -> ".$result['book_title']." DESCRIPCION-> ".$result['book_description']." AUTOR-> ".$result['book_author']." CATEGORIA: ".$result['book_category']." fecha de publicacion: ".$result['date_publish']." STOCK ANTES DE ACTUALIZACION:".$result['qty']." OCURRIO EL DIA ".date('Y-m-d')."A LA HORA: ".date("H:i:s").
			" FUERON REEMPLAZADOS CON LOS SIGUIENTES DATOS"." "."CODIGO DEL LIBRO: ".$book_codigo." TITULO DEL LIBRO -> ".$book_title." DESCRIPCION DEL LIBRO-> ".$book_desc." CATEGORIA-> ".$book_category." AUTOR: ".$book_author." FECHA DE PUBLICACION ".$date_publish." NUEVO STOCK: ".$qty;
			$conn->query("INSERT INTO `auditoria` (cod_auditoria,action,description) VALUES ('$cod_auditoria','$action','$description')");
		}
		echo '
			<script type = "text/javascript">
				alert("Guardado los Cambios");
				window.location="book.php";
			</script>
		';
	}
