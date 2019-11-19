<?php

include('db/dbconn.php');
if (isset($_POST['pay_now'])) {
    $cid = $_SESSION['id_customer'];
    $total = $_POST['total'];

    include ("random_code.php");
    $t_id = $r_id;
    date_default_timezone_set('America/Guayaquil');
    $date = date("Y-m-d");
    $hora = date('H:i:s');
    $sql1 = mysqli_query($conn, "SELECT direccion FROM customer WHERE customerid = $cid");
    $datacustomer = mysqli_fetch_array($sql1);
    $direccion = $datacustomer['direccion'];
    if (empty($total)) {
        echo "<script>alert('NO TIENES PRODUCTOS');"
        . "window.location='Bebidas1.php';"
        . "</script>";
    } else {
        $que = mysqli_query($conn, "INSERT INTO `transaction` (customerid, amount, order_stat, order_date,order_time,direccion) VALUES ('$cid', '$total', 'En Espera', '$date','$hora','$direccion')") or die(mysqli_error($conn));

        $p_id = $_POST['pid'];
        $oqty = $_POST['qty'];

        $id = mysqli_query($conn, "SELECT MAX(transaction_id) AS ID FROM `transaction`");
        $MAXID = mysqli_fetch_array($id);
        //echo "<script>alert(".$MAXID['ID'].");</script>";
        $i = 0;
        foreach ($p_id as &$pro_id) {
            mysqli_query($conn, "INSERT INTO `transaction_detail` (`product_id`, `order_qty`, `transaction_id`) VALUES ('" . ($pro_id) . "', '" . ($oqty[$i]) . "', '" . ($MAXID['ID']) . "')") or die(mysqli_error($conn));
            $i++;
        }
        echo "<script>alert('PEDIDO ACEPTADO');</script>";
        echo "<script>window.location='cart.php?id=" . $cid . "&action=empty'</script>";
    }
}
?>
