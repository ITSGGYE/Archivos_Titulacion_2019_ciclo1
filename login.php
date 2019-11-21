<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style_login.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/all.css" />
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css‌​/bootstrap-glyphicon‌​s.css">



<title>ADMINISTRADOR</title>
</head>

<body>
	<div class="container">
    	<div class="imgbx">
        	<img src="images/logo.png" />
        </div>
        <div class="loginbox">
        	<h3>Ingresar</h3>
            <form action="php/ingreso_mto.php" method="post">
            	<div class="inputBox">
                <span><i class="fa fa-user" aria-hidden="true"></i>
</span>
                	<input type="text" name="user" placeholder="Usuario"  required/>
                    
                </div>
                <div class="inputBox">
               		<span><i class="fa fa-lock" aria-hidden="true"></i>
</span>
                	<input type="password" name="clave" placeholder="Contraseña" required/>
                    
                </div>
                <input type="submit" name="" value="Ingresar" />
                <input type="button" name="" value="Cancelar" onclick="location.href='index.html'" />
                
            </form>
        </div>
    </div>
    
</body>
</html>