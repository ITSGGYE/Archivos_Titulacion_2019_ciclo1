/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function btnInactivarEstado(idProducto){
    
    var InactivarEstado =$("#InactivarEstado").val();
        var idProducto = idProducto;
        var parametro = {
            "InactivarEstado":InactivarEstado,
            "idProducto":idProducto
        }
        $.ajax({
           data: parametro,
           url:'../ServletEditarProductos',
           type: 'POST',
           success: function (respuesta) {
                
                alert(respuesta);
                 location.reload();
           }
            
        });
}