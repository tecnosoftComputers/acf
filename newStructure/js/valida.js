$(document).ready(function(){ 
  $('[data-toggle="tooltip"]').tooltip(); 
});

function soloNumeros(evt){
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
  return true;
}

function soloNumerosPunto(evt){
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46)
    return false;
  return true;
}

 function caracteres(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  if (tecla==8 || tecla==37 || tecla<=38 || tecla==39 || tecla<=40) return true;
  patron =/[A-Za-z]/;
  te = String.fromCharCode(tecla);
  return patron.test(te);
}

function esEntero(numero){
  if (isNaN(numero)){
    return false;
  } else {
    if (numero % 1 == 0) {
      return true;
    } else {
      return false;
    }
  }
}

function validateDecimal(valor) {

  var RE = /^([0-9]+\.?[0-9]{2,})$/;
  if (RE.test(valor)) {
    return true;
  } else {
    return false;
  }
}

function validarNombre(nombre){
  if((/^[A-Za-zÁÉÍÓÚñáéíóúÑ0-9\-&\/ ]{1,}$/.test(nombre))){
    return true;
  }
  else{
    return false;
  }
}


function colocaError(campo, id, mensaje,btn){

  nodo = document.getElementById(campo);
  nodo.innerHTML = '';
  var elem1 = document.createElement('p');
  var t = document.createTextNode(mensaje); 
  elem1.appendChild(t);

  var elem2 = document.createElement("p");             
  elem2.classList.add('list-unstyled');
  elem2.classList.add('msg_error');
  
  elem2.appendChild(elem1); 
  nodo.appendChild(elem2); 
  $("#"+id).addClass('has-error');
  $("#"+btn).addClass('disabled');
}

function quitarError(campo,id,btn){

  document.getElementById(campo).innerHTML = '';
  $("#"+id).removeClass('has-error');

  if(enableBTN()){
   $("#"+btn).removeClass('disabled');
 }
}

function enableBTN(event){

  var flag = false;
  if(errorsVerify() != false){
    flag = true;
  }

  return flag;
}

function errorsVerify(){

  var flag = false;
  var errors = document.getElementsByClassName("has-error");
  if(errors.length == 0){
    flag = true;
  }

  return flag;
}

function clean(campos){

  for (var i = 0; i < campos.length; i++) {
    document.getElementById(campos[i]).value = '';
  }
}

if(document.getElementById('addForm')){

  if(!document.getElementById('create')){
    if(!validarFormulario()){
     $("#update").addClass('disabled');
   }
 }else{
  $("#update").addClass('disabled');
}
}

function validarFormulario(){

  var error = 0;
  var err_campo = "It can't be empty";
  var err_formato_letra = "Invalid field";

  if(document.getElementById('name')){
    var name = document.getElementById('name').value;
    if(name == null || name.length == 0 || /^\s+$/.test(name)){
      colocaError("err_name", "seccion_name",err_campo,"update");
      error = 1; 
    }else if(!validarNombre(name)){
      colocaError("err_name", "seccion_name",err_formato_letra,"update");
      error = 1;
    }else{
      quitarError("err_name","seccion_name","update");
    }
  }

  if(document.getElementById('code')){
    var number = document.getElementById('code').value;
    if(number == null || number.length == 0 || /^\s+$/.test(number)){
      colocaError("err_number", "seccion_number",err_campo,"update");
      error = 1; 
    }else if(!validarNombre(number)){
      colocaError("err_number", "seccion_number",err_formato_letra,"update");
      error = 1; 
    }else{
      quitarError("err_number","seccion_number","update");
    }
  }

  if(error == 1){
    return false;
  }else{
    return true;
  }
}

if(document.getElementById('name')){
  $('#name').on('blur keyup', function(){

    var name = this.value;
    var err_campo = "It can't be empty";
    var err_formato_letra = "Invalid Name";

    if(name == null || name.length == 0 || /^\s+$/.test(name)){
      colocaError("err_name", "seccion_name",err_campo,"update");
      error = 1; 
    }else if(!validarNombre(name)){
      colocaError("err_name", "seccion_name",err_formato_letra,"update");
      error = 1;
    }else{
      quitarError("err_name","seccion_name","update");
    }
  });
}

if(document.getElementById('code')){
  $('#code').on('blur keyup', function(){

    var number = this.value;
    var err_campo = "It can't be empty";
    var err_formato_numeros = "Invalid account";
    var expreg_number = /^([0-9])+(.([0-9])+)*([.]{0,1})$/i;
    var err_formato_letra = "Invalid Name";

    if(number== null || number.length == 0 || /^\s+$/.test(number)){
      colocaError("err_number", "seccion_number",err_campo,"update");
      error = 1; 
    }else if(!validarNombre(number)){
      colocaError("err_number", "seccion_number",err_formato_letra,"update");
      error = 1; 
    }else{
      quitarError("err_number","seccion_number","update");
    }
  });
}

if(document.getElementById('clean')){
  $('#clean').on('click', function(){

    if(!document.getElementById('create')){
      var campos = ['name'];
    }else{

      if(document.getElementById('name') && document.getElementById('code')){
        var campos = ['name','code'];
      }else{
        var campos = ['name'];
      }
    }
    clean(campos);
  });
}

if(document.getElementById('new')){

  $('#new').on('click', function(){
    $('#export').hide();
  });
}

if(document.getElementById('list')){

  $('#list').on('click', function(){
    $('#export').show();
  });
}

function loadModal(name_field,name_field2,permission1,permission2,search){

  var puerto_host = $('#puerto_host').val();
  var field_name = '#'+name_field;
  var field_name2 = '#'+name_field2;

  $('#field_name').val(field_name);

  if(search==true){
    var match = 'All';
  }else{
    var match = $('#field_s').val();
  }
  
  var url = puerto_host+"/index.php?mostrar=accounts&opcion=search";
  $.ajax({
    type:'POST',
    url:url,
    data:{ match : match },
    beforeSend: function(){
     $('#accounts').html('<img src="'+puerto_host+'/imagenes/loading.gif" style="margin-left: 20%;" width="400" />');
    },
    success: function(valores){

      var datos = JSON.parse(valores);

      var html = '';

      if(search==true){
        html += '<div class="form-group">';
        html += '<div class="col-lg-12"><input type="text" name="field_s" id="field_s" class="form-control" onkeyup="loadModal(\''+name_field+'\',\''+name_field2+'\','+permission1+','+permission2+',false)" placeholder="Search.."></div>';
        html += '<br><br><br>';
      }

      html += '<div id="table_autoload"><table id="accounts" class="display table table-striped table-bordered">';
      html += '<thead>';
      html += '<tr>';
      html += '<td align="center"><b>Code</b></td>';
      html += '<td align="center"><b>Name</b></td>';
      html += '<td align="center"><b>Action</b></td>';
      html += '</tr>';
      html += '</thead>';
      html += '<tbody>';
      if(datos.length != 0){
        for (var clave in datos){
          if (datos.hasOwnProperty(clave)) {

            var re = /\./gi;
            if(datos[clave].CODIGO){
              var cod = datos[clave].CODIGO;
              var name = datos[clave].NOMBRE;
            }else{
              var cod = datos[clave].value;
              var r = cod+' - ';
              var name = datos[clave].label.replace(r,'');
            }
            var cod_aux = cod.replace(re,'');
            newvar = cod.substring(cod.length - 1, cod.length);

            html += '<tr class="odd gradeX" data-toggle="collapse" data-target="#demo'+cod_aux+'" class="accordion-toggle">';

            if(newvar == '.'){
              html += '<td><strong>'+cod+'</strong></td>';
                  html += '<td><strong>'+name+'</strong></td>';
                }else{
                  html += '<td style="padding-left:30px;">'+cod+'</td>';
                  html += '<td>'+name+'</td>';
                }

                if((newvar == '.' && permission1 == true) || (newvar != '.' && permission2 == true) || (permission1 == true && permission2 == true)){
                  
                  html += '<td width=40 data-toggle="modal" data-target="#myModal"> <a href="javascript:select(\''+field_name+'\',\''+field_name2+'\',\''+cod+'\',\''+name+'\');"><span class="badge" style="background-color:#1e6cb6; width:120px"><i class="fa fa-check"> Select</i></span></a></td>';
                }else{
                  html += '<td width=40><a title="Error, no puede seleccionar una cuenta mayor" class="unselectable" href="#"><span class="badge" style="background-color:#1e6cb6; width:120px"><i class="fa fa-check"> Select</i></span></td>';
                }
                
            html += '</tr>';
          }
        }
      }else{
        html += '<tr align="center"><td colspan="3">No matching records found</td></tr>';
      }
      html += '</tbody></table></div>';

      if(search==true){
        $('#contentBody').html(html);
      }else{
        $('#table_autoload').html(html);
      }
    }
  });
}

function searchAccount(name_field,name_field2,permission1,permission2){

  var puerto_host = $('#puerto_host').val();
  var match = $('#field_s').val();

  //if(match != ''){
    var url = puerto_host+"/index.php?mostrar=accounts&opcion=search";
    $.ajax({
        type:'POST',
        url:url,
        beforeSend: function(){
         $('#accounts').html('<img src="'+puerto_host+'/imagenes/loading.gif" style="margin-left: 20%;" width="400" />');
        },
        data:{ coincidence : match },
        success: function(valores){

          var datos = JSON.parse(valores); 
          
          var html = '<table id="accounts" class="display table table-striped table-bordered">';
              html += '<thead>';
              html += '<tr>';
              html += '<td align="center"><b>Code</b></td>';
              html += '<td align="center"><b>Name</b></td>';
              html += '<td align="center"><b>Action</b></td>';
              html += '</tr>';
              html += '</thead>';
              html += '<tbody>';

          if(datos.length != 0){
            for (var clave in datos){

              if (datos.hasOwnProperty(clave)) {

                var cod = datos[clave].value;
                var name = datos[clave].label;
                var cod_aux = cod.replace(/\./g, '');

                newvar = cod.substring(cod.length - 1, cod.length);

                html += '<tr class="odd gradeX" data-toggle="collapse" data-target="#demo'+cod_aux+'" class="accordion-toggle">';

                if(newvar == '.'){
                  html += '<td><strong>'+cod+'</strong></td>';
                      html += '<td><strong>'+name+'</strong></td>';
                    }else{
                      html += '<td style="padding-left:30px;">'+cod+'</td>';
                      html += '<td>'+name+'</td>';
                    }

                    if((newvar == '.' && permission1 && !permission2) || (newvar != '.' && !permission1 && permission2) || (permission1 && permission2)){
                      html += '<td width=40 data-toggle="modal" data-target="#myModal"> <a href="javascript:select(\''+name_field+'\',\''+name_field2+'\',\''+cod+'\',\''+name+'\');"><span class="badge" style="background-color:#1e6cb6; width:120px"><i class="fa fa-check"> Select</i></span></a></td>';
                    }else{
                html += '<td width=40><a title="Error, no puede seleccionar una cuenta mayor" class="unselectable" href="#"><span class="badge" style="background-color:#1e6cb6; width:120px"><i class="fa fa-check"> Select</i></span></td>';
                    }
                    
                html += '</tr>';
              }
            }
            html += '</tbody></table>';
            $('#table_autoload').html(html);
          }else{
            html += '<tr align="center"><td colspan="3">No matches found</td></tr>';
            html += '</tbody></table>';
            $('#table_autoload').html(html);
          }
        }
    });
  //}
}

function select(field_name,field_name2,code,name){

  var re = /\./gi;
  $('#codepp').val(code);
  $(field_name).val(code.replace(re,''));

  if(field_name2 != '#false'){
    $(field_name2).val(name);
  }
}
