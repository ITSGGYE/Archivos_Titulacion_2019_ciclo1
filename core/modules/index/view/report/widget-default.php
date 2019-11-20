<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    ob_clean();
    ob_start();
    require_once "tcpdf/tcpdf.php";
    date_default_timezone_set("America/Guayaquil");
    $date = $_POST['date_at'];
    $objConexion = new Database();
    $conexion = $objConexion::getCon();
    $query = "SELECT * FROM reservation,pacient WHERE date_at = '$date' AND pacient_id = pacient.id ORDER BY date_at ASC";
    $stmt = $conexion->query($query);
    $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Bookmedick System');
    $pdf->SetTitle("LISTA DE CITAS " . date('Y-m-d'));
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
            <h1 style="text-align:center;">LISTA DE CITAS <br> ' . $date . '</h1>
            <center>
                <table border="1" cellpadding="5" align="center" style="width:100%;">
            <thead>
             <tr>
             <th style="max-width:auto; font-weight: bold;">ID</th>
                            <th style="max-width:auto; font-weight: bold;">CEDULA</th>
                            <th style="max-width:auto; font-weight: bold;">NOMBRES</th>
                            <th style="max-width:auto; font-weight: bold;">FECHA</th>
                            <th style="max-width:auto; font-weight: bold;">HORA</th>
                            <th style="max-width:auto; font-weight: bold;">MOTIVO</th>
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
        echo $content = $content . '
            <tr>
            <td style="max-width:auto; font-weight: bold;">' . $cont . '</td>
                <td style="max-width:auto; font-weight: bold;">' . $data["cedula"] . '</td>
                    <td style="max-width:auto; font-weight: bold;">' . $data["name"] . " " . $data["lastname"] . '</td>
                        <td style="max-width:auto; font-weight: bold;">' . $data["date_at"] . '</td>
                            <td style="max-width:auto; font-weight: bold;">' . $data["time_at"] . '</td>
                                <td style="max-width:auto; font-weight: bold;">' . $data["title"] . '</td>
            </tr>
                ';
    }
    
    $content .= '</table> </center>';
    if($cont == 0){
        $content.= "<br>"
                . "<br>"
                . "NO HAY REGISTROS PARA LA FECHA ESCOGIDA";
    }
    $pdf->writeHTML($content, true, 0, true, 0);
    $pdf->lastPage();
    ob_end_clean();
    $pdf->output('Reporte_de_Citas' . date("Y-m-d") . '.pdf', 'I');
    error_reporting(E_ALL);
}
?>
<div class="row">
    <div class="col-md-10">
        <h1>Reporte de Citas Por Fecha</h1>
        <form class="form-horizontal" role="form" method="post" action="./index.php?view=report">

            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Fecha</label>
                <div class="col-lg-5">
                    <input type="date" name="date_at" required class="form-control" id="inputEmail1" placeholder="Fecha">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-default">Buscar Citas</button>
                </div>
            </div>
        </form>

    </div>
</div>
