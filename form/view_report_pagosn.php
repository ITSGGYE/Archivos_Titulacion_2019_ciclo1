<?php
session_start();
require_once '../conexion.php';
require_once '../constantes.php';

$conexion = Conexion::obtenerConexion();
$nombre = $_POST['nombre'];
$apellido=$_POST['apellido'];
$query = "SELECT * FROM estudiantes WHERE nombres = :_nombre AND apellidos=:_apellido";
$stmt = $conexion->prepare($query);
$stmt->bindParam(':_nombre',$nombre,PDO::PARAM_STR,4000);
$stmt->bindParam(':_apellido',$apellido,PDO::PARAM_STR,4000);
$stmt->execute();
$result = $stmt->fetch();
if($result['nombres'] == $nombre && $result['apellidos'] == $apellido){

date_default_timezone_set('America/Guayaquil');
$fecha = date('Y-m-d');
$conexion = Conexion::obtenerConexion();
$query = "SELECT id,nombres,apellidos,identificador FROM estudiantes WHERE nombres = :_nombre AND apellidos=:_apellido";
$stmt = $conexion->prepare($query);
$stmt->bindParam(':_nombre',$nombre,PDO::PARAM_STR,4000);
$stmt->bindParam(':_apellido',$apellido,PDO::PARAM_STR,4000);
$stmt->execute();
$result = $stmt->fetch();
$stmt = null;
$query = null;
$id = $result['id'];
$anio = date("Y");
$query = "SELECT * FROM cobros WHERE idestudiante = :_id AND anio = :_anio";
$stmt = $conexion->prepare($query);
$stmt->bindParam(':_id',$id,PDO::PARAM_STR,4000);
$stmt->bindParam(':_anio',$anio,PDO::PARAM_STR,4000);
$stmt->execute();

$enero = 0;
$febrero = 0;
$marzo = 0;
$abril = 0;
$mayo = 0;
$junio = 0;
$julio = 0;
$agosto = 0;
$septiembre = 0;
$octubre = 0;
$noviembre = 0;
$diciembre = 0;
$mes1 = "Enero";
$mes2 = "Febrero";
$mes3 = "Marzo";
$mes4 = "Abril";
$mes5 = "Mayo";
$mes6 = "Junio";
$mes7 = "Julio";
$mes8 = "Agosto";
$mes9 = "Septiembre";
$mes10 = "Octubre";
$mes11 = "Noviembre";
$mes12 = "Diciembre";
$estdo1 = "NO PAGADO";
$estdo2 = "NO PAGADO";
$estdo3 = "NO PAGADO";
$estdo4 = "NO PAGADO";
$estdo5 = "NO PAGADO";
$estdo6 = "NO PAGADO";
$estdo7 = "NO PAGADO";
$estdo8 = "NO PAGADO";
$estdo9 = "NO PAGADO";
$estdo10 = "NO PAGADO";
$estdo11 = "NO PAGADO";
$estdo12 = "NO PAGADO";

$mes = "";
$cadena = "";
$contador = 0;
while ($cobros = $stmt->fetch()) {
  $contador++;
  if ($cobros['mes'] == 1) {
    $enero = $cobros['valor'];
    if ($cobros['estado'] == 1) {
      $estdo1 = "PAGADO";
    }else {
      $estdo1 = "NO PAGADO";
    }
  }elseif ($cobros['mes'] == 2) {
    $febrero = $cobros['valor'];
    if ($cobros['estado'] == 1) {
      $estdo2 = "PAGADO";
    }else {
      $estdo2 = "NO PAGADO";
    }
  }elseif ($cobros['mes'] == 3) {
    $marzo = $cobros['valor'];
    if ($cobros['estado'] == 1) {
      $estdo3 = "PAGADO";
    }else {
      $estdo3 = "NO PAGADO";
    }
  }elseif ($cobros['mes'] == 4) {
    $abril = $cobros['valor'];
    if ($cobros['estado'] == 1) {
      $estdo4 = "PAGADO";
    }else {
      $estdo4 = "NO PAGADO";
    }
  }elseif ($cobros['mes'] == 5) {
    $mayo = $cobros['valor'];
    if ($cobros['estado'] == 1) {
      $estdo5 = "PAGADO";
    }else {
      $estdo5 = "NO PAGADO";
    }
  }elseif ($cobros['mes'] == 6) {
    $junio = $cobros['valor'];
    if ($cobros['estado'] == 1) {
      $estdo6 = "PAGADO";
    }else {
      $estdo6 = "NO PAGADO";
    }
  }elseif ($cobros['mes'] == 7) {
    $julio = $cobros['valor'];
    if ($cobros['estado'] == 1) {
      $estdo7 = "PAGADO";
    }else {
      $estdo7 = "NO PAGADO";
    }
  }elseif ($cobros['mes'] == 8) {
    $agosto = $cobros['valor'];
    if ($cobros['estado'] == 1) {
      $estdo8 = "PAGADO";
    }else {
      $estdo8 = "NO PAGADO";
    }
  }elseif ($cobros['mes'] == 9) {
    $septiembre = $cobros['valor'];
    if ($cobros['estado'] == 1) {
      $estdo9 = "PAGADO";
    }else {
      $estdo9 = "NO PAGADO";
    }
  }elseif ($cobros['mes'] == 10) {
    $octubre = $cobros['valor'];
    if ($cobros['estado'] == 1) {
      $estdo10 = "PAGADO";
    }else {
      $estdo10 = "NO PAGADO";
    }
  }elseif ($cobros['mes'] == 11) {
    $noviembre = $cobros['valor'];
    if ($cobros['estado'] == 1) {
      $estdo11 = "PAGADO";
    }else {
      $estdo11 = "NO PAGADO";
    }
  }elseif ($cobros['mes'] == 12) {
    $diciembre = $cobros['valor'];
    if ($cobros['estado'] == 1) {
      $estdo12 = "PAGADO";
    }else {
      $estdo12 = "NO PAGADO";
    }
  }
}

ob_clean();
ob_start();
  require_once('../tcpdf/tcpdf.php');
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('System');
$pdf->SetTitle("Reporte de Pagos Pendientes ".date('Y-m-d'));
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(10, 10, 10,10);
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('times', '', 14);
$pdf->addPage();
$content = '';
echo $content = $content.'
<img src="/sistema_matricula/dist/img/encabezado.png" alt="" height="150px">
<div align="right"><b>GUAYAQUIL, '.date("d-m-Y").'</b></div>
<div align="center">
<b><h3><span>PAGOS PENDIENTES</span></h3></b>
<b><span>Nombre del Alumno(a): '.$nombre.' '.$apellido.'</span></b>
<br>
<b><span>Cedula del Alumno(a):'.$result['identificador'].'</span></b>
<br>
</div>
<table border="1" cellpadding="5" align="center" style="width:100%;">
<thead bgcolor="#001427" color="white">
  <tr>
  <th bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">#</th>
    <th bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">MESES</th>
    <th bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">AÑO</th>
    <th bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">VALOR</th>
    <th bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">ESTADO</th>
  </tr>
  </thead>
  <tbody>';
  $content = $content. '

  <tr>
    <td>1</td>
    <td>'.$mes1.'</td>
    <td>'.$anio.'</td>
    <td>'.$enero.'</td>
    <td>'.$estdo1.'</td>
  </tr>
  <tr>
    <td>2</td>
    <td>'.$mes2.'</td>
    <td>'.$anio.'</td>
    <td>'.$febrero.'</td>
    <td>'.$estdo2.'</td>
  </tr>
  <tr>
    <td>3</td>
    <td>'.$mes3.'</td>
    <td>'.$anio.'</td>
    <td>'.$marzo.'</td>
    <td>'.$estdo3.'</td>
  </tr>
  <tr>
    <td>4</td>
    <td>'.$mes4.'</td>
    <td>'.$anio.'</td>
    <td>'.$abril.'</td>
    <td>'.$estdo4.'</td>
  </tr>
  <tr>
    <td>5</td>
    <td>'.$mes5.'</td>
    <td>'.$anio.'</td>
    <td>'.$mayo.'</td>
    <td>'.$estdo5.'</td>
  </tr>
  <tr>
    <td>6</td>
    <td>'.$mes6.'</td>
    <td>'.$anio.'</td>
    <td>'.$junio.'</td>
    <td>'.$estdo6.'</td>
  </tr>
  <tr>
    <td>7</td>
    <td>'.$mes7.'</td>
    <td>'.$anio.'</td>
    <td>'.$julio.'</td>
    <td>'.$estdo7.'</td>
  </tr>
  <tr>
    <td>8</td>
    <td>'.$mes8.'</td>
    <td>'.$anio.'</td>
    <td>'.$agosto.'</td>
    <td>'.$estdo8.'</td>
  </tr>
  <tr>
    <td>9</td>
    <td>'.$mes9.'</td>
    <td>'.$anio.'</td>
    <td>'.$septiembre.'</td>
    <td>'.$estdo9.'</td>
  </tr>
  <tr>
    <td>10</td>
    <td>'.$mes10.'</td>
    <td>'.$anio.'</td>
    <td>'.$octubre.'</td>
    <td>'.$estdo10.'</td>
  </tr>
  <tr>
    <td>11</td>
    <td>'.$mes11.'</td>
    <td>'.$anio.'</td>
    <td>'.$noviembre.'</td>
    <td>'.$estdo11.'</td>
  </tr>
  <tr>
    <td>12</td>
    <td>'.$mes12.'</td>
    <td>'.$anio.'</td>
    <td>'.$diciembre.'</td>
    <td>'.$estdo12.'</td>
  </tr>
</tbody>
</table>
<br>
<br>
<br>
<img src="/sistema_matricula/dist/img/pie_de_pagina.png" alt="" height="150px">
';
$pdf->writeHTML($content, true, 0, true, 0);
$pdf->lastPage();
ob_end_clean();
$pdf->output('Reporte_de_cobro_'.date('Y-m-d').'.pdf', 'I');
}else{
    echo "<script>alert('NO EXISTEN DATOS');"
    . "window.location='reporte_Pagos_Pendiente.php';"
            . "</script>;";
}