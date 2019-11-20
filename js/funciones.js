function mostrarDatos(){
	$.ajax({
		url:"php/mostrarDatos.php",
		success:function(r){
			$('#tablaDatos').html(r);
		}
	});
}

function agregarDatos(){
	if ($('#nombre').val()=="") {
		swal("Debes agregar un nombre!!");
		return false;
	}else if ($('#paterno').val()=="") {
		swal("Debes agregar un apellido!!");
		return false;
    }

	$.ajax({
		type:"POST",
		data:$('#frmAgregarDatos').serialize(),
		url:"php/agregarDatos.php",
		success:function(r){
			if (r==1){
				$('#frmAgregarDatos')[0].reset();
				mostrarDatos();
				swal(":D","Agregado con exito","success");
			}else{
				swal(":(","Fallo al agregar","error");
			}
		}
	});
}

function eliminarDatos(idNombre){
	swal({
		title: "Estas seguro de eliminar este registro?",
		text: "Una vez que elimines este registro, no podra ser recuperado!!!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
				$.ajax({
		        type:"POST",
		        data:"id=" + idNombre,
		        url:"php/eliminar.php",
		        success:function(r){
	                if (r==1){
				        mostrarDatos();
				        swal(":D","Eliminado con exito","success");
			             }else{
				        swal(":(","Fallo al eliminar","error");
			        }
	            } 
       		});
		}
	});
}

function agregaDatosParaEdicion(id){
       $.ajax({
	        type:"POST",
	        data:"id=" + id,
	        url:"php/datosUpdate.php",
	        success:function(r){
            datos=jQuery.parseJSON(r);

              $('#idu').val(datos['id']);
              $('#nombreu').val(datos['nombre']);
              $('#paternou').val(datos['paterno']);
              $('#maternou').val(datos['materno']);
              $('#telefonou').val(datos['telefono']);  
              $('#correou').val(datos['correo']);  
              $('#direccionu').val(datos['direccion']);   
            } 
        });
}

function actualizarDatos(){
	if ($('#nombreu').val()=="") {
		swal("Debes agregar un nombre!!");
		return false;
    }else if ($('#paternou').val()=="") {
		swal("Debes agregar un apellido!!");
		return false;
    }

   $.ajax({
		type:"POST",
		data:$('#frmAgregarDatosu').serialize(),
		url:"php/actualizarDatos.php",
		success:function(r){
			if (r==1){
				mostrarDatos();
				swal(":D","Actualizado con exito","success");
			}else{
				swal(":(","Fallo al actualizar","error");
			}
		}
	});
}