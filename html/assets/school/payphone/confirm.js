/****************************************************************************************************
* JS PARA EL MANEJO DEL CONFIRM DEL API PAYPHONE
* AUTOR: PETER HERRERA
* FECHA: 27-12-2018
*****************************************************************************************************/

function confirm_payphone(id_trx,clientTransactionId){
    $.ajax({
        type: "POST",
        url: "/affinity/seller/ajax/payphone_logica/",
        data: {
            id_confirm: true,
            clientTransactionId: clientTransactionId,
            id_trx: id_trx
        },
        success: function(returnData){
            var results = JSON.parse(returnData);
            var estado = results.transactionStatus;
            if(results.errorCode == 20){
                swal({
                    type: 'info',
                    title: 'La Transacci&oacute;n no existe',
                    text: 'verifique que el identificador enviado sea correcto..'
                })
                    $('#info_client').html('<strong><center><p>Por favor comuniquese con info@compraneta, para solucionar su inconveniente</p></center></strong>');    
            }else{
                var resultData = $.trim(results.transactionStatus);
                if(resultData == "Approved"){
                    update_seller(clientTransactionId,id_trx);                        
                }
                else if(resultData == "Canceled"){
                    swal({
                        type: 'info',
                        title: 'Transacci&oacute;n Cancelada',
                        text: 'Pago rechazado por el cliente.'
                    })
                    $('#info_cancelled').html('<strong><center><p>Transaccion cancelada, Porfavor dar Click en el botton "REGRESAR" si deseas realizar una recarga.</p></center></strong>');
                }
                else{
                    swal({
                        type: 'info',
                        title: 'Transacci&oacute;n No Procesable',
                        text: 'Problema en el proceso de pago se reversara automaticamente'
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
            //console.log(respuesta);
        }
    });
}

function update_seller(clientTransactionId,id_trx){
    $.ajax({
        type: "POST",
        url: "/affinity/seller/ajax/payphone_logica/",
        data: {
            id_agregar_saldos: true,
            clientTransactionId: clientTransactionId,
            id_trx: id_trx
        },
        success: function(returnData){
            if(returnData[0].success){
                const toast = swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3500
                });
                toast({
                    type: 'success',
                    title: 'Se agrego correctamente el saldo'
                })
                $('#info_recarga').html('<strong><center><p>La Recarga se realizo con Exito..!!</p></center></strong>');

            }else{
                swal({
                    type: 'info',
                    title: 'Ya se realizo una recarga Anteriormente',
                    text: 'Porfavor comuniquese con info@compraneta.com ' + returnData[0].error
                })
                $('#info_paquete').html('<strong><center><p>Si desear volver a recargar haz click en "REGRESAR"</p></center></strong>');    
            }
        }, 
        error: function(respuesta){
            swal({
                type: 'error',
                title: 'LA CONEXI&Oacute;N FALLO ',
                text: 'No se pudo conectar con el servidor'
            })
            //console.log(respuesta);
        }
    });
}
