/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function eliminarPeriodo(idPeriodo){
    
    var mensagge= confirm("¿Esta seguro que desea eliminar el Periodo?");
    
    if (mensagge == true) {
        var idPeriodo = idPeriodo;

        var parametros = {
            "idPeriodo": idPeriodo,
        }
        $.ajax({
            data: parametros,
            url: '../Models/ModeloEliminarPeriodo.php',
            type: 'get',
            beforeSend: function () {
                $("#result").html("Procesando, espere por favor...");
            },
            success: function (response) {

                $("#result").html(response);
                alert(response);
                listaPeriodos();

            }

        });
    }
    
}