<?php include("config.php");
?>
<!DOCTYPE html>
<html lang="en-US">
<div class="header">
    <h2 class="logo">Web Site</h2>
    <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
        <i class="fas fa-ellipsis-h"></i>
    </label>
    <ul class="menu">
        <a href="casa.php">HOME</a>
        <a href="admin-videos.php">ADMIINISTAR VIDEOS</a>
        <a href="cerrar.php">SALIR</a>

        <label for="chk" class="hide-menu-btn">
            <i class="fas fa-times"></i>
        </label>
    </ul>
</div>
<?php include("header-bootstrap/header.php"); ?>

<body>
    <?php include("header-bootstrap/body.php"); ?>

</body>

</html>
