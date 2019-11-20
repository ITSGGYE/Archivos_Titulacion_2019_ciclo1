<?php
include_once 'includes/user.php';
include_once 'includes/user_session.php';


$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    include_once '"C:\xampp\htdocs\biblioteca\index.php"';

}else if(isset($_POST['username'])){
    
    $userForm = $_POST['username'];
    

    $user = new User();
    if($user->userExists($userForm)){
        //echo "Existe el usuario";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        include_once '"C:\xampp\htdocs\biblioteca\index.php"';
    }else{
        //echo "No existe el usuario";
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        include_once 'ingreso.php';
    }
}else{
    //echo "login";
    include_once 'ingreso.php';
}



?>