/****************************************************************************************************
* JS PARA EL MANEJO DEL CONFIRM DEL API PAYPHONE
* AUTOR: PETER HERRERA
* FECHA: 27-12-2018
*****************************************************************************************************/

function confirm_payphone(id_trx,clientTransactionId){
    $.ajax({
        type: "POST",
        url: "/affinity/payphone/payphone_logica/",
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
                    $('#info_cancelled').html('<strong><center><p>Transaccion cancelada, Porfavor dar Click en el botton "REGRESAR" si deseas realizar otra compra.</p></center></strong>');
                }
                else{
                    swal({
                        type: 'info',
                        title: 'Transacci&oacute;n No Procesable',
                        text: 'Problema en el proceso de pago se reversara automaticamente'
                    })
                    $('#info_cancelled').html('<strong><center><p>Problema en el proceso de pago se reversara automaticamente.</p></center></strong>');
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
        url: "/affinity/payphone/payphone_logica/",
        data: {
            id_generar_form: true,
            clientTransactionId: clientTransactionId,
            id_trx: id_trx
        },
        success: function(returnData){
            if(returnData[0].success){
                // swal({
                //     type: 'info',
                //     title: 'Transaccion sastifactoria',
                //     text: 'codigo de transaccion ' + returnData[0].key + ' en unos segundos sera redireccionado al formulario'
                // })


                const toast = swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3500
                });
                toast({
                    type: 'success',
                    title: 'sera redireccionado al formulario'
                })
                $('#info_recarga').html('<strong><center><p>El pago se realizo con Exito, su codigo de transaccion es: '+returnData[0].key+' ..!!</p></center></strong>');
                $('#link_form').attr('href', returnData[0].success);
                $('#show_form').show();
            }else{
                swal({
                    type: 'info',
                    title: 'Ya se realizo el pago de la compra Anteriormente',
                    text: 'Porfavor comuniquese con info@compraneta.com ' + returnData[0].error
                })
                $('#info_paquete').html('<strong><center><p>Si desear volver a comprar haz click en "REGRESAR"</p></center></strong>');
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
