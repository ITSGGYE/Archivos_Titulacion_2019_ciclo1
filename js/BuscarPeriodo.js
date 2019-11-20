/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
            (function ($) {
 
                $('#filtroPeriodo').keyup(function () {
 
                    var rex = new RegExp($(this).val(), 'i');
                    $('#tablaListadoPeriodos tr').hide();
                    $('#tablaListadoPeriodos tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
 
                })
 
            }(jQuery));

});