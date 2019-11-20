/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {

    $("#btnSiguiente").click(function () {
        var tipoSacramento = $("#tipoSacramento").val();
        if (tipoSacramento == "") {
            alert("Debe seleccionar un sacramento");
            exit();
        }
        if (tipoSacramento == "1") {
            $("#formularioGeneral").hide();
            $("#Padrinos").show();
            $("#Testigos").hide();
            $("#Participantes").hide();
            $("#Part").hide()
        }
        if (tipoSacramento == "2") {
            $("#formularioGeneral").hide();
            $("#Padrinos").show();
            $("#Testigos").hide();
            $("#Participantes").hide();
            $("#Part").hide()
        }
        if (tipoSacramento == "3") {
            $("#formularioGeneral").hide();
            $("#Padrinos").show();
            $("#Testigos").hide();
            $("#Participantes").hide();
            $("#Part").hide()
        }
        if (tipoSacramento == "4") {
            $("#formularioGeneral").hide();
            $("#Padrinos").hide();
            $("#Testigos").show();
            $("#Participantes").hide();
            $("#Part").show()
        }

    });


    $("#btnSiguientePadrinos").click(function () {
        var tipoSacramento = $("#tipoSacramento").val();
        if ((tipoSacramento == "1") || (tipoSacramento == "2") || (tipoSacramento == "3")) {
            $("#formularioGeneral").hide();
            $("#Padrinos").hide();
            $("#Testigos").hide();
            $("#Participantes").show();
        }
    });
    $("#btnSiguienteTestigos").click(function () {
        var tipoSacramento = $("#tipoSacramento").val();
        if ((tipoSacramento == "4")) {
            $("#formularioGeneral").hide();
            $("#Padrinos").hide();
            $("#Testigos").hide();
            $("#Participantes").show();
        }
    });

    $("#btnAnteriorPadrinos").click(function () {
        $("#formularioGeneral").show();
        $("#Padrinos").hide();
        $("#Testigos").hide();
        $("#Participantes").hide();
    });

    $("#btnAnteriorTestigos").click(function () {
        $("#formularioGeneral").show();
        $("#Padrinos").hide();
        $("#Testigos").hide();
        $("#Participantes").hide();
    });
    $("#btnAnteriorParticipante").click(function () {
        var tipoSacramento = $("#tipoSacramento").val();
        if ((tipoSacramento == "4")) {
            $("#formularioGeneral").hide();
            $("#Padrinos").hide();
            $("#Testigos").show();
            $("#Participantes").hide();
        }else{
            
        $("#formularioGeneral").hide();
        $("#Padrinos").show();
        $("#Testigos").hide();
        $("#Participantes").hide();

        }

    });





});

