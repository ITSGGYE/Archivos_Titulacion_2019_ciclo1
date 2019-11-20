<?php 
include ('conexion.php');
?>
<?php 
$id=$_POST['id_oculto'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$disponible=$_POST['disponible'];
$categoria=$_POST['categoria'];
$subcategoria=$_POST['subcategoria'];
$proveedor=$_POST['proveedor']; 
$descarga=$_POST['descarga']; 
$fecha = date("Y-m-d");
$curso=$_POST['anio'];
$rutaEnServidor='images';
$rutaTemporal=$_FILES['foto']['tmp_name'];
$nombreImagen=$_FILES['foto']['name'];

$imagen=$rutaEnServidor."/".$nombreImagen;

move_uploaded_file($rutaTemporal,"/".$rutaEnServidor."/".$nombreImagen);

$actualizar = mysqli_query($conexion, "UPDATE libros set foto='$imagen',
		nombre='$nombre',
		descripcion='$descripcion',
		disponible='$disponible',
		id_categoria='$categoria',
		id_subcategoria'$subcategoria',
		id_proveedor='$proveedor',
		fecha_ingreso='$fecha',
		url_descarga='$descarga',
		curso='$curso'
		where id_libro=$id");
					if ($actualizar) {
							  echo '<script> alert("Modificacion Exitosa.");</script>';
					        echo '<script> window.location="Lista_libros.php"; </script>';
					}
					else
					{
							  echo '<script> alert("Fallo.");</script>';
					        echo '<script> window.location="Lista_libros.php"; </script>';
					}
?>
