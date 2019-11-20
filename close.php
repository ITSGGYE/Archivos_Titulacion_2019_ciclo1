<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php session_start();

require 'Conexion/config.php';
require 'Conexion/functions.php';

session_destroy(); // destruimos la session

header('Location: ' . RUTA . 'login.php');
?>
    