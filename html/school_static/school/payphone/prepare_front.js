/****************************************************************************************************
* JS PARA EL MANEJO DEL PREPARE DEL API PAYPHONE
* AUTOR: PETER HERRERA
* FECHA: 27-12-2018
*****************************************************************************************************/

function generarCodigo(){
    var caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_";
    var longitud = 10;
    var aleatorio = "compraneta_";
    aleatorio += rand_code(caracteres, longitud);
    return aleatorio;
}

function rand_code(chars, lon){
    code = "";
    for (x=0; x < lon; x++){
        rand = Math.floor(Math.random()*chars.length);
        code += chars.substr(rand, 1);
    }
    return code;
}

function prepare_payphone(){
    $.ajax({
        type: "POST",
        url: "/compraneta/payphone_logica/",
        data: {
            id_prepare: true,
            id_trx_client: generarCodigo()
        },
        success: function(returnData){
            console.log(returnData);
            if(returnData[0].error){
                swal({
                    type: 'info',
                    title: 'Transacci&oacute;n No Procesable',
                    text: '' + returnData[0].error
                })
            }else{
                var results = JSON.parse(returnData);
                if(results.errorCode == 23){
                    swal({
                        type: 'info',
                        title: 'Transacci&oacute;n Duplicada',
                        text: 'Ya existe una transacción con el mismo identificador'
                    })
                }
                else if(results.payWithPayPhone){
                    const toast = swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    toast({
                        type: 'success',
                        title: 'EL proceso de Pago a sido enviado correctamente sera redireccionado a PayPhone'
                    })
                    console.log(results.payWithPayPhone);
                    setTimeout(function() {
                        location.href = results.payWithCard;  
                    },1000);
                    
                }else{
                    swal({
                        type: 'info',
                        title: 'Transacci&oacute;n No Procesable',
                        text: 'Validaciones fallidas'
                    })
                }
            }
            
        }, 
        error: function(respuesta){
            swal({
                type: 'error',
                title: 'LA CONEXI&Oacute;N FALLO',
                text: 'No se pudo conectar con el servidor'
            })
            console.log("Se encontraron errores: " + respuesta);
        }
    });
}
