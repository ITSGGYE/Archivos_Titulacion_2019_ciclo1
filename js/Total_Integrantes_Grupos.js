/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function (){
   
    $.ajax({
       url: 'Total_Integrantes.php',
       type: 'POST',
       
       success: function (data) {
          $("#numeroIntegranteGrupo").html(data);  
       }
       
    });
    
});