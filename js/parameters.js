function validarFormulario(){

    var error = 0;
    var err_campo = "It can't be empty";
    var err_formato_decimal = "Not an float, Ej. 00.0000";

    var param = document.getElementById('param').value;

    if(param == null || param.length == 0 || /^\s+$/.test(param)){
        colocaError("err_param", "seccion_param",err_campo,"update");
        error = 1; 
    }else if(!validateDecimal(param)){
        colocaError("err_param", "seccion_param",err_formato_decimal,"update");
        error = 1;
    }else{
        quitarError("err_param","seccion_param","update");
    }

    if(error == 1){
        return false;
    }else{
        return true;
    }
}

$('#param').on('blur keyup', function(){

    var param = this.value;
    var err_campo = "It can't be empty";
    var err_formato_decimal = "Not an float, Ej. 00.0000";

    if(param == null || param.length == 0 || /^\s+$/.test(param)){
        colocaError("err_param", "seccion_param",err_campo,"update");
        error = 1; 
    }else if(!validateDecimal(param)){
        colocaError("err_param", "seccion_param",err_formato_decimal,"update");
        error = 1;
    }else{
        quitarError("err_param","seccion_param","update");
    }
});