<?php

require_once '../../conexion.php';
require_once '../../modelos/Cursos.php';
require_once '../../modelos/Pension.php';
require_once '../../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

if (!isset($_SESSION['u'])) {
    session_start();
}
$respuesta;
$meses = Pension::MesesDisponibles();
header('Content-Type: application/json');

if (filter_has_var(INPUT_POST, "actualizarprecios")) {
    $precios = $_POST['precios'];
    try {
        Conexion::ejecutar("delete from precios", []);
        Conexion::ejecutar("delete from bancos", []);
    } catch (Exception $ex) {
        
    }
    try {
        $cont = 0;
        Conexion::ejecutar("insert into bancos (banco,cuenta) values (?,?)", [filter_input(INPUT_POST, "banco"), filter_input(INPUT_POST, "cuenta")]);
        foreach (Años::listar() as $a) {
            Conexion::ejecutar("insert into precios (anio,precio) values (?,?)", [$a, $precios[$cont]]);
            $cont++;
        }
        $respuesta['status'] = "correcto";
        $respuesta['mensaje'] = "Se actualizarón los precios.";
    } catch (Exception $ex) {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "Error: " . $ex->getMessage();
    }
}

if (filter_has_var(INPUT_POST, "generarpension")) {
    $mes = filter_input(INPUT_POST, "generarpension");
    $anio_actual = date('Y');
    try {
        Pension::Generar($mes);
        $respuesta['status'] = "correcto";
        $respuesta['mensaje'] = "Se genero pensiones para el mes: " . Pension::MesesDisponibles()[$mes] . " del presente año.";
    } catch (Exception $ex) {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "Error: " . $ex->getMessage();
    }
}
if (filter_has_var(INPUT_POST, "pdfpension")) {
    $idpensiondet = filter_input(INPUT_POST, "pdfpension");
    try {
        $pension = Conexion::buscarRegistro("select e.nombres,e.apellidos,c.mes,c.anio,d.curso,d.anio_curso,d.total"
                        . ",token_genera "
                        . " from pension_det d "
                        . " inner join pension_cab c on c.id=d.idpension "
                        . " inner join estudiantes e on e.id=d.idestudiante"
                        . " where d.id=? ", [$idpensiondet]);
        $banco = Conexion::buscarRegistro("select * from bancos");
        $html2pdf = new Html2Pdf();
        $html2pdf->writeHTML('<div style="text-align:center;margin-bottom:10px"><h1>ORDEN DE PAGO </h1></div>'
                . '<table>'
                . '<tr>'
                . '<th style="height:25px;width:100px;border:.5px;padding-left:10px">Estudiante</th>'
                . '<td style="height:25px;width:610px;border:.5px;padding-left:10px">' . $pension['apellidos'] . " " . $pension['nombres'] . '</td>'
                . '</tr>'
                . '<tr>'
                . '<th style="height:25px;width:100px;border:.5px;padding-left:10px">Mes</th>'
                . '<td style="height:25px;width:610px;border:.5px;padding-left:10px">' . $meses[$pension['mes']] . " / " . $pension['anio'] . '</td>'
                . '</tr>'
                . '<tr>'
                . '<th style="height:25px;width:100px;border:.5px;padding-left:10px">Año/Curso</th>'
                . '<td style="height:25px;width:610px;border:.5px;padding-left:10px">' . $pension['anio_curso'] . " " . $pension['curso'] . '</td>'
                . '</tr>'
                . '<tr>'
                . '<th style="height:25px;width:100px;border:.5px;padding-left:10px">Banco</th>'
                . '<td style="height:25px;width:610px;border:.5px;padding-left:10px">' . $banco['banco'] . '</td>'
                . '</tr>'
                . '<tr>'
                . '<th style="height:25px;width:100px;border:.5px;padding-left:10px">N. cuenta</th>'
                . '<td style="height:25px;width:610px;border:.5px;padding-left:10px">' . $banco['cuenta'] . '</td>'
                . '</tr>'
                . '</table><br>'
                . '<table>'
                . '<tr>'
                . '<th  style="height:25px;width:560px;border:.5px;text-align:center">Motivo</th>'
                . '<th  style="height:25px;width:150px;border:.5px;text-align:center">Total</th>'
                . '</tr>'
                . '<tr>'
                . '<td  style="height:100px;width:560px;border:.5px;text-align:left;vertical-align:top;padding-top:10px;padding-left:10px">'
                . 'Pensión escolar correspondiente al mes de ' . $meses[$pension['mes']] . " / " . $pension['anio'] . ' '
                . '<br><br><br>' . substr($pension['token_genera'], 1, 80) . ''
                . '<br>' . substr($pension['token_genera'], 81, 80)
                . '<br>' . substr($pension['token_genera'], 161, 80)
                . '</td>'
                . '<td  style="height:100px;width:150px;border:.5px;text-align:center;vertical-align:top;padding-top:10px;padding-right:10px">'
                . '$' . $pension['total'] . '</td>'
                . '</tr>'
                . '<tr>'
                . '<th  style="height:25px;width:560px;"></th>'
                . '<th  style="height:25px;width:150px;border:.5px;text-align:center">$' . $pension['total'] . '</th>'
                . '</tr>'
                . '</table>');
        $html2pdf->output();
    } catch (Exception $ex) {
        echo "Error :" . $ex->getMessage();
    }

    die();
}
if (filter_has_var(INPUT_POST, "cancelarPensionAdmin")) {
    $id_detalle_pension = filter_input(INPUT_POST, "cancelarPensionAdmin");
    try {
        Conexion::ejecutar("update pension_det set cancelado='1' where id=?", [$id_detalle_pension]);
        $respuesta['status'] = "correcto";
        $respuesta['mensaje'] = "Acción realizado con exito.";
    } catch (Exception $ex) {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "Error: " . $ex->getMessage();
    }
}

if (filter_has_var(INPUT_GET, "tablapensionesestudiante")) {

    $usuarios = Conexion::buscarVariosRegistro("select d.id,c.anio,c.mes,e.nombres,e.apellidos,d.anio_curso,d.curso,d.total "
                    . " from pension_cab c "
                    . " inner join pension_det d on c.id=d.idpension "
                    . " inner join estudiantes e on e.id=d.idestudiante"
                    . " where c.estado='1' and d.cancelado='0' and d.idestudiante='" . filter_input(INPUT_GET, "tablapensionesestudiante") . "'");
    $info_usuario = array();
    if ($usuarios) {
        $tabla = "";
        $cont = 1;

        foreach ($usuarios as $u) {


            $info_usuario[] = [
                "#" => "" . $cont,
                "estudiante" => $u['nombres'] . " " . $u['apellidos'],
                "año" => $u['anio'],
                "mes" => $meses[$u['mes']],
                "añocurso" => $u['anio_curso'],
                "curso" => $u['curso'],
                "total" => "$ " . $u['total'],
                "" => "<button name='pdfpension' value='{$u['id']}' formtarget='_blank' formaction='dist/ajax/a_pension.php' class='btn btn-danger btn-sm'>PDF</button><button data-toggle='modal' type='button' onclick='abrir(" . $u['id'] . ");' data-target='#exampleModal' class='btn btn-info btn-sm'>Cancelar valor</button>"
            ];
            $cont++;
        }
        $respuesta = $info_usuario;
//     
    } else {
        $respuesta = $info_usuario;
    }
}
if (filter_has_var(INPUT_POST, "cancelarpension")) {
    $iddetalle = filter_input(INPUT_POST, "cancelarpension");
    $codigo = filter_input(INPUT_POST, "codigo");
    try {
        $validar = Conexion::buscarRegistro("select * from pension_det where id=? and token_valida=?", [$iddetalle, $codigo]);
        if ($validar) {
            Conexion::ejecutar("update pension_det set cancelado='1' where id=?", [$iddetalle]);
            $respuesta['status'] = "correcto";
            $respuesta['mensaje'] = "Se cancelo el valor de la pensión. puede ver su comprobante de pago en ordenes pagados.";
        } else {
            $respuesta['status'] = "error";
            $respuesta['mensaje'] = "Error: Codigo incorrecto";
        }
    } catch (Exception $ex) {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "Error: " . $ex->getMessage();
    }
}

if (filter_has_var(INPUT_POST, "comprobante")) {

    $usuario = Conexion::buscarRegistro("select d.id,c.anio,c.mes,e.nombres,e.apellidos,d.anio_curso,d.curso,d.total "
                    . " from pension_cab c "
                    . " inner join pension_det d on c.id=d.idpension "
                    . " inner join estudiantes e on e.id=d.idestudiante"
                    . " where c.estado='1' and d.cancelado='1' and d.id=? ",[filter_input(INPUT_POST, "comprobante")]);
   if($usuario){
    $html2pdf = new Html2Pdf();
    $html2pdf->writeHTML('<div style="text-align:center;margin-bottom:10px"><h3>Comprobante de Pago</h3></div>'
            . '<br>'
            . '<div style="border:1px;padding:5px"><div style="border:1px;padding:3px"><b>ESCUELA DE EDUCACIÓN BÁSICA PARTICULAR “GRAL ELOY ALFARO DELGADO"</b></div><br>'
            . '<div><b>Detalle del pago:</b> Cancelación de Pension Escolar.</div>'
            . '<br><div><b>Año: </b>'.$usuario['anio'].'</div>'
            . '<br><div><b>Mes: </b>'.$meses[$usuario['mes']].'</div>'
            . '<br><div><b>Curso: </b>'.$usuario['anio_curso']." ".$usuario['curso'].'</div>'
            . '<br><div><b>Total pensión cancelado: </b>$'.$usuario['total'].'</div>'
            . '</div><br><br><div style="border:1px;padding:5px">Este documento certifica la cancelación de la pensión en el mes indicado.</div>');
    $html2pdf->output();
   } else {
       echo "No se encontro información de Estudiante";    
   }
    die();
}
echo json_encode($respuesta);
