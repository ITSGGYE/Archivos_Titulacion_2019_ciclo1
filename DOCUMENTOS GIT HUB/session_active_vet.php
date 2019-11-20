<?php

error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
if
 (isset($_SESSION['user'])) {
    if ($_SESSION['rol'] != 2) {
        if ($_SESSION['rol'] == 1) {
            header('location: principal.php');
        } elseif ($_SESSION['rol'] == 3) {
            header('location: princ_user.php');
        }
    }
} else {
    header('location: index1.php');
}

