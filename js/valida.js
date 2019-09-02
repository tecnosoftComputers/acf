$(document).ready(function(){ 
  $('[data-toggle="tooltip"]').tooltip(); 
});

function enviarForm(){
  $('#form_g').submit();
}

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

function viewJournal(id){

  $('#viewJournal').modal('show');
  $('#numRow').val(0);

  $('#table_view').html('');
  var row = '';
  row += '<table width="100%" class="table table-bordered table-hover" id="journalView">';
    row += '<tr style="background: #ddd;" id="num0">';
    row += '<td align="center" width="220" style="padding: 3px 0px 3px 0px"><b>Account</b></td>';
    row += '<td align="center" width="500" style="padding: 3px 0px 3px 0px"><b>Name</b></td>';
    row += '<td align="center" style="display:none"></td>';
    row += '<td align="center" width="220" style="padding: 3px 0px 3px 0px"><b>Debit</b></td>';
    row += '<td align="center" width="220" style="padding: 3px 0px 3px 0px"><b>Credit</b></td>';
    row += '<td align="center" style="display:none"></td>';
    row += '<td align="center" width="140" style="padding: 3px 0px 3px 0px"><b>Action</b></td>';
  row += '</tr></table>';

  $('#table_view').append(row);

  $.ajax({
    type:"POST",
    data:{id:id, item:$('#item').val()},
    dataType : 'json',
    url:$('#puerto_host').val()+"/index.php?mostrar=accounts&opcion=searchJournal",
    success:function(r){
      if(r.journal != ''){

        var rule = r.rule;
        var p = r.permission;

        var viewF = 'onclick="viewMessage(\'You cannot execute this action\')"';
        
        $('#_number').val(r.journal.TIPO_ASI+' - '+r.journal.ASIENTO);
        $('#_date').val(r.journal.FECHA_ASI);
        $('#_memo2').val(r.journal.DESC_ASI);
        $('#_benef').val(r.journal.BENEFICIAR);
        $('#_doc2').val(r.journal.DOCUMENTO);
        $('#_settlement2').val(r.journal.LIQUIDA_NO);

        if(p.pri == 1){
          $('#pdf').attr('href',rule+'/pdf/'+r.journal.IDCONT+'/');
          $('#excel').attr('href',rule+'/excel/'+r.journal.IDCONT+'/');
          $('#pdf').attr("target","_blank");
        }else{
          $('#pdf').attr("onclick","viewMessage('You cannot execute this action')");
          $('#excel').attr("onclick","viewMessage('You cannot execute this action')");
          $('#pdf').removeAttr("target");
        }
       
        var movi =  r.movi;

        for (var i = 0; i < movi.length; i++) {
          var account = movi[i].CODIGO_AUX.trim();
          var name = movi[i].NOMBRE.trim();
          var type = movi[i].TIPO;
          var codep = movi[i].CODMOV.trim();
          var ref = movi[i].REFER;
          var memo = movi[i].CONCEPTO;
          var typeTrans = movi[i].GRUPOCON;
          var documento = movi[i].DOCUMENTO.trim();
          var liq = movi[i].LIQUIDA_NO.trim();

          if(r.movi[i].IMPORTE > 0){
            var debit = r.movi[i].importe_format;
            var credit = '0.00';
          }else{
            var debit = '0.00';
            var credit = r.movi[i].importe_format;
          }

          insertRow3(account,name,type,codep,ref,memo,typeTrans,debit,credit,documento,liq,p.rd);
        }

        var s1 = runTableView(7);
        var s2 = runTableView(8);
        s1 = s1.toString();
        s2 = s2.toString();
        var row1 = '<tr><td colspan="2"></td><td align="right" style="border-top:1px solid #7a7777; font-size:14px;">'+format(s1)+'</td><td align="right" style="border-top:1px solid #7a7777; font-size:14px;">'+format(s2)+'</td><td></td></tr>';
        $('#journalView tr:last').after(row1);
      }
      $('#numRow').val(0);
    }
  });
}

function runTableView(numInput){

  var sum = parseFloat('0.00');
  var tableReg = document.getElementById('journalView');
  var myBodyElements = tableReg.getElementsByTagName("tr");

  if(myBodyElements.length >= 1){
    for (i = 1; i < myBodyElements.length; i++) {
      var inputs = myBodyElements[i].getElementsByTagName("input");
      var val = inputs[numInput].value.replace(/\,/g, '');
      sum = sum + parseFloat(val);
    }
  }

  return sum.toFixed(2);
}

function insertRow3(account,name,type,codep,ref,memo,typeTrans,debit1,credit1,documento,liq,permisssion){

  var numRow = parseInt($('#numRow').val(),10);
  var f = numRow+1;
  var row = '<tr style="background-color: #d9f2fa" class="odd gradeX" id="num'+f+'">'+'\n';
  row += '<td>'+'\n'; 
          row += '<input class="control2 disabled" autocomplete="off" type="text" id="_accountycode'+f+'" name="_accountycode[]" value="'+account+'" readonly />'+'\n';
  row += '</td>'+'\n';
  row += '<td><input class="control2 disabled" type="text" id="_accountyname'+f+'" name="_accountyname[]" autocomplete="off" value="'+name+'" readonly /></td>'+'\n';
  row += '<td style="display:none"><input class="control2 type" type="hidden" id="el_type'+f+'" name="el_type[]" value="'+type+'"/>'+'\n';
  row += '<input class="control2" type="hidden" id="_references'+f+'" name="el_ref[]" value="'+ref+'"/>'+'\n';
  row += '<input class="control2" type="hidden"  id="codep'+f+'" name="codep[]" value="'+codep+'"/>'+'\n';
  row += '<input class="control2 memo" type="hidden"  id="el_memo'+f+'" name="el_memo[]" value="'+memo+'"/>'+'\n';
  row += '<input class="control2" type="hidden"  id="_trans'+f+'" name="_trans[]" value="'+typeTrans+'"/></td>'+'\n';
  row += '<td><input readonly style="text-align:right" class="control2 disabled" type="text" id="el_debit'+f+'" name="el_debit[]" value="'+debit1+'" /></td>'+'\n';
  row += '<td><input readonly style="text-align:right" class="control2 disabled" type="text" id="el_credit'+f+'" name="el_credit[]" value="'+credit1+'" /></td>'+'\n';
  row += '<td style="display:none;"><input class="control2" type="hidden"  id="el_documento'+f+'" name="el_documento[]" value="'+documento+'" />'+'\n';
  row += '<input class="control2" type="hidden"  id="la_liq'+f+'" name="la_liq[]" value="'+liq+'" /></td>'+'\n';
  row += '<td align="center" style="background-color: #d9f2fa;padding-top: 3px;padding-bottom: 1px;">'+'\n';

  if(permisssion == 1){
    var viewF = 'editInputsView(\''+f+'\')';
  }else{
    var viewF = 'viewMessage(\'You cannot execute this action\')';
  }

  row += '<a data-toggle="tooltip" data-placement="bottom" title="View entry" onclick="'+viewF+'"><i class="fa fa-eye"></i></a></td>'+'\n';
  row += '</tr>';

  $('#journalView tr:last').after(row);
  $('#numRow').val(f);
}

function editInputsView(f){

  clearModal();
  $('#footer').html('<button type="button" class="btn btn-danger" data-dismiss="modal" id="buttonCloseModal">Close</button>');
  $('#code1').val($('#_accountycode'+f).val());
  $('#name_').val($('#_accountyname'+f).val());
  $('#type').val($('#el_type'+f).val());
  $('#codepp').val($('#codep'+f).val());
  $('#referencia').val($('#_references'+f).val());
  $('#description').val($('#el_memo'+f).val());
  $('#debit').val($('#el_debit'+f).val());
  $('#credit').val($('#el_credit'+f).val());
  $('#documento').val($('#el_documento'+f).val());
  $('#liq').val($('#la_liq'+f).val());

  var sel = document.getElementById('trans'), opts = sel.options;

  for ( var i = 0; i < opts.length; i++ ) {
      
    if($('#_trans'+f).val() != ''){ 
      var value = $('#_trans'+f).val();
    }else{
      var value = 0;
    }

    if ( opts[i].value === value ) {
      sel.selectedIndex = i;
      break;
    }
  }
  
  $('#code1').attr('disabled','true');
  $('#name_').attr('disabled','true');
  $('#type').attr('disabled','true');
  $('#codepp').attr('disabled','true');
  $('#referencia').attr('disabled','true');
  $('#description').attr('disabled','true');
  $('#debit').attr('disabled','true');
  $('#credit').attr('disabled','true');
  $('#trans').attr('disabled','true');
  $('#docuemnto').attr('disabled','true');
  $('#liq').attr('disabled','true');

  $('#btn_search').attr('disabled','true');
  $('#btn_search').addClass('disabled');

  var sel = document.getElementById( 'trans' ),
  opts = sel.options;

  for ( var i = 0; i < opts.length; i++ ) {
      
    if($('#_trans'+f).val() != ''){ 
      var value = $('#_trans'+f).val();
    }else{
      var value = 0;
    }

    if ( opts[i].value === value ) {
      sel.selectedIndex = i;
      break;
    }
  }

  $('#myModalRow').modal('show');
}

function viewMessage(msj){
  Swal.fire({            
    text: msj,
    imageUrl: $('#puerto_host').val()+'/imagenes/wrong-04.png',
    imageWidth: 75,
    confirmButtonText: 'OK',
    animation: true
  });   
}