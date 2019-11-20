/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function eliminarDatos($idseq_Contenedor) {
    
    var mensagge= confirm("¿Esta seguro que quiere eliminar el registro?");
    
    if (mensagge == true) {
        var idseq_Contenedor = $idseq_Contenedor;

        var parametros = {
            "idseq_Contenedor": idseq_Contenedor,
        }
        $.ajax({
            data: parametros,
            url: '../Models/ModeloEliminarDatos.php',
            type: 'get',
            beforeSend: function () {
                $("#result").html("Procesando, espere por favor...");
            },
            success: function (response) {

                $("#result").html(response);

                alert(response);
                BuscarGrupo();

            }

        });
    }
    
    
}

