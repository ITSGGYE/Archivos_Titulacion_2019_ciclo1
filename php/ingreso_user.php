<?php


session_start();

include("ingreso_user_compras.php");

$usuario_compras=ingreso_compras($_REQUEST['cedula'],$_REQUEST['clave'])
;
//echo "resultqado:".$usuario_compras;
if ($usuario_compras=='0'){
	
	echo("<h1 class='titulo_h1' style='margin-top:100px;'> Usuario No Existe</h1>
			");
		echo "<script>
		 
			function r() { location.href='../catalogo.php'} 
			setTimeout ('r()', 3000);
		 
		 </script>";
}
else{
		echo "<script>
	
	window.location.href='../catalogo.php'
		
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