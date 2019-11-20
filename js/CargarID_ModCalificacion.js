/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function (){
   
    var idseq_calif = $("#idseq_calif").val();
    
    var parametros = {
        "idseq_calif": idseq_calif
    }
   
     $.ajax({
        data: parametros,
        url: '../Models/Consulta_Parciales.php',
        type: 'POST',
        dataType: 'json',

        beforeSend: function () {
            $("#tablaListadoParciales").html("Procesando, espere por favor...");
        },
        success: function (listado) {

            var tr = "";

            listado.forEach(function (listado) {

                tr += "<div class='col-sm-offset-1' style='padding:7px;margin-left:55px;'>";
                tr += "<button class='btn btn-primary' id='btnParcial' style='with:250px;' onclick='ConsultarDatos("+listado.idseqParcial+")'>" + listado.nombreParcial + "</button>";
                tr += "<br>";
                tr += "</div>";
            });

            $("#tablaListadoParciales").html(tr);
            $("#btnParcial").click();            
            
        }

    });
    
   
});