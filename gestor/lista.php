<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
     <script src="../js/jquery.js"></script>
    <script src="../js/menu.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
                <li><a href="index.php"><i class="fas fa-home"></i> INICIO</a></li>
                 <li><a href="index.php"><i class="far fa-file-pdf"></i> AGREGAR PDF</a></li>
                <li><a href="cerrar.php"><i class="fas fa-sign-out-alt"></i> SALIR</a></li>
            </ul>
        </nav>
    </header>
    <div class="container table-responsive">
       <h1 class="text-center text-lowercase">PDF AGREGADOS <small>A SU LISTA</small></h1>
       <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>TITULO</th>
                    <th>DESCRIPCION</th>
                    <th>TAMAÑO</th>
                    <th>TIPO</th>
                    <th>NOMBRE DEL ARCHIVO</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                <?php
        include 'config.inc.php';
        $db=new Conect_MySql();
            $sql = "select*from tbl_documentos";
            $query = $db->execute($sql);
            while($datos=$db->fetch_row($query)){?>
                <tr>
                    <td><?php echo $datos['titulo']; ?></td>
                    <td><?php echo $datos['descripcion']; ?></td>
                    <td><?php echo $datos['tamanio']; ?></td>
                    <td><?php echo $datos['tipo']; ?></td>
                    <td><a href="archivo.php?id=<?php echo $datos['id_documento']?>"><?php echo $datos['nombre_archivo']; ?></a></td>
                    <td><a href="#" data-href="elimina.php?id_documento=<?php echo $datos['id_documento']; ?>" data-toggle="modal" data-target="#confirm-delete"><i class="glyphicon glyphicon-trash"></a></td>

                </tr>

                <?php  } ?>


            </tbody>
        </table>

    </div>
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
                </div>

                <div class="modal-body">
                    ¿Desea eliminar este registro?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });

    </script>
    
</body>

</html>
