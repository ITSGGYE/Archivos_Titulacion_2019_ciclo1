/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function GuardarPedidoCompra() {

    var usuario = $("#usuario").val();
    var fechaPedido = $("#fechaPedido").val();

    var parametros = {
        "usuario": usuario,
        "fechaPedido": fechaPedido
    }

    $.ajax({
        data: parametros,
        url: "ServletGuardarProducto",
        type: "POST",
        success: function (data) {
            alert(data);
            //window.location.href = 'http://localhost:8020/WebSistem/Administrador/ListadoPedidosCompra.jsp';
        }

    });

}