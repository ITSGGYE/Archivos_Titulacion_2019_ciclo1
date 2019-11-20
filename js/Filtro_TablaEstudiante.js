/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

(function ($) {
 
                $('#FiltroEstudiante').keyup(function () {
 
                    var rex = new RegExp($(this).val(), 'i');
                    $('#tablaListadoEstudiantes tr').hide();
                    $('#tablaListadoEstudiantes tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
 
                })
 
            }(jQuery));

});