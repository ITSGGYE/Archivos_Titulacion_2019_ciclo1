/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function EliminarModelo(idseq_calif){
    
    var mensagge= confirm("¿Esta seguro que desea eliminar el Modelo Calificación?");
    
    if (mensagge == true) {
        var idseq_calif = idseq_calif;

        var parametros = {
            "idseq_calif": idseq_calif,
        }
        $.ajax({
            data: parametros,
            url: '../Models/ModeloEliminarCalificacion.php',
            type: 'get',
            success: function (respon) {

                $("#resultadoMessage").html(respon);
                alert(respon);
                $("#idPeriodo").change();
                listadoCalificacion();

            }

        });
    }
    
}