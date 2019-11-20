/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function BuscarMateria(){
    
    var idcurso = $("#idcurso").val();
    var idseq_profesor = $("#idseq_profesor").val();

        var parametro = {
            "idcurso": idcurso,
            "idseq_profesor": idseq_profesor,
        }
        $.ajax({
            data: parametro,
            url: "../Models/Consultar_Materias.php",
            type: 'POST',
            success: function (response) {
                
                 $('#tabla').html(response)   
                
            }
        });
    
    
}