<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    
    include "header/header.php";
   ?>
    <meta charset="UTF-8">
    <title>SISTEMA MUSCULAR</title>
</head>

<body>
    <div class="header">
        <h2 class="logo">Web Site</h2>
        <input type="checkbox" id="chk">
        <label for="chk" class="show-menu-btn">
            <i class="fas fa-ellipsis-h"></i>
        </label>
        <ul class="menu">
            <a href="index.html">HOME</a>
            <a href="oseo.php">SISTEMA OSEO</a>
            <a href="juegos/portada.html">JUEGOS</a>
            <a href="video.php">VIDEOS</a>
            <a href="cerrar.php">SALIR</a>

            <label for="chk" class="hide-menu-btn">
                <i class="fas fa-times"></i>
            </label>
        </ul>
    </div>

    <?php
    
    include "cumulo/cuerpo-muscular.php";
   ?>
</body>

</html>
