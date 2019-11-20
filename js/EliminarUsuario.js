/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function EliminarUsuario(idusuario){
    
    
    var mensagge= confirm("¿Esta seguro que desea eliminar el usuario?");
    
    if (mensagge == true) {
        var idusuario = idusuario;
    
    
    var parametro = {
        "idusuario": idusuario
        
    }
    $.ajax({
    data: parametro,
    url: '../Models/Modelo_Eliminar_usuario.php',
       type: 'POST',
       beforeSend: function () {
                $("#result").html("Procesando, espere por favor...");
            },
            success: function (respuest) {
                $("#result").html(respuest);
                ListadoUsuario();
                alert(respuest);
                
            }
        
      
    });
        
    }
    
    
    
    
}