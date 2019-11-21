// JavaScript Document
function agregardatos(nombre,status){
	cadena="nombre="+ nombre+
			"&editar="+status;
	$.ajax({
		type:"POST",
		url:"php/guardar_tipo_variedad.php",
		data:cadena,
		success: function(r){
			
			if(r==1){
				var notification = alertify.notify('Grabacion Exitosa.Presione para continuar', 'success', 5, function(){  location.reload(); });
				
			}else{
				
				alertify.success("Ingreso Incorrecto");
			}
		
		}
	});
	
}


function agregaform(datos){
	
	d=datos.split('||');
	$('#id_var').val(d[0]);
	$('#nvariedadu').val(d[1]);
	
	
}
function actualizadatos(){
	
	id=$('#id_var').val();
	nombre=$('#nvariedadu').val();
	status='e';
	
	cadena="id="+ id+
			"&nombre="+ nombre+
			"&editar="+status;

	$.ajax({
		type:"POST",
		url:"php/guardar_tipo_variedad.php",
		data:cadena,
		success: function(r){
			//document.write(r);
			if(r==1){
				var notification = alertify.notify('Grabacion Exitosa.Presione para continuar', 'success', 5, function(){  location.reload(); });
				
			}else{
				
				alertify.success("Ingreso Incorrecto");
			}
		
		}
	});
}
//ingreso de tipos productos
function agregardatosP(nombre,status,imagen){
	alert(imagenn);
	cadena="nombre="+ nombre+
			"&editar="+status+
			"&foto="+imagenn;
	$.ajax({
		type:"POST",
		url:"php/guardar_tipo_producto.php",
		data:cadena,
		success: function(r){
			
			if(r==1){
				var notification = alertify.notify('Grabacion Exitosa.Presione para continuar', 'success', 5, function(){  location.reload(); });
				
			}else{
				
				alertify.success("Ingreso Incorrecto");
			}
		
		}
	});
	
}
function actualizadatosP(){
	
	
	/*id=$('#id_var').val();
	nombre=$('#nvariedadu').val();
	status='e';
	imagen=$('#imagen')[0].files[0];
	cadena="id="+ id+
			"&nombre="+ nombre+
			"&editar="+status+
			"&imagen="+imagen;*/

	$.ajax({
		type:"POST",
		url:"php/guardar_tipo_producto.php",
		data: new FormData(this),
		success: function(r){
			document.write(r);
			if(r==1){
				var notification = alertify.notify('Grabacion Exitosa.Presione para continuar', 'success', 5, function(){  location.reload(); });
				
			}else{
				
				alertify.success("Ingreso Incorrecto");
			}
		
		}
	});
}
//Actualiza Stock//
function agregaforms(datos){
	
	d=datos.split('||');
	$('#id_var').val(d[0]);
	$('#nvariedadu').val(d[1]);
	$('#stock').val(d[2]);
	
	
}
function actualizadatoss(){
	
	id=$('#id_var').val();
	nombre=$('#nvariedadu').val();
	stock=$('#stock').val();
	
	
	cadena="id="+ id+
			"&nombre="+ nombre+
			"&stock="+ stock;
			

	$.ajax({
		type:"POST",
		url:"php/update_stock.php",
		data:cadena,
		success: function(r){
			//document.write(r);
			if(r==1){
				var notification = alertify.notify('Grabacion Exitosa.Presione para continuar', 'success', 5, function(){  location.reload(); });
				
			}else{
				
				alertify.success("Ingreso Incorrecto");
			}
		
		}
	});
}
//Eliminar Variedad
function preguntarsino(id){
	
	alertify.confirm('Eliminar Datos', 'Esta seguro de eliminar este registro?', function(){ eliminardatos(id) }
                , function(){ alertify.error('Cancel')});

}
//Eliminar Productos
function preguntarsinop(id){
	
	alertify.confirm('Eliminar Datos', 'Esta seguro de eliminar este registro?', function(){ eliminardatosP(id) }
                , function(){ alertify.error('Cancel')});

}
//Eliminar Variedad
function eliminardatos(id){
	cadena="id="+id;
	$.ajax({
		type:"POST",
		url:"php/borrar_tipo_variedad.php",
		data:cadena,
		success: function(r){
			//document.write(r);
			if(r==1){
				var notification = alertify.notify('Grabacion Exitosa.Presione para continuar', 'success', 5, function(){  location.reload(); });
				
			}else{
				
				alertify.success("Ingreso Incorrecto");
			}
		
		}
	});
	
}
//Eliminar productos
function eliminardatosP(id){
	cadena="id="+id;
	$.ajax({
		type:"POST",
		url:"php/borrar_tipo_producto.php",
		data:cadena,
		success: function(r){
			//document.write(r);
			if(r==1){
				var notification = alertify.notify('Grabacion Exitosa.Presione para continuar', 'success', 5, function(){  location.reload(); });
				
			}else{
				
				alertify.success("Ingreso Incorrecto");
			}
		
		}
	});
	
}
//Eliminar Productos
function preguntarsinopr(id){
	
	alertify.confirm('Eliminar Datos', 'Esta seguro de eliminar este registro?', function(){ eliminardatospr(id) }
                , function(){ alertify.error('Cancel')});

}
function eliminardatospr(id){
	cadena="id="+id;
	$.ajax({
		type:"POST",
		url:"php/eliminar_producto.php",
		data:cadena,
		success: function(r){
			//document.write(r);
			if(r==1){
				var notification = alertify.notify('Grabacion Exitosa.Presione para continuar', 'success', 5, function(){  location.reload(); });
				
			}else{
				
				alertify.success("Eliminacion Incorrecta");
			}
		
		}
	});
	
}
//Inicio de Agregar,Eliminar y Actualizar videos
function agregarvideo(nombre,url){
	cadena="nombre="+ nombre+
			"&url_video="+url;
	$.ajax({
		type:"POST",
		url:"php/guardar_video.php",
		data:cadena,
		success: function(r){
			//document.write(r);
			if(r==1){
				var notification = alertify.notify('Grabacion Exitosa.Presione para continuar', 'success', 5, function(){  location.reload(); });
				
			}else{
				
				alertify.success("Ingreso Incorrecto");
			}
		
		}
	});
	
}
function agregaformsvideo(datos){
	
	
	d=datos.split('||');
	$('#id_var').val(d[0]);
	$('#nvariedadu').val(d[1]);
	$('#url_video').val(d[2]);
	
	
}
function actualizavideo(){
	
	id=$('#id_var').val();
	nombre=$('#nvariedadu').val();
	url=$('#url_video').val();
	
	cadena="id="+ id+
			"&nombre="+ nombre+
			"&url_video="+url;

	$.ajax({
		type:"POST",
		url:"php/guardar_video.php",
		data:cadena,
		success: function(r){
			//document.write(r);
			if(r==1){
				var notification = alertify.notify('Grabacion Exitosa.Presione para continuar', 'success', 5, function(){  location.reload(); });
				
			}else{
				//document.write(r);
				
				alertify.success("Ingreso Incorrecto");
			}
		
		}
	});
}
function preguntarsinovideo(id){
	
	alertify.confirm('Eliminar Datos', 'Esta seguro de eliminar este registro?', function(){ eliminardatosvideo(id) }
                , function(){ alertify.error('Cancel')});

}
function eliminardatosvideo(id){
	cadena="id="+id;
	$.ajax({
		type:"POST",
		url:"php/borrar_video.php",
		data:cadena,
		success: function(r){
			//document.write(r);
			if(r==1){
				var notification = alertify.notify('Grabacion Exitosa.Presione para continuar', 'success', 5, function(){  location.reload(); });
				
			}else{
				
				alertify.success("Eliminacion Incorrecta");
			}
		
		}
	});
	
}