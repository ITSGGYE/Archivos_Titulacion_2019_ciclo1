/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
            (function ($) {
 
                $('#textoFiltrar').keyup(function () {
 
                    var rex = new RegExp($(this).val(), 'i');
                    $('#tablaListado tr').hide();
                    $('#tablaListado tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
 
                });
 
            }(jQuery));

});