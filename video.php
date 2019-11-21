<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    
    include "header/header.php";
   ?>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/vieos.css">
    <title>SISTEMA OSEO</title>
</head>

<body>
    <div class="header">
        <h2 class="logo">Web Site</h2>
        <input type="checkbox" id="chk">
        <label for="chk" class="show-menu-btn">
            <i class="fas fa-ellipsis-h"></i>
        </label>
        <ul class="menu">
            <a href="casa.php">HOME</a>
            <a href="subir-videos.php">SUBIR VIDEOS</a>
            <a href="cerrar.php">SALIR</a>

            <label for="chk" class="hide-menu-btn">
                <i class="fas fa-times"></i>
            </label>
        </ul>
    </div>

    <?php
    
    include "cumulo/cuerpo-video.php";
   ?>
</body>

</html>
