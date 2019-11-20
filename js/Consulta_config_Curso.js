/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

    listadoCalificacion();
});

function listadoCalificacion() {

    $("#idPeriodo").change(function () {
        var idPeriodo = $(this).val();
        var parametro = {
            "idPeriodo": idPeriodo
        }
        $.ajax({
            data: parametro,
            url: "../Models/Consulta_config_Curso.php",
            type: 'POST',
            success: function (response) {

                $('#tabla').html(response);

            }
        });

    });
}