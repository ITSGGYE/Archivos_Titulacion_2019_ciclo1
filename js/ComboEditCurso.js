/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function (){
    
    var idGrupo = $("#idGrupo").val();
    
    var parametros = {
        "idGrupo": idGrupo
    }
    
    $.ajax({
        data: parametros,
        url: "../Models/llenarComboEditCurso.php",
        type: "POST",
        
        success: function (datos){
            $('#idGrupo_pastoral').html(datos);
        }
        
    });
    
});