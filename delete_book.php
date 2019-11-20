<?php

session_start();
$id_book = $_REQUEST['book_id'];
require_once 'connect.php';
$query = $conn->query("SELECT * FROM db_ls.book WHERE book_id = $id_book");
$book = $query->fetch_array(MYSQLI_ASSOC);
$stado = $conn->query("DELETE FROM `borrowing` WHERE `book_id` = '$_REQUEST[book_id]'") ;
if ($stado) {
    $stmt = $conn->query("SET FOREIGN_KEY_CHECKS=0");
    $stado1 = $conn->query("DELETE FROM `book` WHERE `book_id` = '$_REQUEST[book_id]'") ;
    $stmt = $conn->query("SET FOREIGN_KEY_CHECKS=1");
}

if ($stado1) {
    $action = "ELIMINAR";
    $query = $conn->query("SELECT MAX(id)+1 AS COD FROM db_ls.auditoria");
    $cod = mysqli_fetch_array($query);
    $cod_auditoria = "DEL" . $cod['COD'];
    date_default_timezone_set("America/Guayaquil");
    $id_admin = $_SESSION['admin_id'];
    $query = $conn->query("SELECT firstname,lastname FROM db_ls.admin WHERE admin_id = $id_admin");
    $id = mysqli_fetch_array($query);
    $nombre_admin = $id['firstname'] . " " . $id['lastname'];
    $description = "EL ADMINISTRADOR " . $nombre_admin . " ELIMINO EL LIBRO CON EL ID # " . $book['book_id'] . " " . " CODIGO DEL LIBRO: " . $book['book_codigo'] . " TITULO DEL LIBRO: " . $book['book_title'] . " DESCRIPCION DEL LIBRO:" . $book['book_description'] . " CATEGORIA DEL LIBRO: " . $book['book_category'] . " AUTOR DEL LIBRO: " . $book['book_author'] . " FECHA D EPUBLICACION: " . $book['date_publish'] . "STOCK ANTES DE ELIMINAR" . $book['qty'] . " EL DIA " . date('Y-m-d')."A LA HORA: ".date("H:i:s");
    $conn->query("INSERT INTO `auditoria` (cod_auditoria,action,description) VALUES ('$cod_auditoria','$action','$description')");
}
header("location: book.php");
