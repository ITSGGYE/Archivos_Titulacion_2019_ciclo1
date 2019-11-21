function agregaform(datos){
	
	d=datos.split('||');
	$('#id_var').val(d[0]);
	$('#nvariedadu').val(d[1]);
	$('#producto').val(d[2]);
	
	
}
function actualizadatos(){
	
	id=$('#id_var').val();
	cantidad=$('#nvariedadu').val();
	producto=$('#producto').val();
	cadena="id="+ id+
			"&cantidad="+ cantidad+
			"&producto="+producto;
			

	
	$.ajax({
		type:"POST",
		url:"php/guardar_cantidad_carrito.php",
		data:cadena,
		success: function(r){
			//document.write(r);
			if(r==1){
				var notification = alertify.notify('Grabacion Exitosa.Presione para continuar', 'success', 5, function(){  location.reload(); });
				
			}else{
				
				alertify.success("Cantidad superior a stock disponible");
			}
		
		}
		
	});
	
	
}

//insertar videos
function carga_video(url,div,ruta){
	alert(url);
$.post(
		ruta,
		{url:url},
		function(resp)
		{
			echo($("#"+div+"").html(resp));
		}
);
}
	
	
