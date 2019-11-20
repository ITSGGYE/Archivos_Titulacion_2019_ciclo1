<?php
include("php/dbconnect.php");

$error = '';
if(isset($_POST['login']))
{

$username =  mysqli_real_escape_string($conn,trim($_POST['username']));
$password =  mysqli_real_escape_string($conn,$_POST['password']);

if($username=='' || $password=='')
{
$error='All fields are required';
}

$sql = "select * from user where username='".$username."' and password = '".md5($password)."'";

$q = $conn->query($sql);
if($q->num_rows==1)
{
$res = $q->fetch_assoc();
$_SESSION['rainbow_username']=$res['username'];
$_SESSION['rainbow_uid']=$res['id'];
$_SESSION['rainbow_name']=$res['name'];
echo '<script type="text/javascript">window.location="index.php"; </script>';

}else
{
$error = 'Usuario o contraseña inválida';
}

}

?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login | Sistema de Matriculación y Pensiones</title>

        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/font-awesome.css" rel="stylesheet" />
        <link href="css/basic.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <style>
            .myhead {
                margin-top: 0px;
                margin-bottom: 0px;
                text-align: center;
            }
            
            body {
                background: url(img/image5.jpg);
                background-size: cover;
                background-repeat: no-repeat;
            }
        </style>

    </head>

    <body>
        <div class="container">

            <div class="row ">

                <div>
                    <div class="panel-body box-center">
                        <h3 class="myhead">Sistema de Matriculación y Pensiones</h3>
                        <h2 class="myhead">Colegio Particular Oriente Ecuatoriano</h2>
                        <form role="form" action="login.php" method="post">
                            <hr />
                            <?php
                                    if($error!='')
                                    {                                   
                                    echo '<h5 class="text-danger text-center">'.$error.'</h5>';
                                    }
                                    ?>

                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                    <input type="text" class="form-control" placeholder="Tu Usuario " name="username" required />
                                </div>

                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                    <input type="password" class="form-control" placeholder="Tu Clave" name="password" required />
                                </div>

                                <button class="btn btn-primary" type="submit" name="login">Ingresar</button>

                        </form>
                    </div>

                </div>

            </div>
        </div>

    </body>

    </html>