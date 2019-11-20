
<?php include('header.php'); ?>
<div class="container">
    <div class="margin-top">
        <div class="row">
            <?php include('head1.php'); ?>
        </div></div></div>



<!DOCTYPE html>
<?php
require_once 'valid1.php';
?>
<html lang = "eng">
    <head>
        <meta charset = "utf-8" />
        <meta name = "viewport" content = "width=device-width, initial-scale=1" />
        <link rel = "stylesheet" type = "text/css" href = "css1/bootstrap-index.css" />
        <link rel = "stylesheet" type = "text/css" href = "css1/chosen.min.css" />
        <link rel = "stylesheet" type = "text/css" href = "css1/jquery.dataTables.css" />
        <link rel="stylesheet" href="estilos.css">
    </head>
    <style media="screen">
        body{
            max-width: 100%;
        }



    </style>
    <body style = "background:url('images/fondob.jpg');">
        <nav class = "navbar navbar-default navbar-fixed-top">
            <div class = "container-fluid">
                <div class = "navbar-header">
                    <img src = "images/febresc.png" width = "50px" height = "50px" />
                    <h4 class = "navbar-text navbar-right">Sistema de Biblioteca | Colegio Fiscal Industrial Febres Cordero</h4>
                </div>
            </div>




        </nav>
        


            <div class = "col-lg-1"></div>
            <div class = "col-lg-9 well" style = "margin-top:10px;">
<CENTER><div class = "alert alert-info">LIBROS DISPONIBLES</div>
</CENTER>


<div id = "book_table">
                        <div class="table-responsive">
                            <table id = "table" class = "table table-bordered">
                                <thead class = "alert-success">
                        <tr>
                            <th id="table_titulo">Titulo del libro</th>
                            <th id="table-categoria">Categoria de libro</th>
                            <th id="table-autor">Autor</th>
                            <th id="table-fecha">Fecha de Publicación</th>
                            <th id="table-cant">Cant.</th>
                            <th id="table-cant">Disponible</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php
                        $q_book = $conn->query("SELECT * FROM `book`") or die(mysqli_error());
                        while ($f_book = $q_book->fetch_array()) {
                            $q_borrow = $conn->query("SELECT SUM(qty) as total FROM `borrowing` WHERE `book_id` = '$f_book[book_id]' && `status` = 'Borrowed'") or die(mysqli_error());
                            $new_qty = $q_borrow->fetch_array();
                            $total = $f_book['qty'] - $new_qty['total'];
                            ?>
                            <tr>

                                <td id="table_titulo"><?php echo $f_book['book_title'] ?></td>
                                <td id="table-categoria"><?php echo $f_book['book_category'] ?></td>
                                <td id="table-autor"><?php echo $f_book['book_author'] ?></td>
                                <td id="table-fecha"><?php echo date("m-d-Y", strtotime($f_book['date_publish'])) ?></td>
                                <td id="table-cant"><?php echo $f_book['qty'] ?></td>
                                <td id="table-cant"><?php echo $total ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


    </form>

    



    <nav class = "navbar navbar-default navbar-fixed-bottom">
        <div class = "container-fluid">
            <label class = "navbar-text pull-right">Sistema de Biblioteca | Creado por BELLA YAGUAL Y STEPHANY TORRES &copy; Todos los Derechos Reservados 2019</label>
        </div>
    </nav>
</body>
<script src = "js/jquery.js"></script>


<script src = "js/jquery.dataTables.js"></script>
<script src = "js/chosen.jquery.min.js"></script>



</script>
<script type = "text/javascript">
    $(document).ready(function () {
        $("#table").DataTable();
    });
</script>
<?php
