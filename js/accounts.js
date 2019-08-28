if(document.getElementById('addForm')){

    if(!document.getElementById('create')){
        validarFormulario();
    }
}

function validarFormulario(){

    var expreg_number = /^([0-9])+(.([0-9])+)*([.]{0,1})$/i;
    var error = 0;
    var err_list = "You must select an option";
    var err_campo = "It can't be empty";
    var err_formato_numeros = "Invalid account";
    var err_formato_letra = "Invalid field";

    var name = document.getElementById('name').value;
    var number = document.getElementById('number').value;
    var type = document.getElementById('type');
    var desc = document.getElementById('desc').value;

    if(name == null || name.length == 0 || /^\s+$/.test(name)){
        colocaError("err_name", "seccion_name",err_campo,"update");
        error = 1; 
    }else if(!validarNombre(name)){
        colocaError("err_name", "seccion_name",err_formato_letra,"update");
        error = 1;
    }else{
        quitarError("err_name","seccion_name","update");
    }

    if(type.value == null || type.value == 0){
        colocaError("err_type", "seccion_type",err_list,"update");
        error = 1;
    }else{
        quitarError("err_type", "seccion_type","update");
    }

    if(desc != ''){
        if(!validarNombre(desc)){
            colocaError("err_desc", "seccion_desc",err_formato_letra,"update");
            error = 1;
        }else{
            quitarError("err_desc","seccion_desc","update");
        }
    }

    if(number == null || number.length == 0 || /^\s+$/.test(number)){
        colocaError("err_number", "seccion_number",err_campo,"update");
        error = 1; 
    }else if(!expreg_number.test(number)){
        colocaError("err_number", "seccion_number",err_formato_numeros,"update");
        error = 1; 
    }else{
        quitarError("err_number","seccion_number","update");
    }

    return error;
}

$('#name').on('blur', function(){

    var err_campo = "It can't be empty";
    var err_formato_letra = "Invalid Name";

    if(this.value == null || this.length == 0 || /^\s+$/.test(this)){
        colocaError("err_name", "seccion_name",err_campo,"update");
        error = 1; 
    }else if(!validarNombre(this.value)){
        colocaError("err_name", "seccion_name",err_formato_letra,"update");
        error = 1;
    }else{
        quitarError("err_name","seccion_name","update");
    }
});

$('#type').on('blur', function(){

    var type = this.value;
    var err_list = "You must select an option";

    if(type == null || type == 0){
        colocaError("err_type", "seccion_type",err_list,"update");
        error = 1;
    }else{
        quitarError("err_type", "seccion_type","update");
    }
});

$('#number').on('blur', function(){

    var number = this.value;
    var err_campo = "It can't be empty";
    var err_formato_numeros = "Invalid account";
    var expreg_number = /^([0-9])+(.([0-9])+)*([.]{0,1})$/i;

    if(number== null || number.length == 0 || /^\s+$/.test(number)){
        colocaError("err_number", "seccion_number",err_campo,"update");
        error = 1; 
    }else if(!expreg_number.test(number)){
        colocaError("err_number", "seccion_number",err_formato_numeros,"update");
        error = 1; 
    }else{
        quitarError("err_number","seccion_number","update");
    }
});


function validarNombre(nombre){
    if((/^[A-Za-zÁÉÍÓÚñáéíóúÑ0-9 ]{1,}$/.test(nombre))){
        return true;
    }
    else{
        return false;
    }
}