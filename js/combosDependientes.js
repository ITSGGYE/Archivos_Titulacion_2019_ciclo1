/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {

    $.ajax({
        url: "Models/ConsultaSelectAnidado.php",
        type: 'POST',
        dataType: 'json',
        success: function (listado) {
            var tr = "";
            tr += "<option value=''>seleccione..</option>";
            listado.forEach(function (listado) {

                tr += "<option value=" + listado.idDepartamento + ">" + listado.nombreDepartamento + "</option>";

            });

            $("#Departamentos").html(tr);
        }

    });





});

