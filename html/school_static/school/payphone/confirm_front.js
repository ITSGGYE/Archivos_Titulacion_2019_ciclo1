/****************************************************************************************************
* JS PARA EL MANEJO DEL CONFIRM DEL API PAYPHONE
* AUTOR: PETER HERRERA
* FECHA: 27-12-2018
*****************************************************************************************************/

function confirm_payphone(id_trx,clientTransactionId){
    $.ajax({
        type: "POST",
        url: "/compraneta/payphone_logica/",
        data: {
            id_confirm: true,
            clientTransactionId: clientTransactionId,
            id_trx: id_trx
        },
        success: function(returnData){
            var results = JSON.parse(returnData);
            var estado = results.transactionStatus;
            console.log(returnData);
            if(results.errorCode == 20){
                swal({
                    type: 'info',
                    title: 'La Transacci&oacute;n no existe',
                    text: 'verifique que el identificador enviado sea correcto..'
                })
                $('#info_client').html('<strong><center><p>Por favor comuniquese con info@compraneta, para solucionar su inconveniente</p></center></strong>');
                $('#Cargando').html('');    
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
                    $('#Cargando').html('');
                }
                else{
                    swal({
                        type: 'info',
                        title: 'Transacci&oacute;n No Procesable',
                        text: 'Problema en el proceso de pago se reversara automaticamente'
                    })
                    $('#Cargando').html('');
                }
            }
        }, 
        error: function(respuesta){
            swal({
                type: 'error',
                title: 'LA CONEXI&Oacute;N FALLO',
                text: 'No se pudo conectar con el servidor'
            })
            $('#Cargando').html('');
            //console.log(respuesta);
        }
    });
}

function update_seller(clientTransactionId,id_trx){
    $.ajax({
        type: "POST",
        url: "/compraneta/payphone_logica/",
        data: {
            id_agregar_saldos: true,
            clientTransactionId: clientTransactionId,
            id_trx: id_trx
        },
        success: function(returnData){
            console.log(returnData);
            if(returnData[0].success){
                const toast = swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3500
                });
                toast({
                    type: 'success',
                    title: 'Se realizo el pago correctamente'
                })
                $('#info_recarga').html('<strong><center><p>La Recarga se realizo con Exito..!!</p></center></strong>');
                $('#Cargando').html('');
            }else{
                swal({
                    type: 'info',
                    title: 'Ya se realizo el pago anteriormente',
                    text: 'Porfavor comuniquese con info@compraneta.com'
                })
                $('#Cargando').html('');
                $('#info_paquete').html('<strong><center><p>Si desear volver a recargar haz click en "REGRESAR"</p></center></strong>');    
            }
        }, 
        error: function(respuesta){
            swal({
                type: 'error',
                title: 'LA CONEXI&Oacute;N FALLO ',
                text: 'No se pudo conectar con el servidor'
            })
            $('#Cargando').html('');
            //console.log(respuesta);
        }
    });
}
