<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once 'config.inc.php';
if (isset($_POST['subir'])) {
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = "archivos/" . $nombre;
    if ($nombre != "") {
        if (copy($ruta, $destino)) {
            $titulo= $_POST['titulo'];
            $descri= $_POST['descripcion'];
            $db=new Conect_MySql();
            $sql = "INSERT INTO tbl_documentos(titulo,descripcion,tamanio,tipo,nombre_archivo) VALUES('$titulo','$descri','$tamanio','$tipo','$nombre')";
            $query = $db->execute($sql);
            if($query){
                echo "<p class='ok'>Se guardo correctamente</p>";
            }
        } else {
            echo "Error";
        }
    }
}
?>
<html>

<head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/crud.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/modernizr_2.6.3-custom.js"></script>
    <title></title>
</head>

<body>
    <header>
        <div class="menu_bar">
            <a href="#" class="bt-menu"><i class="fas fa-align-justify"></i>Menu</a>
        </div>
        <a href=""></a>
        <nav>
            <ul>
                <li><a href="../casa.php"><i class="fas fa-home"></i> INICIO</a></li>
                <li><a href="panel-pdf.php"><i class="far fa-file-pdf"></i> DESCARGAS PDF</a></li>
                 <li><a href="cerrar.php"><i class="fas fa-sign-out-alt"></i> SALIR</a></li>
            </ul>
        </nav>
    </header>
    <div class="contenedor container-fluid">
        <h4 class="text">SUBIR PDF</h4>
        <form method="post" enctype="multipart/form-data" class="form">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">titulo</span>
                </div>
                <input type="text" class="form-control" name="titulo" placeholder="Nombre del pdf" autocomplete="off">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Descripcion</span>
                </div>
                <textarea class="form-control" rows="2" name="descripcion"></textarea>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control-file border" name="archivo" value="Subir">
            </div>
            <div class="d-flex justify-content-around">
                <div class="p-2">
                    <button type="submit" name="subir" class="btn btn-success">GRABAR</button>
                </div>
                <div class="p-2">
                    <a href="lista.php" class="btn btn-outline-info">VER LOS LISTADOS</a>
                </div>

            </div>

        </form>
    </div>
  
</body>

</html>
