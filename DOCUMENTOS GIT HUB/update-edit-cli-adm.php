<?php

session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['rol'] == 2) {
        header('location: ./princ_vet.php ');
    } elseif ($_SESSION['rol'] == 3) {
        header('location: ./princ_user.php ');
    }
}
?>

<?php

include "conn.php";
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $user = mysqli_real_escape_string($conn, (strip_tags($_POST['user'], ENT_QUOTES)));
    $password = mysqli_real_escape_string($conn, (strip_tags(md5($_POST['password']), ENT_QUOTES)));

    $update = mysqli_query($conn, "UPDATE login SET user='$user', password='$password' WHERE id='$id'") or die(mysqli_error($conn));
    if ($update) {
        echo "<script>alert('Los datos han sido actualizados!'); window.location = 'act_cliente_adm.php'</script>";
    } else {
        echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'act_cliente_adm.php'</script>";
    }
}
?>