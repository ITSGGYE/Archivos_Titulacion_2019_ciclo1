<?php

$Nombre = $_GET['dato1'];
$fechaNacimiento = $_GET['dato2'];
$nombreSacramento = $_GET['dato3'];
$nombreCura = $_GET['dato4'];
$sac_codigo = $_GET['dato5'];
$tip_codigo = $_GET['dato6'];
$sac_fechaSacramento = $_GET['dato7'];
$nombreIglesia = $_GET['dato8'];
$per_lugarNacimiento = $_GET['dato9'];
$Observacion = $_GET['dato10'];


if($Observacion == ""){
    $Observacion = "Ninguna";
}

$fdia = substr($fechaNacimiento,8);
$faño = substr($fechaNacimiento,0,-6);
$fmes = substr($fechaNacimiento,5,-3);

$fdiaSC = substr($sac_fechaSacramento,8);
$fañoSC = substr($sac_fechaSacramento,0,-6);
$fmesSC = substr($sac_fechaSacramento,5,-3);
    
 
date_default_timezone_set("America/Guayaquil");
$dia = date("d");
$mes = date("m");
$año = date("Y");

if($mes == 1){
    $mes = "Enero";
    
}
if($fmes == 1){
    $fmes= "Enero";
}
if($fmesSC == 1){
    $fmesSC= "Enero";
}
if($mes == 2){
    $mes = "Febrero";   
}
if($fmes == 2){
    $fmes= "Febrero";
}
if($fmesSC == 2){
    $fmesSC= "Febrero";
}
if($mes == 3 ){
    $mes = "Marzo";
}
if($fmes == 3){
    $fmes= "Marzo";
}
if($fmesSC == 3){
    $fmesSC= "Marzo";
}

if($mes == 4){
    $mes = "Abril";
}
if($fmes == 4){
    $fmes= "Abril";
}
if($fmesSC == 4){
    $fmesSC= "Abril";
}


if($mes == 5){
    $mes = "Mayo";
}
if($fmes == 5){
    $fmes= "Mayo";
}
if($fmesSC == 5){
    $fmesSC= "Mayo";
}
if($mes == 6){
    $mes = "Junio";
}
if($fmes == 6){
    $fmes= "Junio";
}
if($fmesSC == 6){
    $fmesSC= "Junio";
}

if($mes == 7){
    $mes = "Julio";
}
if($fmes == 7){
    $fmes= "Julio";
}
if($fmesSC == 7){
    $fmesSC= "Julio";
}

if($mes == 8){
    $mes = "Agosto";
}
if($fmes == 8){
    $fmes= "Agosto";
}
if($fmesSC == 8){
    $fmesSC= "Agosto";
}

if($mes == 9){
    $mes = "Septiembre";
}
if($fmes == 9){
    $fmes= "Septiembre";
}
if($fmesSC == 9){
    $fmesSC= "Septiembre";
}

if($mes == 10){
    $mes = "Octubre";
}
if($fmes == 10){
    $fmes= "Octubre";
}
if($fmesSC == 10){
    $fmesSC= "Octubre";
}


if($mes == 11){
    $mes = "Noviembre";
}
if($fmes == 11){
    $fmes= "Noviembre";
}
if($fmesSC == 11){
    $fmesSC= "Noviembre";
}


if($mes == 12){
    $mes = "Diciembre";
}
if($fmes == 12){
    $fmes= "Diciembre";
}
if($fmesSC == 12){
    $fmesSC= "Diciembre";
}

    
require __DIR__.'/vendor/autoload.php';
//require '../css/bootstrap.css';

use Spipu\Html2Pdf\Html2Pdf;

$bd_config = [
    'db_name' => 'IglesiaSanJeronimo',
    'user' => 'root',
    'pass' => ''
];

function conexion($bd_config) {
    try {
        $conexion = new PDO('mysql:host=127.0.0.1;dbname=' . $bd_config['db_name'], $bd_config['user'], $bd_config['pass']);
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
}

$conexion =  conexion($bd_config);
$sql = " select PER.per_cedula as Cedula,PER.per_nombre as Nombre,PAR.par_tipo_persona,
PER.per_direccion as Direccion,PER.per_fecha_nac as FechaNacimiento,
PER.per_lugarNacimiento as LugarNacimiento,PER.per_correo as Correo,PER.per_telefono as Telefono,
TS.tip_descripcion as nombreSacramento,
HC.cura_nombres as nombreCura, IG.igle_nombre as nombreIglesia,IG.igle_direccion as DireccionIglesia
from sacramentos AS SC INNER JOIN participantes AS PAR ON SC.sac_codigo = PAR.par_sacramento
INNER JOIN personas AS PER ON PER.per_cedula = PAR.par_cedula
INNER JOIN tipo_sacramentos TS ON SC.sac_tipo = TS.tip_sacramentos
INNER JOIN historialcuras HC ON HC.cura_id = SC.sac_cura
INNER JOIN iglesia IG ON IG.igle_codigo = SC.sac_iglesia WHERE
 SC.sac_codigo='$sac_codigo' and TS.tip_codigo='$tip_codigo'
";

$statement = $conexion->prepare($sql);
$statement->execute();

$conta = 0;
$contador = 0;
$Padrino1 = "";
$Padrino2 = "";
$nombreMatrimonio = "";
$nombreMatrimonio2 = "";
while($data = $statement->fetch(PDO::FETCH_ASSOC)){
    
    
    if($data["par_tipo_persona"] == "S"){
       if($contador==0){
           $nombreMatrimonio =$data["Nombre"];
       }else{
           $nombreMatrimonio2 =$data["Nombre"];
       }
        
       $contador ++; 
    }
    if($data["par_tipo_persona"] != "S"){
        if($conta == 0){
            $Padrino1 = $data["Nombre"];
        }else{
            $Padrino2 = $data["Nombre"];
            if($Padrino2 == ""){
             $Padrino2 = ", ";
            }else{
             $Padrino2 = "y ".$data["Nombre"].".";
            }
        }
     $conta ++;   
    }
}

if($nombreSacramento == "BAUTISMO"){
    $Cabecera= "<html>
    <head>
        <meta charset='UTF-8'>
        <link href='css/bootstrap.css' rel='stylesheet' type='text/css'/>
        <title></title>
    </head>
    <body>
       
        <div class='container'>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='col-md-1'>

                        </div>
                        <div class='col-md-10'>
                            <h1 style='text-align:center;color: #245269'>ARQUIDIÓCESIS DE GUAYAQUIL</h1>
                            <h3 style='text-align:center;color: #245269;'>Parroquia SAN JERÓNIMO DE CHONGÓN</h3>
                            <h4 style='text-align:center;color: #245269'>Av. Principal y Calle 4ta. Mz.37 Solar 1</h4>
                            <h4 style='text-align:center;color: #245269'>Teléfono: 2738470</h4>
                            <h4 style='text-align:center;color: #245269'>Guayas - Guayaquil</h4> 
                            <h4 style='text-align:right;color: #245269';margin-top:20px;>Chóngon $dia de $mes del $año</h4>
                            <h4 style='text-align:center;color: #245269;margin-top:35px;'><b>CERTIFICADO DE $nombreSacramento</b></h4>
                            
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class='col-md-1'>

                        </div>
                        <div class='col-md-10'>
                           <font face='Comic Sans MS,Arial,Verdana' color='#2e6da4'>
                            <h4 style='text-align:justify;color: #2e6da4;padding-top:15px;'>
                                La parroquia San Jerónimo de chongón certifica que el dia $fdiaSC de $fmesSC del 
                                $fañoSC el P. $nombreCura bautizó al niño(a) <b>$Nombre </b>
                                nacido en $per_lugarNacimiento, el $fdia de $fmes del $faño Fueron sus padrinos
                                $Padrino1 $Padrino2 a quienes se advirtió
                                sus obligaciones y  parentescos espirituales.
                            </h4> 
                            <h4 style='text-align:justify;color: #2e6da4'>Los anteriores datos han sido tomados fielmente del original a donde se ha
                           
                                remitido el infrascrito para los fines consiguientes.
                            </h4> 
                            <br>
                            <h4 style='text-align:left;color: #2e6da4'>Nota Marginal: $Observacion</h4>
                            <br><br>
                            <h4 style='text-align:left;color: #2e6da4'>Afectuosamente en Cristo.</h4>

                            
                            
                                <div style='border-top: 1px solid #2e6da4;width: 240px;margin-top:200px;margin-left:195px;'>
                                    <h4 style='text-align:center;color: #3276b1'>P. Edgar Antonio Riojas S</h4> 
                                    <h4 style='text-align:center;color: #3276b1'>PÁRROCO </h4>
                                </div>
                            

                            </font>
                            

                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </body>
</html>
         ";
    
    $Documento = "CertificadoDe'$nombreSacramento'.pdf";
}

if($nombreSacramento == "PRIMERA COMUNION" || $nombreSacramento == "CONFIRMACION"){
 
    $Cabecera= "<html>
    <head>
        <meta charset='UTF-8'>
        <link href='css/bootstrap.css' rel='stylesheet' type='text/css'/>
        <title></title>
    </head>
    <body>
       
        <div class='container'>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='col-md-1'>

                        </div>
                        <div class='col-md-10'>
                            <h1 style='text-align:center;color: #245269'>ARQUIDIÓCESIS DE GUAYAQUIL</h1>
                            <h3 style='text-align:center;color: #245269;'>Parroquia SAN JERÓNIMO DE CHONGÓN</h3>
                            <h4 style='text-align:center;color: #245269'>Av. Principal y Calle 4ta. Mz.37 Solar 1</h4>
                            <h4 style='text-align:center;color: #245269'>Teléfono: 2738470</h4>
                            <h4 style='text-align:center;color: #245269'>Guayas - Guayaquil</h4> 
                            <h4 style='text-align:right;color: #245269';margin-top:20px;>Chóngon $dia de $mes del $año</h4>
                            <h4 style='text-align:center;color: #245269;margin-top:35px;'><b>CERTIFICADO DE $nombreSacramento</b></h4>
                            
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class='col-md-1'>

                        </div>
                        <div class='col-md-10'>
                           <font face='Comic Sans MS,Arial,Verdana' color='#2e6da4'>
                            <h4 style='text-align:justify;color: #2e6da4;padding-top:15px;'>
                                El infrascrito Párroco de San Jerónimo de Chongon certifica que <b>$Nombre</b>
                                recibió por primera vez la <b>$nombreSacramento</b> en esta pararroquia, en el 
                                mes de $fmesSC $fdiaSC del $fañoSC siendo sus padrinos $Padrino1 $Padrino2
                            </h4> 
                            <h4 style='text-align:justify;color: #2e6da4'>Los anteriores datos han sido tomados fielmente del original a donde se ha
                                remitido el infrascrito para los fines consiguientes.
                            </h4> 
                            <br>
                            <h4 style='text-align:left;color: #2e6da4'>Nota Marginal: $Observacion</h4>
                            <br><br>
                            <h4 style='text-align:left;color: #2e6da4'>Afectuosamente en Cristo.</h4>

                            
                            
                                <div style='border-top: 1px solid #2e6da4;width: 240px;margin-top:200px;margin-left:195px;'>
                                    <h4 style='text-align:center;color: #3276b1'>P. Edgar Antonio Riojas S</h4> 
                                    <h4 style='text-align:center;color: #3276b1'>PÁRROCO </h4>
                                </div>
                            

                            </font>
                            

                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </body>
</html>
         ";
    
    $Documento = "CertificadoDe'$nombreSacramento'.pdf";
    
}

if($nombreSacramento == "MATRIMONIO"){
    
      $Cabecera= "<html>
    <head>
        <meta charset='UTF-8'>
        <link href='css/bootstrap.css' rel='stylesheet' type='text/css'/>
        <title></title>
    </head>
    <body>
       
        <div class='container'>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='col-md-1'>

                        </div>
                        <div class='col-md-10'>
                            <h1 style='text-align:center;color: #245269'>ARQUIDIÓCESIS DE GUAYAQUIL</h1>
                            <h3 style='text-align:center;color: #245269;'>Parroquia SAN JERÓNIMO DE CHONGÓN</h3>
                            <h4 style='text-align:center;color: #245269'>Av. Principal y Calle 4ta. Mz.37 Solar 1</h4>
                            <h4 style='text-align:center;color: #245269'>Teléfono: 2738470</h4>
                            <h4 style='text-align:center;color: #245269'>Guayas - Guayaquil</h4> 
                            <h4 style='text-align:right;color: #245269';margin-top:20px;>Chóngon $dia de $mes del $año</h4>
                            <h4 style='text-align:center;color: #245269;margin-top:35px;'><b>CERTIFICADO DE $nombreSacramento</b></h4>
                            
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class='col-md-1'>

                        </div>
                        <div class='col-md-10'>
                           <font face='Comic Sans MS,Arial,Verdana' color='#2e6da4'>
                            <h4 style='text-align:justify;color: #2e6da4;padding-top:15px;'>
                                El infrascrito Párroco de San Jerónimo de Chongon certifica que <b>$nombreMatrimonio</b>
                                contrajo matrimonio con <b>$nombreMatrimonio2</b> en la parroquia $nombreIglesia, en el 
                                mes de $fmesSC $fdiaSC del $fañoSC siendo sus Testigos $Padrino1 $Padrino2
                            </h4> 
                            <h4 style='text-align:justify;color: #2e6da4'>Los anteriores datos han sido tomados fielmente del original a donde se ha
                                remitido el infrascrito para los fines consiguientes.
                            </h4> 
                            <br>
                            <h4 style='text-align:left;color: #2e6da4'>Nota Marginal: $Observacion</h4>
                            <br><br>
                            <h4 style='text-align:left;color: #2e6da4'>Afectuosamente en Cristo.</h4>

                            
                            
                                <div style='border-top: 1px solid #2e6da4;width: 240px;margin-top:200px;margin-left:195px;'>
                                    <h4 style='text-align:center;color: #3276b1'>P. Edgar Antonio Riojas S</h4> 
                                    <h4 style='text-align:center;color: #3276b1'>PÁRROCO </h4>
                                </div>
                            

                            </font>
                            

                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </body>
</html>
         ";
    
    $Documento = "CertificadoDe'$nombreSacramento'.pdf";
}



$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($Cabecera);
$html2pdf->output($Documento);

?>