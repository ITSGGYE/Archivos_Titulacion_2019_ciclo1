/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function EditarDatosCuras(){
    
     var mensagge= confirm("¿Esta seguro que desea Editar el registro?");
     
     if (mensagge == true) {
        var cura_id = $("#cura_id").val();
        var cedulaCura = $("#cedulaCura").val();
        var nombresCura = $("#nombresCura").val();
        var FechaNacimiento = $("#FechaNacimiento").val();
        
        var parametros = {
            "cura_id": cura_id,
            "cedulaCura": cedulaCura,
            "nombresCura": nombresCura,
            "FechaNacimiento": FechaNacimiento,
        }
        $.ajax({
            data: parametros,
            url: '../Models/Modelo_Editar_FormHistorial.php',
            type: 'POST',
            beforeSend: function () {
                $("#result").html("Procesando, espere por favor...");
            },
            success: function (respuest) {

                $("#result").html(respuest);
                ListadoHistorialCuras();
                $("#btnCancelar").click();
                alert(respuest);
                
            }

        });
         
     }
    
}
