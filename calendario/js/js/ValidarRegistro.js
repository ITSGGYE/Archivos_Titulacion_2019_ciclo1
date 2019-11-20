$( "#register-form" ).submit(function( event ) {
  $('#btn-signup').attr("disabled", true);
  
	
	var parametros = $(this).serialize();
	
	//var parametros = new FormData(document.getElementById("register-form"));
	
	 $.ajax({
			type: "POST",
			url: "ajax/nueva_Imagenes.php",
			data: parametros,
		 //contentType: false,
			//processData: false,
		 //error:function(request){
			 //alert("error");			 
		// },
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
				alert("Ingreso válido");
				$("#resultados_ajax").html(datos);
				$('#btn-signup').attr("disabled", false);
				load(1);
		  }
	});
	event.preventDefault();
  
})
