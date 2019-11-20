<?php

require '../Conexion/config.php';
require '../Conexion/functions.php';

$per_cedula = $_POST['per_cedula'];
$per_nombre = $_POST['per_nombre'];
$per_direccion = $_POST['per_direccion'];
$per_fecha_nac = $_POST['per_fecha_nac'];
$per_lugarNacimiento = $_POST['per_lugarNacimiento'];
$per_correo = $_POST['per_correo'];
$per_telefono = $_POST['per_telefono'];
$per_nombresPadre = $_POST['per_nombresPadre'];
$per_nombresMadre = $_POST['per_nombresMadre'];
$per_observacion = $_POST['per_observacion'];
$per_usuario = $_POST['per_usuario'];
$per_fechaRegistro = $_POST['per_fechaRegistro'];


$Estado = ""
        . "";

if (is_null($per_cedula) || empty($per_cedula)) {//compruebo si que el numero enviado es vacio o null
    echo "Por Favor Ingrese la Cedula";
} else {//caso contrario sigo el proceso
    if (is_numeric($per_cedula)) {
        $total_caracteres = strlen($per_cedula); // se suma el total de caracteres

        if ($total_caracteres == 10) {//compruebo que tenga 10 digitos la cedula
            $nro_region = substr($per_cedula, 0, 2); //extraigo los dos primeros caracteres de izq a der

            if ($nro_region >= 1 && $nro_region <= 24) {// compruebo a que region pertenece esta cedula//
                $ult_digito = substr($per_cedula, -1, 1); //extraigo el ultimo digito de la cedula
                //extraigo los valores pares//
                $valor2 = substr($per_cedula, 1, 1);
                $valor4 = substr($per_cedula, 3, 1);
                $valor6 = substr($per_cedula, 5, 1);
                $valor8 = substr($per_cedula, 7, 1);
                $suma_pares = ($valor2 + $valor4 + $valor6 + $valor8);
                //extraigo los valores impares//
                $valor1 = substr($per_cedula, 0, 1);
                $valor1 = ($valor1 * 2);
                if ($valor1 > 9) {
                    $valor1 = ($valor1 - 9);
                } else {
                    
                }
                $valor3 = substr($per_cedula, 2, 1);
                $valor3 = ($valor3 * 2);
                if ($valor3 > 9) {
                    $valor3 = ($valor3 - 9);
                } else {
                    
                }
                $valor5 = substr($per_cedula, 4, 1);
                $valor5 = ($valor5 * 2);
                if ($valor5 > 9) {
                    $valor5 = ($valor5 - 9);
                } else {
                    
                }
                $valor7 = substr($per_cedula, 6, 1);
                $valor7 = ($valor7 * 2);
                if ($valor7 > 9) {
                    $valor7 = ($valor7 - 9);
                } else {
                    
                }
                $valor9 = substr($per_cedula, 8, 1);
                $valor9 = ($valor9 * 2);
                if ($valor9 > 9) {
                    $valor9 = ($valor9 - 9);
                } else {
                    
                }

                $suma_impares = ($valor1 + $valor3 + $valor5 + $valor7 + $valor9);
                $suma = ($suma_pares + $suma_impares);
                $dis = substr($suma, 0, 1); //extraigo el primer numero de la suma
                $dis = (($dis + 1) * 10); //luego ese numero lo multiplico x 10, consiguiendo asi la decena inmediata superior
                $digito = ($dis - $suma);
                if ($digito == 10) {
                    $digito = '0';
                } else {
                    
                }//si la suma nos resulta 10, el decimo digito es cero
                if ($digito == $ult_digito) {//comparo los digitos final y ultimo
                    //echo "Cedula Correcta";
                    $Estado = "C";
                } else {
                    $Estado = "I";
                    echo "Cedula Incorrecta";
                }
            } else {
                echo "Este Nro de Cedula no corresponde a ninguna provincia del ecuador";
            }
        } else {
            echo "Esta Cedula tiene "." ".$total_caracteres." digitos";
        }
    } else {
        echo "Esta Cedula no corresponde a una  Cedula de Ecuador";
    }
}

if ($per_fecha_nac > $per_fechaRegistro) {
    echo 'Fecha incorrecta';
    exit();
}

if ($Estado == "C") {

    $errores = "";
    $Exito = "Datos Guardados con exito";
    $Error = "Error al Guardar datos intentelo nuevamente";

    if (empty($per_cedula) || empty($per_nombre) || empty($per_usuario) || empty($per_fechaRegistro)) {
        $errores .="Por favor rellene todos los campos";
    } else {
        // validacion de que la persona no exista
        $conexion = conexion($bd_config); //traemos los valores de la conexion
        $statement = $conexion->prepare('select * from personas where per_cedula = :per_cedula LIMIT 1'); //creamos una variable statement que va a ser igual a nuestra variable de conexion y que va a preparar un sentencia de sql
        //seleccionar todo de la tabla usuario where  usuario sea igual a un placeholder o variable vacia que tiene que ser asignada con el limite de uno, o sea un solo registro
        $statement->execute([//ejecutamos nuestra sentencia sql,abrimos un array
            ':per_cedula' => $per_cedula
        ]);
        $resultado = $statement->fetch(); //que la variable resultado nos va a traer toda nuestra sentecia sql, trayendo todos los valores de la tabla usuarios

        if ($resultado != false) {// si el cura ya se encuentra en la base
            $errores .= 'Este Registro ya existe en la base';
        }
    }

    if ($errores == "") {

        $conexion = conexion($bd_config);

        $statement = $conexion->prepare('INSERT INTO personas (per_cedula, per_nombre, per_direccion,per_fecha_nac,per_lugarNacimiento,per_correo,per_telefono, per_nombresMadre, per_nombresPadre, per_observacion, per_usuario, per_fechaRegistro)'
                . 'VALUES(:per_cedula, :per_nombre, :per_direccion, :per_fecha_nac, :per_lugarNacimiento, :per_correo, :per_telefono, :per_nombresMadre, :per_nombresPadre, :per_observacion, :per_usuario, :per_fechaRegistro)');

        if ($statement->execute([
                    ':per_cedula' => $per_cedula,
                    ':per_nombre' => $per_nombre,
                    ':per_direccion' => $per_direccion,
                    ':per_fecha_nac' => $per_fecha_nac,
                    ':per_lugarNacimiento' => $per_lugarNacimiento,
                    ':per_correo' => $per_correo,
                    ':per_telefono' => $per_telefono,
                    ':per_nombresMadre' => $per_nombresMadre,
                    ':per_nombresPadre' => $per_nombresPadre,
                    ':per_observacion' => $per_observacion,
                    ':per_usuario' => $per_usuario,
                    ':per_fechaRegistro' => $per_fechaRegistro
                ])) {
            echo $Exito;
        } else {
            echo $Error;
        }
    } else {
        echo $errores;
    }
}
?>
  
