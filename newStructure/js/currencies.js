$(document).ready(function() {
    $('#currencies').DataTable( {
        "paging":         false
    } );
} );

function validarFormularioCurrencies(){

    var error = 0;
    var err_campo = "It can't be empty";
    var err_formato_letra = "Invalid field";
    var err_formato_decimal = "Not an float, Ej. 00.0000";
    var err_formato_entero = "Not an integer, Ej. 00";

    var name = document.getElementById('name').value;
    var number = document.getElementById('type').value;
    var factor = document.getElementById('factor').value;
    var symbol = document.getElementById('symbol').value;
    var tenth = document.getElementById('tenth').value;

    if(name == null || name.length == 0 || /^\s+$/.test(name)){
        colocaError("err_name", "seccion_name",err_campo,"update");
        error = 1; 
    }else if(!validarNombre(name)){
        colocaError("err_name", "seccion_name",err_formato_letra,"update");
        error = 1;
    }else{
        quitarError("err_name","seccion_name","update");
    }

    if(number == null || number.length == 0 || /^\s+$/.test(number)){
        colocaError("err_number", "seccion_number",err_campo,"update");
        error = 1; 
    }else if(!validarNombre(number)){
        colocaError("err_number", "seccion_number",err_formato_letra,"update");
        error = 1; 
    }else{
        quitarError("err_number","seccion_number","update");
    }

    if(factor == null || factor.length == 0 || /^\s+$/.test(factor)){
        colocaError("err_factor", "seccion_factor",err_campo,"update");
        error = 1; 
    }else if(!validateDecimal(factor)){
        colocaError("err_factor", "seccion_factor",err_formato_decimal,"update");
        error = 1;
    }else{
        quitarError("err_factor","seccion_factor","update");
    }

    if(symbol == null || symbol.length == 0 || /^\s+$/.test(symbol)){
        colocaError("err_symbol", "seccion_symbol",err_campo,"update");
        error = 1; 
    }else if(!validarNombre(symbol)){
        colocaError("err_symbol", "seccion_symbol",err_formato_letra,"update");
        error = 1;
    }else{
        quitarError("err_symbol","seccion_symbol","update");
    }   

    if(tenth == null || tenth.length == 0 || /^\s+$/.test(tenth)){
        colocaError("err_tenth", "seccion_tenth",err_campo,"update");
        error = 1; 
    }else if(!esEntero(tenth)){
        colocaError("err_tenth", "seccion_tenth",err_formato_entero,"update");
        error = 1;
    }else{
        quitarError("err_tenth","seccion_tenth","update");
    } 

    if(error == 1){
        return false;
    }else{
        return true;
    }
}

$('#type').on('blur keyup', function(){

    var number = this.value;
    var err_campo = "It can't be empty";
    var err_formato_letra = "Invalid field";

    if(number == null || number.length == 0 || /^\s+$/.test(number)){
        colocaError("err_number", "seccion_number",err_campo,"update");
        error = 1; 
    }else if(!validarNombre(number)){
        colocaError("err_number", "seccion_number",err_formato_letra,"update");
        error = 1; 
    }else{
        quitarError("err_number","seccion_number","update");
    }
});

$('#factor').on('blur keyup', function(){

    var factor = this.value;
    var err_campo = "It can't be empty";
    var err_formato_decimal = "Not an float, Ej. 00.0000";

    if(factor == null || factor.length == 0 || /^\s+$/.test(factor)){
        colocaError("err_factor", "seccion_factor",err_campo,"update");
        error = 1; 
    }else if(!validateDecimal(factor)){
        colocaError("err_factor", "seccion_factor",err_formato_decimal,"update");
        error = 1;
    }else{
        quitarError("err_factor","seccion_factor","update");
    }
});

$('#symbol').on('blur keyup', function(){

    var symbol = this.value;
    var err_campo = "It can't be empty";
    var err_formato_letra = "Invalid field";

    if(symbol == null || symbol.length == 0 || /^\s+$/.test(symbol)){
        colocaError("err_symbol", "seccion_symbol",err_campo,"update");
        error = 1; 
    }else if(!validarNombre(symbol)){
        colocaError("err_symbol", "seccion_symbol",err_formato_letra,"update");
        error = 1;
    }else{
        quitarError("err_symbol","seccion_symbol","update");
    }   
});

$('#tenth').on('blur keyup', function(){

    var tenth = this.value;
    var err_campo = "It can't be empty";
    var err_formato_entero = "Not an integer, Ej. 00";

    if(tenth == null || tenth.length == 0 || /^\s+$/.test(tenth)){
        colocaError("err_tenth", "seccion_tenth",err_campo,"update");
        error = 1; 
    }else if(!esEntero(tenth)){
        colocaError("err_tenth", "seccion_tenth",err_formato_entero,"update");
        error = 1;
    }else{
        quitarError("err_tenth","seccion_tenth","update");
    } 
});
