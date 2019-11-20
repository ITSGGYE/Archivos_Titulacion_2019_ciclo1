function Mayus(q) {
    q.value = q.value.toUpperCase();
}

function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}

function soloLetras(e) {
    key = e.KeyCode || e.which;
    tecla = String.fromCharCode(key).toUpperCase();
    letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZÑ ';
    especiales = '8-37-39-46';
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}


function soloMail(e) {
    key = e.KeyCode || e.which;
    tecla = String.fromCharCode(key).toUpperCase();
    letras = '1234567890@._/$#-ABCDEFGHIJKLMNOPQRSTUVWXYZÑ ';
    especiales = '8-37-39-46';
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function soloCedula(e) {
    key = e.KeyCode || e.which;
    tecla = String.fromCharCode(key).toUpperCase();
    letras = '1234567890VIE';
    especiales = '8-37-39-46';
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}
