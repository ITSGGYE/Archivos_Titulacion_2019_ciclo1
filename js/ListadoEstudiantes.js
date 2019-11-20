/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function (){
    
   $("#btnListEst").click(function (){
       
   $("#bordlist1").show();
   $("#bordlist2").hide();
   $("#bordlist3").hide();
   $("#ListaEstudiantes").show();   
   $("#NuevoEstudiantes").hide();
   $("#AsignaciondeEstudiantes").hide();
   });
   
   $("#btnNuev").click(function (){
       
   $("#bordlist1").hide();
   $("#bordlist2").show();
   $("#bordlist3").hide();
   $("#ListaEstudiantes").hide();   
   $("#NuevoEstudiantes").show();
   $("#AsignaciondeEstudiantes").hide();
   });
   
   $("#btnAsigEst").click(function (){
       
   $("#bordlist1").hide();
   $("#bordlist2").hide();
   $("#bordlist3").show();
   $("#ListaEstudiantes").hide();   
   $("#NuevoEstudiantes").hide();
   $("#AsignaciondeEstudiantes").show();
   });
    
});
