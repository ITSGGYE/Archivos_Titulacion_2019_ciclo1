$(document).ready(ini);

function ini() {
	$("#btn-signup").click(enviarDatos);
	
	//formulario login
	var form = $(".form-login");
		form.bind("subtmit",function(){
			
		$.ajax({
			type: form.attr('method'),
			url: form.attr('action'),
			data: form.serialize(),
			
			beforeSend: function(){
				$("#btn-signup").text("enviando");
			}
			complete: function(data){
				
				 if(data =="true"){
				   document.location.href="main_app/Admin/admin.php";
				 }else{
					 $("#resultado").html("<div class='alert alert-danger' role='alert'")
				 }
				}
			success: function(data){
			   // que hacer si la petición se cumplio
			}
			error: function(data){
			  // que hacer si se cumplio la petición
			}
		});
	    return false;
		});
	}
function enviarDatos(){
	var usuario = $("#user_name").val();
	var password = $("#user_pasword").val();
	
	$.ajax({
		url:'main_app/login.php',
		success:function(result){
			if(result =="true"){
				$("#resultado").html("se ha registrado el usuario correctamente")
			}else{
				$("#resultado").html("no se ha podido registar el usuario correctamente")
			}			
		},
		data:{
			usuario:usuario,
			password:password
		},
		type:"POST"	
	});
}
 
	
	
	