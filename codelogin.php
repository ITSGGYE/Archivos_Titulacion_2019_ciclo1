<?php
session_start();
    include 'conexion.php'; 

    // data sent from form login.html 
//  $email = $_POST['correo'];
    $datitos = $_POST['email']; 
    $password = $_POST['contrasena'];
    
    // Query sent to database
    $result = mysqli_query($conexion, "SELECT id_clientes, contrasena, nombre, email, rol FROM clientes 
                                        WHERE email = '$datitos' OR nombre = '$datitos' ");
    
    // Variable $row hold the result of the query
    $row = mysqli_fetch_assoc($result);
    
    // Variable $hash hold the password hash on database
    $hash=$row['contrasena'];
    // $pepit = "Pepito Rodriguez";
    /* 
    password_Verify() function verify if the password entered by the user
    match the password hash on the database. If everything is ok the session
    is created for one minute. Change 1 on $_SESSION[start] to 5 for a 5 minutes session.
    */
    if (trim(md5($_POST['contrasena'])) != trim($hash)) { 
        // echo "<div class='alert alert-danger' role='alert'>Correo y contraseña incorrecta!
        // <p><a href='../index.php'><strong>Por favor intente de nuevo!</strong></a></p></div>"; 
        // echo md5($_POST['contrasena']);
        // echo("<br>");
        // echo($hash);      
        session_destroy();
        $error = "contraseña o correo incorrecto";
        // header("Location: login.php"); 
$arr = array(
  'error'=>'Contraseña incorrecta',
  'accion'=>'0'
);
echo json_encode($arr);

    } else {
        
        $_SESSION['loggedin'] = true;
        $_SESSION['usuario'] = $row['nombre'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['rol'] = $row['rol'];
        $_SESSION['id'] = $row['id_clientes'];
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (30 * 60) ; 

         // exit(header("Location: escritorio.php"));
        // echo "<div class='alert alert-success' role='alert'><strong>Bienvenido!</strong> $row[usuario]           
        // <p><a href='edit-profile.php'>Edit Profile</a></p>   
        // <p><a href='logout.php'>Logout</a></p></div>";   
        //  header("location:dashboard.php"); 
        // function rol() {

        $rol = $_SESSION['rol']; 
                if($rol != 1){
                    $arr = array(
                      'error'=>'0',
                      'accion'=>'escritorio.php',
                      'rol=' =>'administrador'
                    );
                    echo json_encode($arr);
                }else{
                    $arr = array(
                      'error'=>'0',
                      'accion'=>'escritorioUsuario.php',
                      'rol=' =>'usuario'
                    );
                    echo json_encode($arr);
        };
        // rol();
        // } 
    }
?>