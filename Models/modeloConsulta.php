<?php

session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';

$accion = (isset($_GET['accion'])) ? $_GET['accion'] : 'leer';


switch ($accion) {

    case 'agregar':
        //instruccion de agregar
        $Mensaje = "";
        $usuario = $_POST['usuario'];
        $idAgenda = $_POST['idAgenda'];
        
        
        $conexion = conexion($bd_config);
        $str = " Select * from agendaeventos where idAgenda= '$idAgenda' ";


        $statement = $conexion->prepare($str);
        $statement->execute();
        $resultado = $statement->fetch();

        if ($resultado != false) {
            $Mensaje = 'No puede insertar la misma tarea 2 veces';
        }

        if ($Mensaje == "") {
            $conexion = conexion($bd_config);
            $sql = " INSERT INTO agendaeventos(title,descripcion,color,textColor,start,end,usuario) 
            values(:title,:descripcion,:color,:textColor,:start,:end,:usuario) ";

            $statement = $conexion->prepare($sql);
            $statement->execute([
                ':title' => $_POST['title'],
                ':descripcion' => $_POST['descripcion'],
                ':color' => $_POST['color'],
                ':textColor' => $_POST['textColor'],
                ':start' => $_POST['start'],
                ':end' => $_POST['end'],
                ':usuario' => $_POST['usuario']
            ]);
            $Mensaje = "Tarea Registrada con exito";
        }

        echo $Mensaje;
        break;

    case 'eliminar':
        //instruccion de Eliminar
        $respuesta = "Tarea Eliminada Correctamente";
        $idAgenda = $_POST['idAgenda'];
        if (isset($_POST['idAgenda'])) {
            $conexion = conexion($bd_config);
            $statement = $conexion->prepare("Delete from agendaeventos where idAgenda = '$idAgenda' ");
            $statement->execute();
        }
        echo json_encode($respuesta);
        break;

    case 'modificar':
        $respuesta = "Tarea Modificada Correctamente";
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare("UPDATE agendaeventos set title= :title,descripcion=:descripcion,color=:color,textColor=:textColor,"
                . "start=:start,end = :end WHERE idAgenda = :idAgenda ");
        $statement->execute([
            ':idAgenda' => $_POST['idAgenda'],
            ':title' => $_POST['title'],
            ':descripcion' => $_POST['descripcion'],
            ':color' => $_POST['color'],
            ':textColor' => $_POST['textColor'],
            ':start' => $_POST['start'],
            ':end' => $_POST['end']
        ]);
        echo json_encode($respuesta);
        break;
    default:
        

        $nomusuario = $_GET['nomusuario'];
        $Eventos = [];
        $conexion = conexion($bd_config);

        $statement = $conexion->prepare("Select * from agendaeventos where usuario ='$nomusuario' ");
        $statement->execute();

        while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
            $Eventos[] = $data;
        }
        echo json_encode($Eventos);


        break;
}
?>
  
