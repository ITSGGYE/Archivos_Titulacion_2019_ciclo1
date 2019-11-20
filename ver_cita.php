<?php session_start();
    if(!isset($_SESSION['usuario'])){
    header('Location: login.php');
    }   
    require 'modelo.php';
    
    try{
        $conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
    }catch(PDOException $e){
        echo "ERROR: " . $e->getMessge();
        die();
    }
if($_SERVER['REQUEST_METHOD']=='POST'){
        $id = limpiarDatos($_POST['id']);
        $fecha = limpiarDatos($_POST['fecha']);
        $hora = limpiarDatos($_POST['hora']);
        $paciente = limpiarDatos($_POST['paciente']);
        $medico = limpiarDatos($_POST['medico']);
        $estado = limpiarDatos($_POST['estado']);
        $observaciones = limpiarDatos($_POST['observaciones']);

        $statement ->execute(array(
            ':id'=>$id,
            ':fecha'=> $fecha,
            ':hora'=> $hora,
            ':paciente'=> $paciente,
            ':medico'=> $medico,
            ':estado'=> $estado,
            ':observaciones'=> $observaciones
            ));
        header('Location: citas.php');
    }else{
      $id_cita = id_numeros($_GET['idcita']);
        if(empty($id_cita)){
            header('Location: citas.php');
        }
        $cita = obtener_cita_id($conexion,$id_cita);
        
        if(!$cita){
            header('Location: citas.php');
        }
        $cita =$cita[0];
    }
    require 'Interfaz/ver_cita.php';
?>