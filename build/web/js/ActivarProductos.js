/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function btnActivarEstado(idProducto){
    
    var ActivarEstado =$("#ActivarEstado").val();
        var idProducto = idProducto;
        var parametro = {
            "ActivarEstado":ActivarEstado,
            "idProducto":idProducto
        }
        $.ajax({
           data: parametro,
           url:'../ServletActivarProductos',
           type: 'POST',
           success: function (respuesta) {
                alert(respuesta);
                location.reload();
           }
            
        });
}