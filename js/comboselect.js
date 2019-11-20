/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function Cargar(){
    
     var Departamentos = $("#Departamentos").val();

        var parametros1 = {
            "Departamentos": Departamentos
        }

        $.ajax({
            data: parametros1,
            url: "Models/ConsultaSelect.php",
            type: 'POST',
            dataType: 'json',
            success: function (listado) {
                var tr = "";
                listado.forEach(function (listado) {

                    tr += "<option value=" + listado.idEmpleado + " >" + listado.nombreEmpleado + "</option>";

                });

                $("#Empleados").html(tr);
            }

        });


}

   
