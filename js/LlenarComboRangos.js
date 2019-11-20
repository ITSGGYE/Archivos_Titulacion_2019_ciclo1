/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function () {

    $("#idPeriodo").change(function () {

        var idPeriodo = $(this).val();

        var parametro = {

            "idPeriodo": idPeriodo
        }
        $.ajax({
            data: parametro,
            url: "../Models/llenarComboRangos.php",
            type: 'POST',

            success: function (response) {
                $('#idRango').html(response);
            }
        });

    });



});