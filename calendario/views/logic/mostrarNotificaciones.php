<?php
			try{
				$conexion = new PDO('mysql:host=localhost;dbname=php_evento','root','');
			}catch(PDOException $e){
				echo "Error: ". $e->getMessage();
			}
			
			$consultaEst = $conexion -> prepare("
			SELECT count(*) as estados FROM eventos WHERE start_normal and end_normal='false'");
			$consultaEst ->execute();
			$consultaEst = $consultaEst ->fetchAll();
?>
<?php foreach ($consultaEst as $Sql): ?>
	<?php echo "<i class='notification'>". $Sql['estados']. "</i>"; ?>									
<?php endforeach; ?>
										<strong>NOTIFICACIONES</strong>
									</a>
