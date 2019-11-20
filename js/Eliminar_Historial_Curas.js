/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function eliminarDatosHistorial(cura_id){
    var messagge= confirm("¿Esta seguro que desea Eliminar el registro?");
    
     if (messagge == true){
        var parametros = {
        "cura_id": cura_id
      }
      $.ajax({
       data: parametros,
       url: '../Models/Modelo_Eliminar_HistorialCura.php',
       type: 'POST',
       beforeSend: function () {
                $("#result").html("Procesando, espere por favor...");
            },
            success: function (respuest) {
                $("#result").html(respuest);
                ListadoHistorialCuras();
                alert(respuest);
                
            }
        
      });
    }
    
    
    
}

