/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    $('tr #deleteitem').click(function (e) {
        
        var mensagge = confirm("¿Esta seguro que desea eliminar el Almuerzo?");
        
        if (mensagge == true) {
            e.preventDefault();
            var elemento = $(this);
            var idproducto = elemento.parent().find('#idarticulo1').text();
            $.ajax({
                url: 'ServletEliminarProducto',
                type: 'post',
                data: {idproducto: idproducto},
                success: function (r) {
                    elemento.parent().parent().remove();
                    var elementostabla = $('#shop-table tr');
                    if (elementostabla.length <= 1) {
                        $('#cart-container').append("<h3 style='margin-left:15px;'>No hay articulos en el carro</h3>");

                    }
                    $('#tt-subtotal').text(r);
                    $('#tt-total').text(r);
                    total();
                }
            });
        }

    });

});
