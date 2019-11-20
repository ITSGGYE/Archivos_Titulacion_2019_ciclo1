/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function eliminarRango(idRango){
    
    var mensagge= confirm("¿Esta seguro que desea eliminar el Rango?");
    
    if (mensagge == true) {
        var idRango = idRango;

        var parametros = {
            "idRango": idRango,
        }
        $.ajax({
            data: parametros,
            url: '../Models/ModeloEliminarRango.php',
            type: 'get',
            beforeSend: function () {
                $("#result").html("Procesando, espere por favor...");
            },
            success: function (response) {

                $("#result").html(response);
                
                listadoRangos();
                listadoRangos();
                alert(response); 
            }

        });
    }
    
}
