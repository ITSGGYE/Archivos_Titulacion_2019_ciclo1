<?php
  $conexion = mysqli_connect("localhost","root","","multimedia");
$sql = "SELECT * FROM media";
	 $resultado = mysqli_query($conexion,$sql);

?>

<head>
  <?php include("header-bootstrap/header.php"); ?>
</head>
<h1 class="text-center">PANEL DE USUARIO <small>ADMINISTARDOR DE VIDEOS</small></h1>
<HR>
</HR>
<div class="container">
    <div class="tablas table">
        <div class="row table-responsive-md tabla">
            <table class="table table-striped datos-tabla">
                <thead class="menu-tabla">
                    <tr>
                        <th>Cod</th>
                        <th>Descripcion</th>
                        <th>Ruta</th>
                        <th>Fecha creada</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>

                <tbody class="menu-datos">
                    <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $row['media_id']; ?></td>
                        <td><?php echo $row['media_name_original']; ?></td>
                        <td><?php echo $row['media_type']; ?></td>
                        <td><?php echo $row['created_date']; ?></td>
                        <td><a href="#" data-href="elimina.php?media_id=<?php echo $row['media_id']; ?>" data-toggle="modal" data-target="#confirm-delete"><i class="far fa-trash-alt"></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
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
<div class="container">
   <a href="subir-videos.php" class="btn btn-primary" type="button">AGREGAR VIDEOS</a> 
</div>

<script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

        $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    });

</script>
