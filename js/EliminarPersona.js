/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function EliminarPersona(per_cedula) {

    var mensagge = confirm("¿Esta seguro que desea eliminar el usuario?");

    if (mensagge == true) {
        
        if(per_cedula.length==="9"){
           var per_cedula = "0"+per_cedula; 
        }else{
            var per_cedula = per_cedula; 
        }
        
        

        var parametro = {
            "per_cedula": per_cedula
        }

        $.ajax({
            data: parametro,
            url: '../Models/Modelo_Eliminar_Persona.php',
            type: 'POST',
            beforeSend: function () {
                $("#result").html("Procesando, espere por favor...");
            },
            success: function (respuest) {
                $("#result").html(respuest);
                ListPersona();
                alert(respuest);

            }


        });
    }


}