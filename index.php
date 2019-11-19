<?php session_start();
 $conexion=mysqli_connect('localhost',
                    'root',
                    '',
                    'mundo_colores'); 
                    mysqli_query($conexion,"SET NAMES 'utf8'");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/bootstrap2.min.css">
<link rel="stylesheet" type="text/css" href="librerias/bootstrap/bootstrapcdn.css">
<link rel="stylesheet" type="text/css" href="librerias/datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="librerias/alertify/css/alertify.css">
<link rel="stylesheet" type="text/css" href="librerias/alertify/css/themes/bootstrap.css">
<link rel="stylesheet" type="text/css" href="librerias/fontawesome/css/font-awesome.css">

<link rel="stylesheet" type="text/css" href="css/estilomenu.css">
<script src="librerias/jquery.min.js"></script>
<script src="librerias/bootstrap/popper.min.js"></script>
<script src="librerias/bootstrap/bootstrap.min.js"></script>
<script src="librerias/datatable/jquery.dataTables.min.js"></script>
<script src="librerias/datatable/dataTables.bootstrap4.min.js"></script>
<script src="librerias/alertify/alertify.js"></script>
<script src="ayuda/validaciones.js"></script>

<style type="text/css">
    label{
        color:black;
    }
</style>
    <!-- Site Properties -->
    <title>Centro de Educacion Inicial CEI "Mundo de Colores"</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<body >


 <?php  

if(isset($_SESSION["profesor"]))
{
  echo '<script> location.href="inicio.php"; </script>';
}

if(isset($_POST["login"]))   
{  
 if(!empty($_POST["member_name"]) && !empty($_POST["member_password"]))
 {
  $name = mysqli_real_escape_string($conexion, $_POST["member_name"]);
  $password = sha1(mysqli_real_escape_string($conexion, $_POST["member_password"]));
  $sql = "SELECT p.nombre_profesor,img.nombre, u.fk_profesor , u.usuario, u.privilegio from usuarios u inner join profesor p on p.id_profesor=u.fk_profesor inner join img_profesor img on p.imagen_profesor = img.id_imagen where 
         u.usuario = '" . $name . "' and u.contrasena = '" . $password . "'";  
  $result = mysqli_query($conexion,$sql);  
  $user = mysqli_fetch_array($result);
  
  
    
    
 
  if($user)   
  {  
    
   /*if(!empty($_POST["remember"]))   
   {  
    setcookie ("member_login",$name,time()+ (10 * 365 * 24 * 60 * 60));  
    setcookie ("member_password",$password,time()+ (10 * 365 * 24 * 60 * 60));*/
    $datosprofesor = array('id' => $user['fk_profesor'], 'usuario'=>$user['usuario'],'nombre'=>$user['nombre_profesor'],'imagen'=>$user['nombre'],'privilegio'=>$user['privilegio']);
    $_SESSION["profesor"] = $datosprofesor;
  /* }  
  /* else  
   {  
    if(isset($_COOKIE["member_login"]))   
    {  
     setcookie ("member_login","");  
    }  
    if(isset($_COOKIE["member_password"]))   
    {  
     setcookie ("member_password","");  
    }  
   }*/ 
    if($_SESSION['profesor']['privilegio']==1){
    echo '<script> location.href="administracion.php"; </script>';} 
       
    
    else {
      echo '<script> location.href="inicio.php"; </script>';
    } 
  }else  
  {  
   $message = "Invalid Login";  
  } 
 }
 else
 {
  $message = "Both are Required Fields";
 }
}


 ?> 
        <div class="container ">
        <form class="form-horizontal" role="form" method="POST"   id="frmLogin">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <center><img  width="300px" height="300px" src="Imagenes/logo/logomundo.jpg">
                    </center>
                    <h2 style="color:black; text-align: center;">INGRESO AL SISTEMA</h2>
                    <hr>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label  for="email">Usuario</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"></div>
                            <input name="member_name" type="text" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" class="form-control"  requerid autofocus/>  
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        <?php if(isset($message)) {?>  <i class="fa fa-close"></i> <?php echo $message; } ?>
                             
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label  for="password">Contraseña</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"></div>
                            
                            <input name="member_password" type="password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" class="form-control" required > 
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        <!-- Put password error message here -->    
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="padding-top: .35rem">
                    <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                        
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 1rem">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <input type="submit" name="login" id="login" value="Ingresar" class="btn btn-success"></span>
                    
                    
                </div>
            </div>
        </form>
    </div>
</body>
</html>