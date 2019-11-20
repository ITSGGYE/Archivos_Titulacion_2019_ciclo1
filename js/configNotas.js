/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function (){

    $('#btnNuevoN').click(function(){
       
       $('#listado').hide();
       $('#Curso').show();
       $('#bord1').hide();
       $('#bord2').show();
       $('#subtareas').hide();
    });
    $('#btnListado').click(function(){
       
       $('#listado').show();
       $('#Curso').hide();
       $('#bord1').show();
       $('#bord2').hide();
       $('#subtareas').hide();
       //subtareas
    });
    
});




