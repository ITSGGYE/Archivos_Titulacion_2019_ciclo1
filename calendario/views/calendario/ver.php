<?php while ($db_file = $db_result -> fetch(PDO::FETCH_ASSOC)): ?>

<p><strong>Fecha de inicio:</strong> <?php echo $db_file["start_normal"]; ?><br>
  <strong>Fecha de finalización:</strong> <?php echo $db_file["end_normal"]; ?></p>

<h3>Detalles:</h3>
<p><?php echo nl2br($db_file["descripcion"]); ?></p>

<p><a href="index2.php?action=eliminar&id=<?php echo $db_file["id"]; ?>" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-remove"></span> Eliminar</a></p>
<?php endwhile; ?>