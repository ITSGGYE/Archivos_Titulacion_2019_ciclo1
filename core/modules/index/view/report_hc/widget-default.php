<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    ob_clean();
    ob_start();
    //require_once "./core/modules/report/tcpdf/tcpdf.php";
    date_default_timezone_set("America/Guayaquil");
    $cedula = $_POST['cedula'];
    $objConexion = new Database();
    $conexion = $objConexion::getCon();
    $query = "SELECT id FROM pacient WHERE cedula = $cedula ";
    $stmt = $conexion->query($query);
    $result = $stmt->fetch_array();
    $id = $result['id'];
    $query = "SELECT * FROM reservation,pacient WHERE pacient_id = $id AND pacient.id = $id AND estado = 0 ORDER BY date_at ASC";
    $stmt = $conexion->query($query);
    $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Bookmedick System');
    $pdf->SetTitle("LISTA DE HC " . date('Y-m-d'));
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetMargins(10, 10, 10, false);
    $pdf->SetAutoPageBreak(true, 20);
    $pdf->SetFont('times', '', 12);
    $pdf->addPage();
    $content = '';
    $content .= '
            <div class="row">
            <div class="col-md-12">
            <h1 style="text-align:center;">LISTA DE HC <br> ' . $date . '</h1>
            <center>
                <table border="1"  align="center" width=100  style="width:100%;">
            <thead>
             <tr>
             <th  style="max-width:30px; font-weight: bold;">ID</th>
                            <th style="max-width:auto; font-weight: bold;">CEDULA</th>
                            <th style="max-width:auto; font-weight: bold;">NOMBRES</th>
                            <th style="max-width:auto; font-weight: bold;">FECHA</th>
                            <th  style="max-width:auto; font-weight: bold;">HORA</th>
                            <th style="max-width:auto; font-weight: bold;">MOTIVO</th>
                            <th style="max-width:auto; font-weight: bold;">DESCRIPCION</th>
            </tr>
            </thead>
	';
    $cadena = "
             "
    ;
    $cont = 0;
    while
    ($data = $stmt->fetch_array(MYSQLI_ASSOC)) {
        $cont++;
        $content = $content . '
            <tr>
            <td  style="max-width:auto; font-weight: bold;">' . $cont . '</td>
                <td  style="max-width:auto; font-weight: bold;">' . $data["cedula"] . '</td>
                    <td  style="max-width:auto; font-weight: bold;">' . $data["name"] . " " . $data["lastname"] . '</td>
                        <td style="max-width:auto; font-weight: bold;">' . $data["date_at"] . '</td>
                            <td   style="max-width:auto; font-weight: bold;">' . $data["time_at"] . '</td>
                                <td  style="max-width:auto; font-weight: bold;">' . $data["title"] . '</td>
                                    <td  style="max-width:auto; font-weight: bold;">' . $data["descripcion"] . '</td>
                                    
            </tr>
                ';
    }
    
    echo $content .= '</table> </center>';
    if($cont == 0){
        $content.= "<br>"
                . "<br>"
                . "NO HAY REGISTROS PARA EL PACIENTE ESCOGIDO";
    }
    $pdf->writeHTML($content, true, 0, true, 0);
    $pdf->lastPage();
    ob_end_clean();
    $pdf->output('Reporte_de_Citas' . date("Y-m-d") . '.pdf', 'I');
}
?>
<div class="row">
    <div class="col-md-10">
        <h1>Reporte de HC por Paciente</h1>
        <form class="form-horizontal" role="form" method="post" action="./index.php?view=report_hc">

            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Cédula del Paciente</label>
                <div class="col-lg-5">
                    <input type="text" name="cedula" required class="form-control" id="inputEmail1" placeholder="Cédula">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-default">Buscar HC</button>
                </div>
            </div>
        </form>

    </div>
</div>
