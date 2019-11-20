/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

    $.ajax({
        url: '../Models/Consulta_ListSacramento.php',
        type: 'POST',
        dataType: 'json',
        success: function (lista) {

            var tr = "";

            lista.forEach(function (lista) {
                tr += "<tr>";
                tr += "<td>" + lista.Cedula + "</td>";
                tr += "<td>" + lista.Nombre + "</td>";
                tr += "<td>" + lista.nombreSacramento + "</td>";
                tr += "<td>" + lista.nombreCura + "</td>";
                tr += "<td>" + lista.nombreIglesia + "</td>";
                tr += "<td>" + lista.nombreDireccion + "</td>";
                tr += "<td>";
                tr += "<div style='height:7px;'></div>";
                tr += "<button class='btn btn-danger' onclick='VisualizarSacramento(" + lista.sac_codigo + "," + lista.tip_codigo + "," + lista.Cedula + ")' data-toggle='modal' data-target='#myModal'style='background:#00FF00;'><i class='fa fa-eye'></i></button>";
                tr += "<div style='height:7px;'></div>";
                tr += "<a class='btn btn-primary' target='_Blank' href='../PDF-HTML/Certificado.php?dato1="+ lista.Nombre +"&dato2="+lista.per_fecha_nac+"&dato3="+lista.nombreSacramento+"&dato4="+lista.nombreCura+"&dato5="+lista.sac_codigo+"&dato6="+lista.tip_codigo+"&dato7="+lista.sac_fecha+"&dato8="+lista.nombreIglesia+"&dato9="+lista.per_lugarNacimiento+"&dato10="+lista.Observacion+" '><i class='fa fa-book'></i></a>";
                tr += "</td>";
                tr += "</tr>";
            });

            $("#tablaSacramento").html(tr);
        }

    });

});