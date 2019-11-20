/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function EditarDatosHistorial(cura_id){
    var parametros = {
        "cura_id": cura_id
    }
    
    $.ajax({
       data: parametros,
       url:'../Models/Modelo_CargarDatosEdit.php',
       type: 'POST',
       dataType: 'json',
       
       beforeSend: function () {
            $("#formulario").html("Procesando, espere por favor...");
        },     
        success: function (list) {
            
            var div = "";
            
            list.forEach(function (list) {
                div += "<div class='row'>";
                    div += "<div class='form-horizontal'>";
                        div += "<div class='form-group'>";
                            div += "<div class='col-md-4'>";
                                div += "<label>Cedula:</label>";
                            div += "</div>";
                             div += "<input type='hidden' class='form-control' id='cura_id' value='"+ list.cura_id+ "' required>";
                           
                            div += "<div class='col-md-6'>";
                                div += "<input type='text' class='form-control' id='cedulaCura' value='"+ list.cura_cedula+ "' required>";
                            div += "</div>";
                        div += "</div>";
                        div += "<div class='form-group'>";
                            div += "<div class='col-md-4'>";
                                div += "<label>Nombres:</label>";
                            div += "</div>";
                            div += "<div class='col-md-6'>";
                                div += "<input type='text' class='form-control' id='nombresCura' value='"+ list.cura_nombres +"' required>";
                            div += "</div>";
                        div += "</div>";
                        div += "<div class='form-group'>";
                            div += "<div class='col-md-4'>";
                                div += "<label>Fecha Nacimiento:</label>";
                            div += "</div>";
                            div += "<div class='col-md-6'>";
                                div += "<input type='date' class='form-control' id='FechaNacimiento' value='"+ list.cura_fecha_nac +"' required>";
                            div += "</div>";
                        div += "</div>";
                    div += "</div>";
                 div += "</div>";
                
            });
            $("#formulario").html(div);
              
        }
        
    });
    
    
}


