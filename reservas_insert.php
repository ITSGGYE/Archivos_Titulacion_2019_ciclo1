<?php

require_once 'connect.php';
if (!ISSET($_POST['student_no'])) {
    echo '
    <script type = "text/javascript">
      alert("Seleccione el nombre!");
      window.location = "reservas.php";
    </script>
  ';
} else {
    if (!ISSET($_POST['selector'])) {
        echo '
      <script type = "text/javascript">
        alert("seleccione el libro!");
        window.location = "reservas.php";
      </script>
    ';
    } else {
        //echo var_dump($book_id = $_POST['book_id']);echo "<br>";
        //echo var_dump($s = $_POST['selector']);
        $c = 0;
        foreach ($_POST['selector'] as $key => $value) {
            $book_qty = 1;
            echo "<br>";
            $student_no = $_POST['student_no'];
            echo "<br>";
            $s = $_POST['selector'][$c];
            $query = "SELECT book_codigo FROM `book` WHERE book_id = $s";
            $row = $conn->query($query);
            $result = $row->fetch_array(MYSQLI_ASSOC);
            $book_codigo = $result['book_codigo'];
            $query = "SELECT MAX(id)+1 AS ID FROM `reservas` ";
            $row = $conn->query($query);
            $result1 = $row->fetch_array(MYSQLI_ASSOC);
            $cod_re = "R" . $result1['ID'];
            date_default_timezone_set('America/Guayaquil');
            $fecha = date("Y-m-d");
            $query = "SELECT * FROM `borrowing` WHERE book_id = $s AND student_no = $student_no AND status = 'Borrowed'";
            $result = $conn->query($query);
            $row = $result->num_rows;
            if ($row > 0) {
                echo '
           <script type = "text/javascript">
             alert("Alumno ya Tiene Prestado el Libro");
           </script>
         ';
                $c = $c + 1;
            } else {
                $query = "SELECT book_codigo FROM book WHERE book_id = $s";
                $result = $conn->query($query);
                $result1 = $result->fetch_array(MYSQLI_ASSOC);
                $book_codigo = $result1['book_codigo'];
                $query = "SELECT * FROM `reservas` WHERE book_codigo = $book_codigo AND student_no = $student_no";
                $result = $conn->query($query);
                $row = null;
                $row = $result->num_rows;
                if ($row > 0) {
                    echo '
             <script type = "text/javascript">
               alert("Alumno ya Tiene Reservado el Libro");
             </script>
           ';
                } else {
                    $query = "SELECT * FROM reservas WHERE book_codigo = '$book_codigo'";
                    $stmt = $conn->query($query);
                    $row = $stmt->num_rows;
                    if ($row > 1) {
                        echo '
            <script type = "text/javascript">
              alert("El libro llego al tope de reservas");
            </script>
          ';
                        $c = $c + 1;
                    } else {
                        $conn->query("INSERT INTO `reservas`(cod_reserva,student_no,fecha_reserva,book_codigo) VALUES('$cod_re','$student_no','$fecha',$book_codigo)") or die(mysqli_error());
                        $c = $c + 1;
                        echo '
            <script type = "text/javascript">
              alert("Reservado con exito");
            </script>
          ';
                    }
                }
            }
        }
        echo '
       <script type = "text/javascript">
         window.location = "reservas.php";
       </script>
     ';
    }
}
?>
