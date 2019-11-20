/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function (){
   
    $("#btnAgregar").click(function (){
       
        var NuevoEvento={
            title:$("#txtTitulo").val(),
            start:$("#txtColor").val()+" "+$("#txtHora").text(),
            color:$("#txtColor").val(),
            descripcion:$("#txtDescripcion").val(),
            textColor:"#FFFFFF"
            
        };
        
        $('#CalendarioWEB').fullCalendar('renderEvent',NuevoEvento);//agrego un evento al calendario
        $("#ModalEventos").modal('toggle');//cierro el modal
        
        
        
    });
    
});