<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="en-US">

<head>
<?php include("header_boot.php"); ?>
</head>
<script src="js/menu.js"></script>
<body>
    <header>
        <div class="menu_bar">
            <a href="#" class="bt-menu"><i class="fas fa-align-justify"></i>Menu</a>
        </div>
        <a href=""></a>
        <nav>
            <ul>
                <li><a href="casa.php"><i class="fas fa-home"></i> INICIO</a></li>
                <li><a href="admin_media.php" ><i class="far fa-file-video"></i> ADMINIISTRA VIDEOS</a></li>
                <li><a href="cerrar.php"><i class="fas fa-sign-out-alt"></i> SALIR</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1 class="text-center font-weight-lig font-ital">GALERIA <small>VIDEOS</small></h1>
        <div class="row">
            <hr>
        </div>
      <?php include("cuerpo_video.php"); ?>
        <!-- Photo Gallery Ends -->



        <!-- Upload Media Starts -->
        <div class="row">
            <hr>
            <h3>AGREGAR COLECION</h3>
            <div id="upload_button_group">
                <!-- <a href="javascript:void(0)" class="button" id="upload_button">Desde mi computadora</a>-->
                <a href="javascript:void(0)" class="button button-blue" id="upload_button_URL">Desde la URL de YouTube</a>
            </div>
            <form id="upload_form" name="upload_form" method="post" action="media_upload.php" enctype="multipart/form-data">
                <input type="file" id="upload_media" name="upload_media" accept="image/*" style="display:none">
            </form>
            <form id="upload_form_url" name="upload_form_url" method="post" action="media_upload.php" style="display:none">
                <input class="text-field" name="youtube_url" id="youtube_url" type="text" placeholder="Please enter YouTube URL">
                <a href="javascript:void(0)" class="button" id="upload_button_URL_save">Guardar</a>
                <a href="javascript:void(0)" class="button button-blue" id="upload_button_URL_cancel">Cancel</a>
            </form>
        </div>
        <!-- Upload Media Ends -->

        <br>
    </div>
</body>

</html>
