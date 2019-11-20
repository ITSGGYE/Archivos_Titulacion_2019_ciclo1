var form = $(".validation-wizard").show();

$(".validation-wizard").steps({
    headerTag: "h6"
    , bodyTag: "section"
    , transitionEffect: "fade"
    , titleTemplate: '<span class="step">#index#</span> #title#'
    , labels: {
        finish: "Submit"
    }
    , onStepChanging: function (event, currentIndex, newIndex) {
        if (newIndex == 3){
            var method_pay = $('method_pay').val();
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
            }
        }
        return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
    }
    , onFinishing: function (event, currentIndex) {
        return form.validate().settings.ignore = ":disabled", form.valid()
    }
    , onFinished: function (event, currentIndex) {
         swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
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