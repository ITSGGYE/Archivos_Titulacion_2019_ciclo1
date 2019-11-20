/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function (){
   
   $.ajax({
        url: "../Models/llenarComboRol.php",
        type: "POST",
        
        success: function (datos){
            $('#rol_id').html(datos);
        }
        
    });
    
    
});

