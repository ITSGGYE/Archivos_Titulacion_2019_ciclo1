/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function EliminarParcial(idseqParcial){
    
    var mensagge= confirm("¿Esta seguro que desea eliminar el Parcial?");
    
    if (mensagge == true) {
        var idseqParcial = idseqParcial;

        var parametros = {
            "idseqParcial": idseqParcial,
        }
        $.ajax({
            data: parametros,
            url: '../Models/ModeloEliminarParcial.php',
            type: 'get',
            success: function (respon) {

                $("#resultadoMensaje").html(respon);
                alert(respon);
                //configNotas();

            }

        });
    }
    
}