var form = $(".validation-wizard").show();

$(".validation-wizard").steps({
    headerTag: "h6"
    , bodyTag: "section"
    , transitionEffect: "fade"
    , titleTemplate: '<span class="step">#index#</span> #title#'
    , labels: {
        finish: "Finalizar",
        next: "Siguiente",
        previous: "Anterior",
        loading: "Cargando..."
    }
    , onStepChanging: function (event, currentIndex, newIndex) {
        if (newIndex == 2){
            var method_pay = $('#method_pay').val();
            
            if (method_pay == "PPH"){
                $('#pago_efectivo').hide();
                $('#placetopay').hide();
                $('#payphone').show();
            }else if(method_pay == "PTP"){
                $('#pago_efectivo').hide();
                $('#placetopay').show();
                $('#payphone').hide();
            }else if(method_pay == "PEF"){
                $('#pago_efectivo').show();
                $('#placetopay').hide();
                $('#payphone').hide();
            }else {
                $('#pago_efectivo').hide();
                $('#placetopay').hide();
                $('#payphone').hide();
            }
        }
        return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
    }
    , onFinishing: function (event, currentIndex) {
        return form.validate().settings.ignore = ":disabled", form.valid()
    }
    , onFinished: function (event, currentIndex) {
        var method_pay = $('#method_pay').val();
        $('a[href="#finish"]').attr("href","javascript:void();");
        $('a[href="#previous"]').attr("href","javascript:void(0);");
        $('#Cargando').html('<div class="text-center"><img src="https://affinity.compraneta.com/static/affinity/assets/images/loader.gif" alt="Cargando"/><br/>Un momento, por favor...</div>');
        $('#back_botton').hide();
        //Actualizar Datos del cliente
        var full_name = $("input[name=full_name]").val();
        var first_name = $("input[name=first_name]").val();
        var last_name = $("input[name=last_name]").val();
        var email = $("input[name=email]").val();
        var address = $("input[name=address]").val();
        var address_2 = $("input[name=address_2]").val();
        var instructions = $("input[name=instructions]").val();
        var phone = $("input[name=phone]").val();
        var type_id = $("input[name=type_id]").val();
        var type_id_ = $('#type_id_').val();
        var identification = $("input[name=identification]").val();
        var city = $("input[name=city]").val();
        var state_province = $("input[name=state_province]").val();
        var postal_code = $("input[name=postal_code]").val();
        var country = $("input[name=country]").val();
        var country_id = $("#country_id").val();
        var compania = $("input[name=compania]").val();
        console.log(country_id);
         $.ajax({
            type: "POST",
            url: "/compraneta/updated_data/",
            data: {
                'full_name': full_name,
                'first_name': first_name,
                'last_name': last_name,
                'email': email,
                'address': address,
                'address_2': address_2,
                'instructions': instructions,
                'phone': phone,
                'type_id': type_id_,
                'identification': identification,
                'city': city,
                'state_province': state_province,
                'postal_code': postal_code,
                'country': country_id,
                'compania': compania
            },
            success: function(response) {
                console.log(response);
            },error: function(response){
                console.log(response);
            },
        });


        if(method_pay == "PEF"){ //PagoEfectivo
            $.ajax({
                type: "POST",
                url: "/compraneta/send_pagoefectivo/",
                success: function(response) {
                    console.log(response);
                    $('#back_information').html("");
                    $('#back_botton').hide();
                    if (!response[0].isError){
                        $('#Cargando').html("");
                        $('#confirmID').removeAttr('disabled');
                        $('#back_information').html("<iframe src='"+response[0].urlToken + response[0].token+"' style='width: 100%; height: 20rem;'></iframe>");
                        $('#back_botton').show();
                    }else{
                        Swal.fire({
                            type: 'warning',
                            text: '' + response[0].description
                        })
                        $('#Cargando').html("");
                        $('a[href="javascript:void();"]').attr("href","#finish");
                        $('#back_botton').hide();
                    }
                },error: function(response){
                    console.log(response);
                    $('#Cargando').html("");
                    $('a[href="javascript:void();"]').attr("href","#finish");
                    $('#back_botton').hide();
                    $('#back_information').html("");

                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: '¡Algo salió mal!'
                    })
                },
            });
        }else if(method_pay == "PPH"){ //PayPhone
            prepare_payphone();
        }else if(method_pay == "PTP"){//PlaceToPay
            $.ajax({
                type: "POST",
                url: "/compraneta/send_placetopay_front/",
                success: function(response) {
                    console.log(response);
                    if (!response[0].isError){
                        //==> Logica PlaceToPay
                        P.on('response', function(response) {
                            var respuestaJson = JSON.stringify(response, null, 2);
                            console.log(respuestaJson);
                            $.ajax({
                                type: "POST",
                                url: "/compraneta/placetopay_response_front/",
                            data: {
                                'respuestaJson':respuestaJson
                            },
                            success: function(response) {
                                console.log(response);
                                if (!response[0].isError){
                                    Swal.fire({
                                        type: 'success',
                                        text: '' + response[0].description
                                    })
                                    $('#confirmID').removeAttr('disabled');
                                    $('#Cargando').html("");
                                    $('#back_botton').show();
                                }else{
                                    Swal.fire({
                                        type: 'warning',
                                        text: '' + response[0].description
                                    })
                                    $('#Cargando').html("");
                                    $('a[href="javascript:void();"]').attr("href","#finish");
                                    $('#back_botton').hide();
                                    
                                }
                            },error: function(response){
                                console.log(response);
                                Swal.fire({
                                    type: 'error',
                                    title: 'Oops...',
                                    text: '¡Algo salió mal!'
                                })
                                $('#Cargando').html("");
                                    $('a[href="javascript:void();"]').attr("href","#finish");
                                    $('#back_botton').hide();
                            },
                        });
                        
                        //alert(respuestaJson);
                    });
                    processUrl = response[0].processUrl;
                    P.init(processUrl, { opacity: 0.4 });
                    //<== Fin PlaceToPay
                }else{
                    Swal.fire({
                        type: 'warning',
                        text: '' + response[0].description
                    })
                    $('#Cargando').html("");
                    $('a[href="javascript:void();"]').attr("href","#finish");
                    $('#back_botton').hide();
                }
            },error: function(response){
                console.log(response);
                $('#Cargando').html("");
                $('a[href="javascript:void();"]').attr("href","#finish");
                $('#back_botton').hide();

                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: '¡Algo salió mal!'
                })
            },
        });



        }else{
            Swal.fire({
                type: 'info',
                title: 'Opci&oacute;n Invalida',
                text: 'La opci&oacute;n seleccionada no existe o es invalida.'
            })
            $('#Cargando').html("");
            $('#back_botton').hide();
            $('#back_information').html("");
            $('a[href="javascript:void();"]').attr("href","#finish");
            $('a[href="javascript:void(0);"]').attr("href","#previous");
        }
        //swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
    }
}), $(".validation-wizard").validate({
    ignore: "input[type=hidden]"
    , errorClass: "text-danger"
    , successClass: "text-success"
    , highlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , errorPlacement: function (error, element) {
        error.insertAfter(element)
    }
    , rules: {
        full_name: {
            required: true,
            minlength: 2,
            maxlength: 25
        },
        first_name: {
            required: true,
            minlength: 2,
            maxlength: 25
        },
        last_name: {
            required: true,
            minlength: 2,
            maxlength: 25  
        },
        email: {
            required: true,
            email: true
        },
        address: {
            required: true,
            minlength: 6,
            maxlength: 50
        },
        instructions: {
            required: true,
            minlength: 6,
            maxlength: 50
        },
        phone: {
            required: true,
            minlength: 10,
            maxlength: 10,
            number: true
        },
        type_id: {
            required: true
        },
        identification: {
            required: true,
            minlength: 5,
            maxlength: 15
        },
        city: {
            required: true,
            minlength: 3
        },
        state_province: {
            required: true,
            minlength: 3
        },
        postal_code: {
            required: true,
            minlength: 3
        },
        country: {
            required: true
        },
        method: {
            required: true
        }
    },
    messages: {
        full_name: {
            required: "Por favor ingrese un nombre de la persona que va ha recibir el/los productos.",
            minlength: "Su nombre debe constar de al menos 2 caracteres.",
            maxlength: "Su nombre debe poseer maximo 25 caracteres."
        },
        first_name: {
            required: "Por favor ingrese sus nombres.",
            minlength: "Sus nombres debe constar de al menos 2 caracteres.",
            maxlength: "Sus nombres debe poseer maximo 25 caracteres."
        },
        last_name: {
            required: "Por favor ingrese sus apellidos.",
            minlength: "Sus apellidos debe constar de al menos 2 caracteres.",
            maxlength: "Sus apellidos debe poseer maximo 25 caracteres."
        },
        email: "Por favor, introduce una dirección de correo electrónico válida",
        address: {
            required: "Por favor ingrese su dirección.",
            minlength: "Su direccion debe constar de al menos 6 caracteres.",
            maxlength: "Su direccion debe poseer maximo 50 caracteres."
        },
        instructions: {
            required: "Por favor ingrese su referencia para llegar a su domicilio.",
            minlength: "Su referencia debe constar de al menos 6 caracteres.",
            maxlength: "Su referencia debe poseer maximo 50 caracteres."  
        },
        phone: {
            required: "Por favor proporcione un celular.",
            minlength: "Su numero celular debe tener al menos 10 caracteres.",
            maxlength: "Su numero celular no debe sobrepasar de los 10 caracteres."
        },
        type_id: "Por favor, elije un tipo de identificación.",
        identification: {
            required: "Por favor ingrese su identificación.",
            minlength: "Su identificación debe constar de al menos 5 caracteres.",
            maxlength: "Su identificación debe poseer maximo 15 caracteres."
        },
        city: {
            required: "Por favor ingrese una ciudad.",
            minlength: "Su ciudad debe constar de al menos 3 caracteres." 
        },
        state_province: {
            required: "Por favor ingrese su estado/provincia/región.",
            minlength: "Su estado/provincia/región debe constar de al menos 3 caracteres."
        },
        postal_code: {
            required: "Por favor ingrese el código postal.",
            minlength: "Su código postal debe constar de al menos 3 caracteres."
        },
        country: "Por favor, elije tu pais de residencia.",
        method: "Por favor, elije un metodo de pago valido."
    }
})