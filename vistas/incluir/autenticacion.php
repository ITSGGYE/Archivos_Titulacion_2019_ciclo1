<?php

@session_start(); 

$accedido = false;
if (isset($_SESSION['usrNombre'])) {
    $accedido = true;
    /*$usr = $_SESSION['usrNombre'];
    if (!empty($usr))
        $accedido = true;*/
}

if(!$accedido) { 
	$this->redirect("usuarios", "acceder");
}

?>