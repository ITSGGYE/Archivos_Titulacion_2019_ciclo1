/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    var cedula1 = "";
    var cedula2 = "";
    var cedula3 = "";
    var cedula4 = "";
    var cedula5 = "";
    var cedula6 = "";
    $("#cedula1").keyup(function () {
        cedula1 = $(this).val();

        var parametros = {
            "cedula1": cedula1
        }
        $.ajax({
            data: parametros,
            url: '../Models/ModeloBuscar_Nombre.php',
            type: 'POST',
            success: function (respuesta) {
                $("#inputs").show();
                $("#nom").hide();
                $("#inputs").html(respuesta);
            }

        });
    });
    $("#cedula2").keyup(function () {
        cedula2 = $(this).val();

        var parametros1 = {
            "cedula2": cedula2

        }
        $.ajax({
            data: parametros1,
            url: '../Models/ModeloBuscar_Nombre2.php',
            type: 'POST',
            success: function (respuesta) {
                $("#inputs2").show();
                $("#nom2").hide();
                $("#inputs2").html(respuesta);
            }

        });
    });
    $("#cedula3").keyup(function () {
        cedula3 = $(this).val();

        var parametros3 = {
            "cedula3": cedula3

        }
        $.ajax({
            data: parametros3,
            url: '../Models/ModeloBuscar_Nombre3.php',
            type: 'POST',
            success: function (respuesta) {
                $("#inputs3").show();
                $("#nom3").hide();
                $("#inputs3").html(respuesta);
            }

        });
    });
    $("#cedula4").keyup(function () {
        cedula4 = $(this).val();

        var parametros4 = {
            "cedula4": cedula4

        }
        $.ajax({
            data: parametros4,
            url: '../Models/ModeloBuscar_Nombre4.php',
            type: 'POST',
            success: function (respuesta) {
                $("#inputs4").show();
                $("#nom4").hide();
                $("#inputs4").html(respuesta);
            }

        });
    });
    $("#cedula5").keyup(function () {
        cedula5 = $(this).val();

        var parametros5 = {
            "cedula5": cedula5

        }
        $.ajax({
            data: parametros5,
            url: '../Models/ModeloBuscar_Nombre5.php',
            type: 'POST',
            success: function (respuesta) {
                $("#inputs5").show();
                $("#nom5").hide();
                $("#inputs5").html(respuesta);
            }

        });
    });
    $("#cedula6").keyup(function () {
        cedula6 = $(this).val();

        var parametros6 = {
            "cedula6": cedula6

        }
        $.ajax({
            data: parametros6,
            url: '../Models/ModeloBuscar_Nombre6.php',
            type: 'POST',
            success: function (respuesta) {
                $("#inputs6").show();
                $("#nom6").hide();
                $("#inputs6").html(respuesta);
            }

        });
    });

});