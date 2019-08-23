var data = [];

 $(document).ready(function(){ 

  var puerto_host = $('#puerto_host').val();
  type_f();
  searchAccountDetail();

  $('.myDatepicker').datepicker({
      format: 'mm/dd/yyyy',
      autoclose: true
  });

  $('#journalList').DataTable( {
      "paging": false
  });

  $( "#code1" ).autocomplete({
    source: function( request, response ) {
       $.ajax({
        url: $('#puerto_host').val()+"/index.php?mostrar=accounts&opcion=search",
        dataType: "json",
        type: "POST",
        data: {
          match: request.term
        },
        success: function( data ) {
          response( data );
        }
      });

    },
    minLength: 1,
    select: function( event, ui ) {
      $('#name_').val(ui.item.label.replace(ui.item.value+' - ', ''));
      ui.item.value = ui.item.value.replace(/\./g, '');
    },
    open: function() {
      $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
    },
    close: function() {
      $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
    }
  }).data("ui-autocomplete")._renderItem = function (ul, item) {
    if(item.value.endsWith('.') == true){
        return $('<li class="ui-state-disabled">'+item.label+'</li>').appendTo(ul);
    }else{
        return $("<li>")
        .append("<a>" + item.label + "</a>")
        .appendTo(ul);
    }
  };

  $("#_memo").keyup(function () {
    var value = $(this).val();
    $(".memo").val(value);
  });

});

function type_f(){
  var puerto_host = $('#puerto_host').val();
  var sel = $('#_seleccion').val();
  $('#_actual').val('');
  $.ajax({
    type:"POST",
    data:{type:sel},
    url:puerto_host+"/index.php?mostrar=accounts&opcion=searchType",
    success:function(r){
      var dato = JSON.parse(r);
      //console.log(dato);
      $('#number').val(dato.name+' Nº '+dato.number);   
    }
  });
}

 $('#_seleccion').on('change',function(){
    type_f();
    clearForm();
  });


function function_credit(f){
  
  var debit = parseFloat($('#el_debit'+f).val());
  var tdebit = parseFloat($('#tdebit').html())-debit;
  $('#tdebit').html(Math.abs(tdebit));
  $('#tcredit').html(Math.abs(parseFloat($('#tcredit').html())+parseFloat($('#el_credit'+f).val())));
  $('#el_debit'+f).val('0.00');
}

function function_debit(f){
  var credit = parseFloat($('#el_credit'+f).val());
  var tcredit = parseFloat($('#tcredit').html())-credit;
  $('#tcredit').html(Math.abs(tcredit));
  $('#tdebit').html(Math.abs(parseFloat($('#tdebit').html())+parseFloat($('#el_debit'+f).val())));
  $('#el_credit'+f).val('0.00');
}


function runTable(numInput){

  var sum = 0;
  var tableReg = document.getElementById('journal');
  var myBodyElements = tableReg.getElementsByTagName("tr");

  if(myBodyElements.length >= 1){
    for (i = 1; i < myBodyElements.length; i++) {
      var inputs = myBodyElements[i].getElementsByTagName("input");
      sum = sum + parseFloat(inputs[numInput].value);
    }
  }

  return sum;
}

function updateBalance(s1,s2,btn,btn2){

  if (s1 > s2) { // El debito es mayor a credito
    $('#mensaje').html("Credit ");
    var diff = s1 - s2;
    $('#balance').html(diff);
  }else{
    $('#mensaje').html("Debit ");
    var diff = s2 - s1;
    $('#balance').html(s2 - s1);
  }

  if(diff == 0){
    $(btn).removeClass('disabled');
    $(btn).removeAttr('disabled');
    $(btn2).removeClass('disabled');
    $(btn2).removeAttr('disabled');
  }else{
    $(btn).addClass('disabled');
    $(btn).attr('disabled');
    $(btn2).addClass('disabled');
    $(btn2).attr('disabled');
  }
  return diff;
}

function autocompleteRow(){

  $( "#code1" ).autocomplete({
    source: function( request, response ) {
 
      $.ajax({
        url: $('#puerto_host').val()+"/index.php?mostrar=accounts&opcion=search",
        dataType: "json",
        type: "POST",
        data: {
          match: request.term
        },
        success: function( data ) {
          response( data );
        }
      });

    },
    minLength: 1,
    select: function( event, ui ) {
      $('#name_').val(ui.item.label.replace(ui.item.value+' - ', ''));
      ui.item.value = ui.item.value.replace(/\./g, '');
    },
    open: function() {
      $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
    },
    close: function() {
      $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
    }
  });
}


function reverseInput(id,btn,btn2){

  var temp = $('#el_debit'+id).val();
  $('#el_debit'+id).val($('#el_credit'+id).val());
  $('#el_credit'+id).val(temp);
  recalculate(btn,btn2);
}

function reverseAll(){

  var tableReg = document.getElementById('journal');
  var myBodyElements = tableReg.getElementsByTagName("tr");
  for (i = 1; i < myBodyElements.length; i++) {
    var inputs = myBodyElements[i].getElementsByTagName("input");
    var v1 = inputs[7].value;
    var v2 = inputs[8].value;
    $('#el_debit'+i).val(v2);
    $('#el_credit'+i).val(v1);
  }
  recalculate('#update','#memoriceUpdate');
}

$('#reverseAll').on('click',function(){
  reverseAll();
});


function insertRow(){
  
  var numRow = parseInt($('#numRow').val(),10);
  var account = $('#code1').val();
  var name = $('#name_').val();
  var type = $('#type').val();
  var codep = $('#codepp').val();
  var ref = $('#referencia').val();
  var memo = $('#description').val();
  var typeTrans = $('#trans').val();
  var debit1 = parseFloat($('#debit').val());
  var credit1 = parseFloat($('#credit').val());

  var f = numRow+1;

  if(numRow==0){
    $('#num0').closest('tr').remove();
  }

  if((account != '' && name != '' && memo != '' && (debit1 > parseFloat('0.00') || credit1 > parseFloat('0.00'))) && (data.includes(account) == true)){
    var row = '<tr class="odd gradeX" id="num'+f+'">'+'\n';
      row += '<td>'+'\n'; 
              row += '<input class="control2" autocomplete="off" type="text" id="_accountycode'+f+'" name="_accountycode[]" value="'+account+'" required />'+'\n';
      row += '</td>'+'\n';
      row += '<td><input class="control2" type="text" id="_accountyname'+f+'" name="_accountyname[]" autocomplete="off" value="'+name+'"  required /></td>'+'\n';
      row += '<td style="display:none"><input class="control2 type" type="hidden" id="el_type'+f+'" name="el_type[]" value="'+type+'"/>'+'\n';
      row += '<input class="control2" type="hidden" id="_references'+f+'" name="el_ref[]" value="'+ref+'" />'+'\n';
      row += '<input class="control2" type="hidden"  id="codep'+f+'" name="codep[]" value="'+codep+'" required />'+'\n';
      row += '<input class="control2 memo" type="hidden"  id="el_memo'+f+'" name="el_memo[]" value="'+memo+'" required />'+'\n';
      row += '<input class="control2" type="hidden"  id="_trans'+f+'" name="_trans[]" value="'+typeTrans+'" required /></td>'+'\n';
      row += '<td ><input class="control2" type="text" id="el_debit'+f+'" name="el_debit[]" value="'+$('#debit').val()+'" required/></td>'+'\n';
      row += '<td><input class="control2" type="text" id="el_credit'+f+'" name="el_credit[]" value="'+$('#credit').val()+'" required/></td>'+'\n';
      row += '<td colspan="2" align="center" style="background-color: #d9f2fa;padding-top: 3px;padding-bottom: 1px;">'+'\n';
      row += '<button data-toggle="tooltip" data-placement="bottom" type="button" id="reverse" name="reverse" title="Reverse" onclick="reverseInput('+f+',\''+'#save'+'\',\''+'#memorice'+'\')" class="btn btn-default btn-small-vertical"><i class="fa fa-refresh"></i></button>'+'\n';
      row += '<button data-toggle="tooltip" data-placement="bottom" type="button" id="edit" name="edit"  title="Update" onclick="editInputs('+f+')" class="btn btn-default btn-small-vertical"><i class="fa fa-edit"></i></button>'+'\n';
      row += '<button data-toggle="tooltip" data-placement="bottom" type="button" id="dr" name="dr"  title="Delete" onclick="deleteRow('+f+',\''+'#save'+'\',\''+'#memorice'+'\')" class="btn btn-default btn-small-vertical"><i class="fa fa-trash"></i></button></td>'+'\n';
    row += '</tr>';

    $('#journal tr:last').after(row);
    if(debit1 > parseFloat('0.00')){
      function_debit(f);
    }else{
      function_credit(f);
    }

    recalculate('#save','#memorice');

    $('#numRow').val(f);
    $('#myModalRow').modal('hide');
  }else{

    if((account != '' && name != '' && memo != '' && (debit1 > parseFloat('0.00') || credit1 > parseFloat('0.00'))) && data.includes(account) == false){
      Swal.fire({      
        html: 'It cannot be a major account.',
        imageUrl: $('#puerto_host').val()+'/imagenes/wrong-04.png',
        imageWidth: 75,
        confirmButtonText: 'OK',
        animation: true
      }); 
    }else{

     /* if(account == ''){
        colocaError("err_accountycode", "seccion_accountycode","can't be empty","btn_save");
      }

      if(name == ''){
        colocaError("err_accountyname", "seccion_accountyname","can't be empty","btn_save");
      }

      if(memo == ''){
        colocaError("err_description", "seccion_description","can't be empty","btn_save");
      }

      if(debit1 <= parseFloat('0.00') && credit1 <= parseFloat('0.00')){
        colocaError("err_debit", "seccion_debit","It cannot be 0.00 both","btn_save");
        colocaError("err_credit", "seccion_credit","It cannot be 0.00 both","btn_save");
      }*/
    
      Swal.fire({      
        html: 'You must fill in the fields, account, name, memo, debit and credit.',
        imageUrl: $('#puerto_host').val()+'/imagenes/wrong-04.png',
        imageWidth: 75,
        confirmButtonText: 'OK',
        animation: true
      }); 
    }
  }
}

function round(value, decimals) {
  return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
}

function insertRow2(account,name,type,codep,ref,memo,typeTrans,debit1,credit1){

  var numRow = parseInt($('#numRow').val(),10);
  var f = numRow+1;

  if(numRow==0){
    $('#num0').closest('tr').remove();
  }

  var row = '<tr class="odd gradeX" id="num'+f+'">'+'\n';
  row += '<td>'+'\n'; 
          row += '<input class="control2" autocomplete="off" type="text" id="_accountycode'+f+'" name="_accountycode[]" value="'+account+'" required />'+'\n';
  row += '</td>'+'\n';
  row += '<td><input class="control2" type="text" id="_accountyname'+f+'" name="_accountyname[]" autocomplete="off" value="'+name+'"  required /></td>'+'\n';
  row += '<td style="display:none"><input class="control2 type" type="hidden" id="el_type'+f+'" name="el_type[]" value="'+type+'"/>'+'\n';
  row += '<input class="control2" type="hidden" id="_references'+f+'" name="el_ref[]" value="'+ref+'" />'+'\n';
  row += '<input class="control2" type="hidden"  id="codep'+f+'" name="codep[]" value="'+codep+'" required />'+'\n';
  row += '<input class="control2 memo" type="hidden"  id="el_memo'+f+'" name="el_memo[]" value="'+memo+'" required />'+'\n';
  row += '<input class="control2" type="hidden"  id="_trans'+f+'" name="_trans[]" value="'+typeTrans+'" required /></td>'+'\n';
  row += '<td ><input class="control2" type="text" id="el_debit'+f+'" name="el_debit[]" value="'+debit1+'" onkeyup="function_debit('+f+')" required/></td>'+'\n';
  row += '<td><input class="control2" type="text" id="el_credit'+f+'" name="el_credit[]" value="'+credit1+'" onkeyup="function_credit('+f+')" required/></td>'+'\n';
  row += '<td colspan="2" align="center" style="background-color: #d9f2fa;padding-top: 3px;padding-bottom: 1px;">'+'\n';
  row += '<button data-toggle="tooltip" data-placement="bottom" type="button" id="reverse" name="reverse" title="Reverse" onclick="reverseInput('+f+',\''+'#update'+'\',\''+'#memoriceUpdate'+'\')" class="btn btn-default btn-small-vertical"><i class="fa fa-refresh"></i></button>'+'\n';
  row += '<button data-toggle="tooltip" data-placement="bottom" type="button" id="edit" name="edit" title="Update" onclick="editInputs('+f+')" class="btn btn-default btn-small-vertical"><i class="fa fa-edit"></i></button>'+'\n';
  row += '<button data-toggle="tooltip" data-placement="bottom" type="button" id="dr" name="dr" title="Delete" onclick="deleteRow('+f+',\''+'#update'+'\',\''+'#memoriceUpdate'+'\')" class="btn btn-default btn-small-vertical"><i class="fa fa-trash"></i></button></td>'+'\n';
  row += '</tr>';

  $('#journal tr:last').after(row);

  if(debit1 > parseFloat('0.00')){
    function_debit(f);
  }else{
    function_credit(f);
  }
  recalculate('#update','#memoriceUpdate');

  $('#numRow').val(f);
}

function deleteRow(f,btn,btn2){

  var account = $('#_accountycode'+f).val();
  var name = $('#_accountyname'+f).val();
  var type = $('#el_type'+f).val();
  var memo = $('#el_memo'+f).val();
  var debit = $('#el_debit'+f).val();
  var credit = $('#el_credit'+f).val();
  var numRow = $('#numRow').val();
  
  $('#num'+f).closest('tr').remove();

  if(document.getElementById("journal").rows.length == 1){
    var row = '<tr id="num0"><td align="center" colspan="9" style="padding-top: 8px; padding-bottom: 8px;background-color: #d9f2fa;">Empty Journal</td></tr>';
    $('#journal tr:last').after(row);
    $('#numRow').val('0');
    $('#tdebit').html('0');
    $('#tcredit').html('0');
    $('#balance').html('0');
  }else{
    recalculate(btn,btn2);
  }
}

function validateHead(){

  if($('#_memo').val() != '' && $('#benef').val() != null && $('#benef').val() != 0){
    return false;
  }else{
    return true;
  }
}

function validateRows(){

  var tableReg = document.getElementById('journal');
  var empty = false;
  var myBodyElements = tableReg.getElementsByTagName("tr");
  for (i = 1; i < myBodyElements.length; i++) {
    var inputs = myBodyElements[i].getElementsByTagName("input");
    for (var f = 0; f < inputs.length; f++) {
      if(f != 2 && f != 3 && f != 6){
        if(f != 1 && inputs[f].value == ''){
          empty = true;
          break;
        }
        if(f == 1 && data.includes(inputs[f].value) == true){
          empty = true;
          break;
        }
      }
    }
  }

  if(empty){
    return true;
  }else{
    return false;
  }
}

$('#save').on('click',function(e){
  var r = $('#puerto_host').val()+'/saveJournal/'; 
  redirect(r,e,'#save','#memorice');
});

$('#memorice').on('click',function(e){
  var r = $('#puerto_host').val()+'/saveMemoriceJournal/';
  redirect(r,e,'#save','#memorice');
});

$('#update').on('click',function(e){
  var r = $('#puerto_host').val()+'/updateJournal/';
  redirect(r,e,'#update','#memoriceUpdate');
});

$('#memoriceUpdate').on('click',function(e){
  var r = $('#puerto_host').val()+'/updateMemoriceJournal/';
  redirect(r,e,'#update','#memoriceUpdate');
});

function redirect(r,e,btn,btn2){

  var s1 = runTable(7);
  var s2 = runTable(8);
 
  if((!validateHead() && validateRows()) || (validateHead() && !validateRows()) || (updateBalance(s1,s2,btn,btn2) != 0)){

    Swal.fire({      
      html: 'Fill in all fields or zero balance',
      imageUrl: $('#puerto_host').val()+'/imagenes/wrong-04.png',
      imageWidth: 75,
      confirmButtonText: 'OK',
      animation: true
    }); 
    e.preventDefault();
  }else{
    document.getElementById('formulario').action = r; 
    document.formulario.submit();
  }
}

$('#clear').on('click',function(){
  location.href = $('#puerto_host').val()+'/journalEntries/';
});

function clearForm(){

  $('#_memo').val('');
  var text = $("select[name=benef] option[value='0']").text();
  $('.bootstrap-select .filter-option').text(text);
  document.getElementById('benef').selectedIndex = -1;
  
  var tableReg = document.getElementById('journal');
  var myBodyElements = tableReg.getElementsByTagName("tr");
  for (i = myBodyElements.length-1; i >= 1; i--) {
    $('#num'+i).closest('tr').remove();
  }

  if($('#numRow').val() != 0){
    var row = '<tr id="num0"><td align="center" colspan="9" style="padding-top: 8px; padding-bottom: 8px;background-color: #d9f2fa;">Empty Journal</td></tr>';
    $('#journal tr:last').after(row);
    $('#numRow').val(0);
  }
}

function clearModal(){

  $('#debit').val('0.00');
  $('#credit').val('0.00');
  $('#description').val($('#_memo').val());
  $('#name_').val('');
  $('#code1').val('');
  $('#type').val('');
  $('#referencia').val('');
  $('#trans option:selected').removeAttr('selected');
  document.getElementById('trans').selectedIndex=0;
}

$('#buttonCloseModal').on('click',function(e){
  clearModal();
});

$('#close').on('click',function(e){
  clearModal();
});

$('#open').on('click',function(e){
  clearModal();
  $('#footer').html('<button type="button" class="btn btn-primary" id="btn_save" onclick="insertRow()"><i class="fa fa-plus"></i>Add</button><button type="button" class="btn btn-warning" data-dismiss="modal" id="buttonCloseModal"><i class="fa fa-sign-out"></i>Exit</button>');
  $('#myModalRow').modal('show');
});

$('#btnSearch').on('click',function(){
  $('#myModalJournal').modal('show');
});

$('#_actual').on('keypress',function(e){

  tecla = (document.all) ? e.keyCode : e.which;
  if (tecla==13){
    searchJournal($('#_seleccion').val(),$('#_actual').val());
  } 
});

$('#btn_cancel').on('click',function(e){
  clearForm();
  $('#_actual').val('');
  $('#_seleccion option:selected').removeAttr('selected');
  document.getElementById('_seleccion').selectedIndex=0;
  type_f();
});

function searchJournal(type,id){

  $.ajax({
    type:"POST",
    data:{type:type, id:id},
    dataType : 'json',
    url:$('#puerto_host').val()+"/index.php?mostrar=accounts&opcion=searchJournal",
    success:function(r){
      if(r.journal != ''){
        clearForm();
        $('#mjs').html('Transaction found do you want?');
        $('#myModalJournal').modal('hide');
        $('#btn_edit').attr('onclick','editJournal("'+r.journal['IDCONT']+'")');
        $('#btn_annul').attr('onclick','annulJournal("'+r.journal['IDCONT']+'")');
        $('#btn_delete').attr('onclick','deleteJournal("'+r.journal['IDCONT']+'")');
        $('#idcont').val(r.journal['IDCONT']);
        $('#myModalTrans').modal('show');
      }else{
        Swal.fire({      
          html: 'Journal not found',
          imageUrl: $('#puerto_host').val()+'/imagenes/wrong-04.png',
          imageWidth: 75,
          confirmButtonText: 'OK',
          animation: true
        }); 
        $('#_actual').val('');
      }
    }
  });
}

function validateDecimal(valor) {

  var RE = /^([0-9]+\.?[0-9]{2,})$/;
  if (RE.test(valor)) {
    return true;
  } else {
    return false;
  }
}

function viewJournal(id){

  $('#viewJournal').modal('show');
  $.ajax({
    type:"POST",
    data:{type:'', id:id},
    dataType : 'json',
    url:$('#puerto_host').val()+"/index.php?mostrar=accounts&opcion=searchJournal",
    success:function(r){
      $('#mjs3').val(r);
    }
  });
}

function editJournal(id){

  $.ajax({
    type:"POST",
    url:$('#puerto_host').val()+"/index.php?mostrar=accounts&opcion=searchJournal",
    data: { id: id},
    dataType : 'json',
    success:function(r){
      
      $('#save').hide();
      $('#memorice').hide();
      $('#update').show();
      $('#memoriceUpdate').show();
      $('#delete').show();
      $('#reverseAll').show();
      
      if(r.journal != ''){
        $('#_actual').val(r.journal['ASIENTO']);
        $('#_memo').val(r.journal['DESC_ASI'].trim());
        var date =  new Date(r.journal['FECHA_ASI']);

        var day = date.getDate()+1;
        var month = date.getMonth()+1;
        if(month<10){
          month = '0'+month;
        }
        var year = date.getFullYear();
        $('#date').val(month+'/'+day+'/'+year);

        var text = $("select[name=benef] option[value='"+r.journal['BENEFICIAR'].trim()+"']").text();
        $('.bootstrap-select .filter-option').text(text);

        var sel = document.getElementById( 'benef' ),
        opts = sel.options;

        for ( var i = 0; i < opts.length; i++ ) {
            
            if(r.journal['BENEFICIAR'].trim() != ''){ 
              var value = r.journal['BENEFICIAR'].trim();
            }else{
              var value = 0;
            }

            if ( opts[i].value === value ) {
              sel.selectedIndex = i;
              break;
            }
        }

        var movi =  r.movi;
        for (var i = 0; i < movi.length; i++) {
          account = movi[i].CODIGO_AUX.trim();
          name = movi[i].NOMBRE.trim();
          type = movi[i].TIPO;
          codep = movi[i].CODMOV.trim();
          ref = movi[i].REFER;
          memo = r.journal['BENEFICIAR'].trim();
          typeTrans = movi[i].GRUPOCON;
          debit = movi[i].DB;
          credit = movi[i].CR;
          insertRow2(account,name,type,codep,ref,memo,typeTrans,debit,credit);
        }

        $('#myModalTrans').modal('hide');
      }
    }
  });
}

function annulJournal(id){

  $('#myModalTrans').modal('hide');
  $('#myModalConf').modal('show');
  $('#mjs2').html('Are you sure of annul');
  $('#btn_conf').attr('href',$('#puerto_host').val()+'/annulJournal/'+id+'/');
}

function deleteJournal(id){

  $('#myModalTrans').modal('hide');
  $('#myModalConf').modal('show');
  $('#mjs2').html('Are you sure of delete');
  $('#btn_conf').attr('href',$('#puerto_host').val()+'/deleteJournal/'+id+'/');
}

function editInputs(f){

  clearModal();
  $('#footer').html('<button type="button" class="btn btn-primary" onclick="save_edit('+f+')"><i class="fa fa-edit"></i>Update</button><button type="button" class="btn btn-warning" data-dismiss="modal" id="buttonCloseModal"><i class="fa fa-sign-out"></i>Exit</button>');
  $('#code1').val($('#_accountycode'+f).val());
  $('#name_').val($('#_accountyname'+f).val());
  $('#type').val($('#el_type'+f).val());
  $('#codepp').val($('#codep'+f).val());
  $('#referencia').val($('#_references'+f).val());
  $('#description').val($('#el_memo'+f).val());
  $('#debit').val($('#el_debit'+f).val());
  $('#credit').val($('#el_credit'+f).val());

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

function save_edit(f){

  $('#_accountycode'+f).val($('#code1').val());
  $('#_accountyname'+f).val($('#name_').val());
  $('#el_type'+f).val($('#type').val());
  $('#codep'+f).val($('#codepp').val());
  $('#_references'+f).val($('#referencia').val());
  $('#el_memo'+f).val($('#description').val());
  $('#_trans'+f).val($('#trans').val());
  $('#el_debit'+f).val($('#debit').val());
  $('#el_credit'+f).val($('#credit').val());
  recalculate('#update','#memoriceUpdate');
  $('#myModalRow').modal('hide');
}

function recalculate(btn,btn2){

  var s1 = runTable(7);
  var s2 = runTable(8);

  $('#tdebit').html(s2);
  $('#tcredit').html(s1);

  updateBalance(s1,s2,btn,btn2);
}

function searchAccountDetail(){

  $.ajax({
    type:"POST",
    url:$('#puerto_host').val()+"/index.php?mostrar=accounts&opcion=searchAccountsDetail",
    dataType: 'json',
    success:function(r){
      for (var i = 0; i < r.accountsDetail.length; i++) {
        data[i] = String(r.accountsDetail[i]['CODIGO_AUX']);
      }
    }
  });
}

function findAccount(elemento,valor)
{
  return elemento===valor;
}

