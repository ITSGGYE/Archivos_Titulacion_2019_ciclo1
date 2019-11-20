function val(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[A-Za-z- -]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function val2(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[0-9]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function val3(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function val4(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[()-_-*%$#-]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}