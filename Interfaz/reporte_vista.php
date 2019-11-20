<?php
$mensaje='';
try{
  $conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
}catch(PDOException $e){
  echo "Error: ". $e->getMessage();
}

$consulta = $conexion -> prepare("
    SELECT  * FROM citas order by citfecha desc ");

$consulta ->execute();
$consulta = $consulta ->fetchAll();
if(!$consulta){
  $mensaje .= 'NO HAY CITAS PARA MOSTRAR';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Historial - CentroLogros</title>
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="icon" type="image/x-icon" href="img/logo.jpeg">
</head>

<body>
<?php include 'arriba/header.php'; ?>
  <section class="main">
    <div class="wrapp">
      <?php include 'arriba/nav.php'; ?>
        <article>
          <div class="mensaje">
            <h2>REPORTES</h2>
          </div>
            <br><br>
<from action="reporte_pdf.php" method="GET">
<br>
 <h1>Desde:</h1> <input type="date" name="tgl_awal" value="<?php echo $cita['cithora'];?>">
<h1>Hasta:</h1> <input type="date" name="tgl_akhir"  value="<?php echo $cita['cithora'];?>"/>

<input type="submit" value="Imprimir" >
     </form>
  <br><br><br>
        </article>

  </section>
  <br><br><br>
</body>
</html>