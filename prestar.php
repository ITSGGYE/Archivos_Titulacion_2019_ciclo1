<?php
require_once 'connect.php';
$conn->query("SET AUTOCOMMIT = 0");
$conn->query("START TRANSACTION");
$cod_reserva = $_GET['reserva'];
$query = "SELECT * FROM `reservas` WHERE cod_reserva = '$cod_reserva'";
$result = $conn->query($query);
$fetch = $result->fetch_array(MYSQLI_ASSOC);
$student_no = $fetch['student_no'];
$book_codigo = $fetch['book_codigo'];
$query = "SELECT book_id FROM book WHERE book_codigo = $book_codigo";
$result = $conn->query($query);
$fetch1 = $result->fetch_array(MYSQLI_ASSOC);
$book_id = $fetch1['book_id'];
$qty = 1;
$date_departure = date("Y-m-d");
$date_delivery = date("Y-m-d", strtotime("+72 HOURS"));
$satus = "Borrowed";

$q_book = $conn->query("SELECT * FROM `book` WHERE book_id = $book_id") or die(mysqli_error());
while($f_book = $q_book->fetch_array()){
$q_borrow = $conn->query("SELECT SUM(qty) as total FROM `borrowing` WHERE `book_id` = '$f_book[book_id]' && `status` = 'Borrowed'") or die(mysqli_error());
$new_qty = $q_borrow->fetch_array();
$total = $f_book['qty'] - $new_qty['total'];
}

if ($total<1) {
  echo '
    <script type = "text/javascript">
      alert("NO HAY STOCK");
      window.location = "view_reservas.php";
    </script>
  ';
}else {
  if (  $conn->query("INSERT INTO `borrowing`(book_id,student_no,qty,date_departure,date_delivery,status) VALUES($book_id, '$student_no', $qty, '$date_departure', '$date_delivery', 'Borrowed')") or die(mysqli_error())
) {
    $id_delete = $fetch['id'];
  if ($conn->query("DELETE FROM `reservas` WHERE id = $id_delete")) {
    $conn->query("COMMIT");
    $conn->query("SET AUTOCOMMIT = 1");
    echo '
      <script type = "text/javascript">
        alert("EXITO");
        window.location = "view_reservas.php";
      </script>
    ';
  }else {
    $conn->query("ROLLBACK");
    $conn->query("SET AUTOCOMMIT = 1");
    echo '
      <script type = "text/javascript">
        alert("ERROR delete");
        window.location = "view_reservas.php";
      </script>
    ';
  }
}else {
  $conn->query("ROLLBACK");
  $conn->query("SET AUTOCOMMIT = 1");
  echo '
    <script type = "text/javascript">
      alert("ERROR");
      window.location = "view_reservas.php";
    </script>
  ';
}
}
 ?>
