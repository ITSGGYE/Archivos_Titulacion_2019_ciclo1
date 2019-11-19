function GuardarUsuario(){
    var cedula = $("#cedula").val();
    var nombres = $("#nombres").val();
    var apellidos = $("#apellidos").val();
    var correo = $("#correo").val();
    var password1 = $("#password1").val();
    var password2 = $("#password2").val();
    var tipoPersona = $("#tipoPersona").val();
    var username = $("#username").val();
    var url = $("#pathRegistro").val();


    if(ValidarCampos()){
        return;
    }

    if(ValidarPasswrd()){
        return;
    }
   
    
    $.ajax({
        url : url,
        type: 'post',
        data: {'cedula': cedula, 'nombres' : nombres, 'apellidos': apellidos,
                'correo' : correo , 'password1' : password1, 'password2' : password2,
                'tipoPersona' : tipoPersona, 'username' : username},
        success:function(response){
            console.log(response);
            if(response.content.message === 'ok'){
                alert('Usuario Registrado Correctamente');
                window.location.href = '/home';
            }
            else{
                alert('Ha ocurrido un error en el registro');
            }
        }
        
    });
}


function ValidarUsuario(){
    var usuario = $("#username").val();
    var url = $("#pathUsername").val();
    console.log(usuario)
    console.log(url)
    $.ajax({
        url: url,
        type: 'POST',
        data : {'username' : usuario},
        success: function(response){
            console.log(response)
            if(response.content.message == 0){
                $("#username").focus();
                toastr.error("El Username "+usuario+" ya se encuentra registrado ","Aviso!");
                
            }
        }
    });
}

function ValidarCampos(){
    //var cedula = $("#cedula").val();
    var encontrar = false;
    /*if($.trim(cedula) == ""){
        toastr.error("No ha ingresado Cedula","Aviso!");
        $("#cedula").focus();
        return false;
    }*/

    $("input:text,password").each(function(index,element){
       // console.log(index)
       // console.log(element);
        var name = $(element).attr('id');
        console.log(name)

        var input = $("#"+name+"").val();
        if($.trim(input) == ""){
            toastr.error("No ha ingresado "+name+" ","Aviso!");
            encontrar = true
        }
    });
    return encontrar;
   
}

function ValidarPasswrd(){
    var password1 = $("#password1").val();
    var password = $("#password2").val();
    var encontrar = false;
    console.log(password1);
    console.log(password)
    if(password1 !== password){
        toastr.error("No coinciden la contraseña con la confirmacion ","Aviso!");
        encontrar = true;
    }
    return encontrar;
}