/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function eliminarEstudiante(idEstudiante){
    
     var mensagge= confirm("¿Esta seguro que desea eliminar el Estudiante?");
    
    if (mensagge == true) {
        var idEstudiante = idEstudiante;

        var parametros = {
            "idEstudiante": idEstudiante,
        }
        $.ajax({
            data: parametros,
            url: '../Models/ModeloEliminarEstudiante.php',
            type: 'get',
            success: function (respon) {

                $("#resultadoMensaje").html(respon);
                alert(respon);
                listaEstudiante();

            }

        });
    }
    
}