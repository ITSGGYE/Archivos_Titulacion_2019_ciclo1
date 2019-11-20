<?php

function conexion($bd_config) {
    try {
        $conexion = new PDO('mysql:host=localhost:3306;dbname=' . $bd_config['db_name'], $bd_config['user'], $bd_config['pass']);
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
}

function limpiarDatos($datos) {
    $datos = htmlspecialchars($datos); //nos transforma cualquier signo de mayor (>) o menor(<) que en texto
    $datos = trim($datos); //para que no haiga espacio vacios en nuestro campo de texto
    $datos = filter_var($datos, FILTER_SANITIZE_STRING); //borra todos los mayor y menorque dejando solo el texto que tenga el campo.

    return $datos; // me retorna el contenido del dato
}

function iniciarSession($table, $conexion) {
    $statement = $conexion->prepare("SELECT * FROM $table where usuario = :usuario");
    $statement->execute([
        ':usuario' => $_SESSION['usuario']
    ]);

    return $statement->fetch(PDO::FETCH_ASSOC); //de esta forma estamos trayendo los valores de nuestra base de datos como un array asociativo
}
?>
  