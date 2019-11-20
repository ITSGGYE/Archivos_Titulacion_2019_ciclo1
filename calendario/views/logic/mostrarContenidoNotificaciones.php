
	<?php
	try{
			$conexion = new PDO('mysql:host=localhost;dbname=php_evento','root','');
			}catch(PDOException $e){
				echo "Error: ". $e->getMessage();
			}
			$consulta = $conexion -> prepare("
			SELECT * FROM eventos WHERE start_normal and end_normal='false' order by id");
			$consulta ->execute();
			$consulta = $consulta ->fetchAll();
	?>

<?php foreach ($consulta as $Sql): ?>
	<?php echo "<li> <a href='index2.php?horaInicial=". $Sql['star_normal']."&end_normal=".$Sql['end_normal']."'>El horario del instructor: <strong id='probar'>". "</strong> esta sin confirmar </a></li>"; ?>									
	<?php endforeach; ?>