<?PHP

//echo "ingresa";
include("inicio_sesion.php");
 $mi_usr=$_POST['user'];
 $mi_pwd=$_POST['clave'];
$ingreso=sesion_adm($mi_usr,$mi_pwd); 

//echo "ingresa".$ingreso;
if($ingreso==1)
{
	echo "<script>
		window.location='../mantenimiento.html';
		alertify.success('Ingreso Correcto');
	</script>";
	//return(1);
	}
else
{
	echo "<script>
		alert('Ingreso Incorrecto. No tiene Autorizacion de ingreso');
		window.location='../index.html';
		</script>";
		}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="../css/style.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="http://yui.yahooapis.com/2.9.0/build/reset/reset-min.css">
 <link rel="stylesheet" href="../css/stylesheet.css">
  <link rel="stylesheet" href="alertifyjs/css/alertify.css" />
    <link rel="stylesheet" href="alertifyjs/css/themes/default.css" />
 <script src="alertifyjs/alertify.js"></script>
 </head>
 <body>
 </body>
</html>