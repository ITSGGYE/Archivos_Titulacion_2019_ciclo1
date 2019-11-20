<?php
session_start();
include "core/autoload.php";
include 'core/modules/index/view/report/tcpdf/tcpdf.php';

$lb = new Lb();
$lb->loadModule("index");

