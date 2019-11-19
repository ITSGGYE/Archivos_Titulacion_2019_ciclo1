<?php

if (!isset($_SESSION['u'])) {
    session_start();
}

unset($_SESSION['u']);
session_destroy();
header("location:login.php");
