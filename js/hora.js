window.onload=hora;
fecha = new Date("<?php echo date('Y-m-d G:i:s');?>");
function hora(){
var hora=fecha.getHours();
var minutos=fecha.getMinutes();
var segundos=fecha.getSeconds();
if(hora<10){ hora="0"+hora;}
if(minutos<10){minutos="0"+minutos; }
if(segundos<10){ segundos="0"+segundos; }
fech=hora+":"+minutos+":"+segundos;
document.getElementById("hora").innerHTML=fech;
fecha.setSeconds(fecha.getSeconds()+1);
setTimeout("hora()",1000);
}