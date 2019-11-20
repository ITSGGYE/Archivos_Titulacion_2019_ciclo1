// JavaScript Document


$(document).ready(function() {
    //alert("Se esta cargando el JS");
	
	var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	var fonovalidar=/^[0-9]+$/;
	
    $(".botonvalidar").click(function ()
	{
        $(".error").remove();
       
		//alert($(".fechaNacimiento").val());
		if( $(".email").val() == "" )
		{
            $(".email").focus().after("<span class='error'>Ingrese su email</span>");
            return false;
        }else if( $(".nombre").val() == "")
		{
            $(".nombre").focus().after("<span class='error'>Ingrese su Nombre	</span>");
            return false;
		}else if( $(".apellido").val() == "")
		{
            $(".apellido").focus().after("<span class='error'>Ingrese su Apellido	</span>");
            return false;
		}//acá va la fecha de Nac.
		else if($(".fechaNacimiento").val()=="")
		{						
			
			$(".fechaNacimiento").focus().after("<span class='error'>Ingrese su Fecha de Nacimiento</span>");
            return false;
		}
		else if( $(".pas2").val() == "" || !fonovalidar.test($(".pas2").val()) )
		{
            
			$(".pas2").focus().after("<span class='error'>Solo Puede ingresar Números</span>");
            return false;
		}
		else if( $(".marca").val() == 0)
		{
            $(".marca").focus().after("<span class='error'>Debe Eligir una Marca	</span>");
            return false;		
		}
		else if( $(".modelo").val() == 0)
		{
            $(".modelo").focus().after("<span class='error'>Debe Eligir un Modelo	</span>");
            return false;		
		}
		
		else if( $(".email").val() == "" || !emailreg.test($(".email").val()) )
		{
            $(".email").focus().after("<span class='error'>Ingrese un email correcto</span>");
            return false;
        }else if( $(".asunto").val() == "")
		{
            $(".asunto").focus().after("<span class='error'>Ingrese un asunto</span>");
            return false;
        }else if( $(".mensaje").val() == "" )
		{
            $(".mensaje").focus().after("<span class='error'>Ingrese un mensaje</span>");
            return false;
        }/*else if(!($(".sexo").val()=="Masculino" || $(".sexo").val()=="Femenino")){
			$(".sexo").focus().after("<span class='error'>Ingrese un mensaje</span>");
	            return false;
		}
		
		else if($("#formulario input[name='sexo']:radio").is(':checked')) {  
				$(".sexo").focus().after("<span class='error'>Ingrese un mensaje</span>");
	            return false;
			}*/
		
		
		
    });
	//permite que desaparece cuando escribes
    $(".email, .nombre, .apellido, .asunto, .mensaje").keyup(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });
	
	$(".pas2").keyup(function()
	{
		if( $(".fonoContacto").val() != "" && fonovalidar.test($(this).val()) )
		{	
			$(".error").fadeOut();
			return false;
		}
	});
		
    $(".email").keyup(function(){
        if( $(this).val() != "" && emailreg.test($(this).val())){
            $(".error").fadeOut();
            return false;
        }
    });
});