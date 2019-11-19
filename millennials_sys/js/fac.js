			function eliminar (id)
		{
			var q= $("#q").val();
		if (confirm("Realmente deseas eliminar las factura")){	
		$.ajax({
        type: "GET",
        url: "./ajax/editar_das.php",
        data: "id="+id,"q":q,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		load(1);
		}
			});
		}
		}
		
		
		
		

