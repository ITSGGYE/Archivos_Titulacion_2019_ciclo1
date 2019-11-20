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

function prepare_payphone(monto,token, is_cart){
    $.ajax({
        type: "POST",
        url: "/affinity/seller/ajax/payphone_logica/",
        data: {
            id_prepare: true,
            monto: parseInt(monto),
            token:token,
            is_cart: is_cart,
            action: 'NOR',
            id_trx_client: generarCodigo()
        },
        success: function(returnData){
            $('#loading_payphone').html('');
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
                    setTimeout(function() {
                        location.href = results.payWithPayPhone;  
                    },2000);
                    $('#payphoneModal').modal('hide');
                }else{
                    swal({
                        type: 'info',
                        title: 'Transacci&oacute;n No Procesable',
                        text: 'Validaciones fallidas'
                    })
                }
            }
            $('#confirmPayPhoneID').removeAttr("disabled");
        }, 
        error: function(respuesta){
            swal({
                type: 'error',
                title: 'LA CONEXI&Oacute;N FALLO',
                text: 'No se pudo conectar con el servidor'
            })
            console.log("Se encontraron errores: " + respuesta);
            $('#loading_payphone').html('');
            $('#confirmPayPhoneID').removeAttr("disabled");
        }
    });
}