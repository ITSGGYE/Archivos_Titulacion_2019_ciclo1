<?php

$rutaArchivo = __DIR__ . '/uploads/' . filter_input(INPUT_GET, "ruta");

$nombreArchivo = basename($rutaArchivo);

header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=$nombreArchivo");

readfile($rutaArchivo);
