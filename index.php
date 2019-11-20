<head>
    <?php
    session_start();
    if (isset($_SESSION['user'])) {
        if ($_SESSION['rol'] == 1) {
            //echo "<script>alert('ADMIN');</script>";
            header('location: ./principal.php ');
        } elseif ($_SESSION['rol'] == 2) {
            header('location: ./princ_vet.php');
            //echo "<script>alert('VETERINARIO');</script>";
        } elseif ($_SESSION['rol'] == 3) {
            header('location: ./pric_user.php');
            //echo "<script>alert('Usuario');</script>";
        }
    }
    include("principal1.php");
    ?>
</head>

<body>
<center>
    <p><div class="text3">
        <p>¡BIENVENIDOS A SUPER DOC!<p>
            <img src="images/logo2.png" class="logo2"/>
            </center>
    </div>
</body>

