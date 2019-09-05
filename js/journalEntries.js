var data = [];

 $(document).ready(function(){ 

  var annul = false;
  $('#annul').val(annul);

  var puerto_host = $('#puerto_host').val();
  type_f();
  searchAccountDetail();

  $('#debit').on('keyup',function(){
    $('#credit').val('0.00');
    points('debit');
  });

  $('#credit').on('keyup',function(){
    $('#debit').val('0.00');
    points('credit');
  });

  $('input[name="date"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    autoClose: true,
  });

  $('input[name="datefilter"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear',
          applyLabel: 'Ok',
      }
  });

  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
  });

  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

  $( "#code1" ).autocomplete({

    source: function( request, response ) {
       $.ajax({
        url: $('#puerto_host').val()+"/index.php?mostrar=accounts&opcion=search",
        dataType: "json",
        type: "POST",
        data: {
          match: request.term, item:$('#item').val()
        },
        beforeSend: function(){
         $('#btn_search').html('<i style="padding-top: 1px; padding-bottom: 1px; color:#1e6cb6" class="fa fa-spinner fa-spin fa-1x"></i>'/*'<span style="padding-top: 1px; padding-bottom: 1px" class="glyphicon glyphicon-repeat"></span>'*/);
        },
        complete:function(){
          $('#btn_search').html('<span style="padding-top: 1px; padding-bottom: 1px" class="glyphicon glyphicon-search"></span>');
          $('#code1').focus();
        },
        success: function( data ) {
          response( data );
        }
      });

    },
    minLength: 1,
    select: function( event, ui ) {
      $('#name_').val(ui.item.label.replace(ui.item.value+' - ', ''));
      $('#codepp').val(ui.item.value);
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

  $("#_memo").on('keyup blur',function () {
    var value = $(this).val();
    $(".memo").val(value);
  });

  $('#journalList').DataTable({
      "paging": false,
  });

 


});

function type_f(){
  var puerto_host = $('#puerto_host').val();
  var sel = $('#_seleccion').val();
  $('#_actual').val('');
  $.ajax({
    type:"POST",
    data:{type:sel, item:$('#item').val()},
    url:puerto_host+"/index.php?mostrar=accounts&opcion=searchType",
    beforeSend: function(){
     $('#loading').modal('show');
    },
    complete:function(){
      $('#loading').modal('hide');
    },
    success:function(r){
      var dato = JSON.parse(r);
      $('#number').val(dato.name+' Nº '+dato.number);   
    }
  });
}

 $('#_seleccion').on('change',function(){
    type_f();
    clearForm();
  });



$('#btnSearch1').on('click',function(){

  var date =  new Date();
  var day = date.getDate()+1;
  var month = date.getMonth()+1;
  if(month < 10){
    month = '0'+month;
  }

  if(day < 10){
    day = '0'+day;
  }

  var year = date.getFullYear();

  var range = $('#datefilter').val(month+'/'+day+'/'+(year-1)+' - '+month+'/'+day+'/'+year);
  document.getElementById('type_select').selectedIndex = 1;
  document.getElementById("btnSearch2").click();
  $('#myModalList').modal('show');
});

$('#btnSearch2').on('click',function(){

  var type = $('#type_select').val();
  var range = $('#datefilter').val().split(' - ');
  $('#bodyContent').html('<tr><td colspan="5" align="center"><img src="'+$('#puerto_host').val()+'/imagenes/loader.gif" width="150" /></td></tr>');
  $.ajax({
    type:"POST",
    data:{type:type, range:range, item:$('#item').val()},
    dataType : 'json',
    url:$('#puerto_host').val()+"/index.php?mostrar=accounts&opcion=searchJournal",
    beforeSend: function(){
     $('#loading').modal('show');
    },
    complete:function(){
      $('#loading').modal('hide');
    },
    success:function(r){
      if(r.journal.length > 0){

        var p = r.permission;

        var html = '';
        for (var i = 0; i < r.journal.length; i++) {

          var ediF = viewF = 'onclick="viewMessage(\'You cannot execute this action\')"';
          if(p.rd == 1){
            viewF = 'onclick="viewJournal(\''+r.journal[i].IDCONT+'\')"';
          }

          if(p.edi == 1){
            ediF = 'onclick="searchJournal(\'\',\''+r.journal[i].IDCONT+'\')"';
          }
          html += '<tr>';
          html += '<td>'+r.journal[i].TIPO_ASI+'</td>';
          html += '<td>'+r.journal[i].ASIENTO+'</td>';

          var date =  new Date(r.journal[i].FECHA_ASI);
          var day = date.getDate()+1;
          var month = date.getMonth()+1;
          if(month < 10){
            month = '0'+month;
          }

          if(day < 10){
            day = '0'+day;
          }

          var year = date.getFullYear();

          html += '<td>'+month+'/'+day+'/'+(year-1)+'</td>';
          html += '<td>'+r.journal[i].BENEFICIAR+'</td>';
          html += '<td align="center"><a data-toggle="tooltip" data-placement="bottom" title="View journal" '+viewF+'><i class="fa fa-eye"></i></a></td>';
          html += '<td align="center"><a data-toggle="tooltip" data-placement="bottom" title="Update journal" '+ediF+'><i class="fa fa-edit"></i></a></td>';
          html += '</tr>';
        }
        
      }else{
        html += '<tr align="center"><td colspan="5">No matching records found</td></tr>';
      }
      $('#bodyContent').html(html);
    }
  });
});


function runTable(numInput){

  var sum = parseFloat('0.00');
  var tableReg = document.getElementById('journal');
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

function updateBalance(s1,s2,btn,btn2){

  var annul = $('#annul').val();
  if (s1 > s2) { // El debito es mayor a credito
    $('#_mensaje').html("Credit ");
    var diff = (Math.abs(s1 - s2)).toFixed(2);
    diff = diff.toString();
    $('#balance').html(format(diff));
  }else{
    $('#_mensaje').html("Debit ");
    var diff = (Math.abs(s2 - s1)).toFixed(2);
    diff = diff.toString();
    $('#balance').html(format(diff));
  }

  if(diff == '0.00' && annul == 'false'){
    $(btn).removeClass('disabled');
    $(btn).removeAttr('disabled');
    $(btn2).removeClass('disabled');
    $(btn2).removeAttr('disabled');
  }else{
    $(btn).addClass('disabled');
    $(btn).attr('disabled','true');
    $(btn2).addClass('disabled');
    $(btn2).attr('disabled','true');
  }
  return diff;
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
  var documento = $('#documento').val();
  var liq = $('#liq').val();
  var debit1 = parseFloat($('#debit').val());
  var credit1 = parseFloat($('#credit').val());

  var d = format($('#debit').val());
  var c = format($('#credit').val());

  var f = numRow+1;

  if((account != '' && name != '' && memo != '' && (debit1 > parseFloat('0.00') || credit1 > parseFloat('0.00'))) && (data.includes(account) == true)){
    var row = '<tr style="background-color: #d9f2fa" class="odd gradeX" id="num'+f+'">'+'\n';
      row += '<td>'+'\n'; 
              row += '<input class="control2" autocomplete="off" type="text" id="_accountycode'+f+'" name="_accountycode[]" value="'+account+'" readonly />'+'\n';
      row += '</td>'+'\n';
      row += '<td><input class="control2" type="text" id="_accountyname'+f+'" name="_accountyname[]" autocomplete="off" value="'+name+'"  readonly /></td>'+'\n';
      row += '<td style="display:none"><input class="control2 type" type="hidden" id="el_type'+f+'" name="el_type[]" value="'+type+'"/>'+'\n';
      row += '<input class="control2" type="hidden" id="_references'+f+'" name="el_ref[]" value="'+ref+'" />'+'\n';
      row += '<input class="control2" type="hidden"  id="codep'+f+'" name="codep[]" value="'+codep+'" />'+'\n';
      row += '<input class="control2 memo" type="hidden"  id="el_memo'+f+'" name="el_memo[]" value="'+memo+'" />'+'\n';
      row += '<input class="control2" type="hidden"  id="_trans'+f+'" name="_trans[]" value="'+typeTrans+'" /></td>'+'\n';
      row += '<td colspan="2" width="320"><input readonly style="text-align:right" class="control2" type="text" id="el_debit'+f+'" name="el_debit[]" value="'+d+'" /></td>'+'\n';
      row += '<td colspan="2" width="320"><input readonly style="text-align:right" class="control2" type="text" id="el_credit'+f+'" name="el_credit[]" value="'+c+'" /></td>'+'\n';
      row += '<td style="display:none;"><input class="control2" type="hidden"  id="el_documento'+f+'" name="el_documento[]" value="'+documento+'" />'+'\n';
      row += '<input class="control2" type="hidden"  id="la_liq'+f+'" name="la_liq[]" value="'+liq+'" /></td>'+'\n';
      row += '<td colspan="2" align="center" style="background-color: #d9f2fa;padding-top: 3px;padding-bottom: 1px;">'+'\n';
      row += '<button data-toggle="tooltip" data-placement="bottom" type="button" id="edit" name="edit"  title="Update" onclick="editInputs('+f+')" class="btn btn-default btn-small-vertical"><i class="fa fa-edit"></i></button>'+'\n';
      row += '<button data-toggle="tooltip" data-placement="bottom" type="button" id="reverse" name="reverse" title="Reverse" onclick="reverseInput('+f+',\''+'#save'+'\',\''+'#memorice'+'\')" class="btn btn-default btn-small-vertical"><i class="fa fa-refresh"></i></button>'+'\n';
      row += '<button data-toggle="tooltip" data-placement="bottom" type="button" id="dr" name="dr"  title="Delete" onclick="deleteRow('+f+',\''+'#save'+'\',\''+'#memorice'+'\')" class="btn btn-default btn-small-vertical"><i class="fa fa-trash"></i></button></td>'+'\n';
    row += '</tr>';

    if(numRow==0){
      $('#num0').closest('tr').remove();
    }

    $('#journal tr:last').after(row);
    if($('#window').val() == 'save'){
      recalculate('#save','#memorice');
    }else{
      recalculate('#update','#memoriceUpdate');
    }

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

function insertRow2(account,name,type,codep,ref,memo,typeTrans,debit1,credit1,documento,liq,annul){

  var numRow = parseInt($('#numRow').val(),10);
  var f = numRow+1;

  if(numRow==0){
    $('#num0').closest('tr').remove();
  }

  var class_disabled = funct1 = funct2 = funct3 = '';
  if(annul == '1'){
    var class_disabled = 'disabled';
  }else{
    var funct1 = 'editInputs('+f+')';
    var funct2 = 'reverseInput('+f+',\''+'#update'+'\',\''+'#memoriceUpdate'+'\')';
    var funct3 = 'deleteRow('+f+',\''+'#update'+'\',\''+'#memoriceUpdate'+'\')';
  }

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
  row += '<td colspan="2" width="305"><input readonly style="text-align:right" class="control2 disabled" type="text" id="el_debit'+f+'" name="el_debit[]" value="'+debit1+'" /></td>'+'\n';
  row += '<td colspan="2" width="305"><input readonly style="text-align:right" class="control2 disabled" type="text" id="el_credit'+f+'" name="el_credit[]" value="'+credit1+'" /></td>'+'\n';
  row += '<td style="display:none;"><input class="control2" type="hidden"  id="el_documento'+f+'" name="el_documento[]" value="'+documento+'" />'+'\n';
  row += '<input class="control2" type="hidden"  id="la_liq'+f+'" name="la_liq[]" value="'+liq+'" /></td>'+'\n';
  row += '<td colspan="2" align="center" style="background-color: #d9f2fa;padding-top: 3px;padding-bottom: 1px;">'+'\n';
  
  row += '<button data-toggle="tooltip" data-placement="bottom" type="button" id="edit" name="edit" title="Update" onclick="'+funct1+'" class="btn btn-default btn-small-vertical '+class_disabled+'" '+class_disabled+'><i class="fa fa-edit"></i></button>'+'\n';
  row += '<button data-toggle="tooltip" data-placement="bottom" type="button" id="reverse" name="reverse" title="Reverse" onclick="'+funct2+'" class="btn btn-default btn-small-vertical '+class_disabled+'" '+class_disabled+'><i class="fa fa-refresh"></i></button>'+'\n';
  row += '<button data-toggle="tooltip" data-placement="bottom" type="button" id="dr" name="dr" title="Delete" onclick="'+funct3+'" class="btn btn-default btn-small-vertical '+class_disabled+'" '+class_disabled+'><i class="fa fa-trash"></i></button></td>'+'\n';
  row += '</tr>';

  $('#journal tr:last').after(row);
  if($('#window').val() == 'save'){
    recalculate('#save','#memorice');
  }else{
    recalculate('#update','#memoriceUpdate');
  }

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
      if(f != 2 && f != 3 && f != 4 && f != 6 && f != 9 && f != 10){
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
 /*console.log(validateHead());
 console.log(validateRows());*/
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

  $('#window').val('save');
  $('#_memo').val('');
  $('#_documento').val('');
  $('#_liq').val('');
  var text = $("select[name=benef] option[value='0']").text();
  $('.bootstrap-select .filter-option').text(text);
  document.getElementById('benef').selectedIndex = -1;
  $('#btn_annul').hide();

  $('#save').show();
  $('#memorice').show();

  $('#update').hide();
  $('#memoriceUpdate').hide();
  $('#reverseAll').hide();
  
  $('#tdebit').html('0.00');
  $('#tcredit').html('0.00');
  $('#balance').html('0.00');
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
  $('#codepp').val('');
  $('#type').val('');
  $('#referencia').val('');
  $('#documento').val('');
  $('#liq').val('');
  $('#trans option:selected').removeAttr('selected');

  $('#code1').removeAttr('disabled');
  $('#name_').removeAttr('disabled');
  $('#type').removeAttr('disabled');
  $('#codepp').removeAttr('disabled');
  $('#referencia').removeAttr('disabled');
  $('#description').removeAttr('disabled');
  $('#debit').removeAttr('disabled');
  $('#credit').removeAttr('disabled');
  $('#trans').removeAttr('disabled');
  $('#documento').removeAttr('disabled');
  $('#liq').removeAttr('disabled');

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

  $('#btn_annul').hide();
  $.ajax({
    type:"POST",
    data:{type:type, id:id, item:$('#item').val()},
    dataType : 'json',
    url:$('#puerto_host').val()+"/index.php?mostrar=accounts&opcion=searchJournal",
    beforeSend: function(){
     $('#loading').modal('show');
    },
    complete:function(){
      $('#loading').modal('hide');
    },
    success:function(r){
      if(r.journal != ''){
        var rule = r.rule;
        var p = r.permission;

        clearForm();

        $('#myModalJournal').modal('hide');
        $('#myModalList').modal('hide');
        $('#idcont').val(r.journal['IDCONT']);
        if(r.journal['ANULADO'] != 1){

          if(p.rd == 1){

            $('#mjs').html('Transaction found do you want?');

            if(p.edi == 1){
              $('#btn_edit').attr('onclick','editJournal("'+r.journal['IDCONT']+'")');
            }else{
              $('#btn_edit').attr('onclick','viewMessage("You cannot execute this action")');
            }

            if(p.del == 1){
              $('#btn_annul').attr('onclick','annulJournal("'+r.journal['IDCONT']+'")');
            }else{
              $('#btn_annul').attr('onclick','viewMessage("You cannot execute this action")');
            }
            
            if(p.pri == 1){
              $('#pdf_notif').attr('href',rule+'/pdf/'+r.journal.IDCONT+'/');
              $('#excel_notif').attr('href',rule+'/excel/'+r.journal.IDCONT+'/');
              $('#pdf').attr('href',rule+'/pdf/'+r.journal.IDCONT+'/');
              $('#excel').attr('href',rule+'/excel/'+r.journal.IDCONT+'/');
              
              $('#pdf_notif').attr("target","_blank");
              $('#pdf').attr("target","_blank");
            }else{
              $('#pdf').attr("onclick","viewMessage('You cannot execute this action')");
              $('#excel').attr("onclick","viewMessage('You cannot execute this action')");
              $('#pdf_notif').attr("onclick","viewMessage('You cannot execute this action')");
              $('#excel_notif').attr("onclick","viewMessage('You cannot execute this action')");

              $('#pdf_notif').removeAttr("target");
              $('#pdf').removeAttr("target");
            }
            $('#myModalTrans').modal('show');
          }else{
            viewMessage('You cannot execute this action');
          }
          var annul = false;
        }else{

          var annul = true;
          editJournal(r.journal['IDCONT']);

          $('#save').addClass('disabled');
          $('#save').attr('disabled','true');
          $('#memorice').addClass('disabled');
          $('#memorice').attr('disabled','true');

          //anular todo
          Swal.fire({      
            html: 'Journal void',
            imageUrl: $('#puerto_host').val()+'/imagenes/wrong-04.png',
            imageWidth: 75,
            confirmButtonText: 'OK',
            animation: true
          });
          $('#btn_annul').show();
        } 
        $('#annul').val(annul);
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

function editJournal(id){

  $.ajax({
    type:"POST",
    url:$('#puerto_host').val()+"/index.php?mostrar=accounts&opcion=searchJournal",
    data: { id: id, item:$('#item').val()},
    dataType : 'json',
    beforeSend: function(){
     $('#loading').modal('show');
    },
    complete:function(){
      $('#loading').modal('hide');
    },
    success:function(r){

      if(r.journal['ANULADO'] != 1){
        $('#save').hide();
        $('#memorice').hide();
        $('#update').show();
        $('#memoriceUpdate').show();
        $('#delete').show();
        $('#reverseAll').show();
        $('#window').val('update');
      }

      if(r.journal != ''){

         var sel = document.getElementById( '_seleccion' ),
          opts = sel.options;

          for ( var i = 0; i < opts.length; i++ ) {
              
            if(r.journal['TIPO_ASI'] != ''){ 
              var value = r.journal['TIPO_ASI'].trim();
            }else{
              var value = 0;
            }

            if ( opts[i].value == value ) {
              sel.selectedIndex = i;
              break;
            }
          }

        $('#_actual').val(r.journal['ASIENTO']);
        data_journal(r);
        $('#myModalTrans').modal('hide');
      }
    }
  });
}

function annulJournal(id){

  $('#myModalTrans').modal('hide');
  $('#myModalConf').modal('show');
  $('#mjs2').html('Are you sure of canceled?');
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
  $('#documento').val($('#el_documento'+f).val());
  $('#liq').val($('#la_liq'+f).val());

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
  $('#el_documento'+f).val($('#documento').val());
  $('#la_liq'+f).val($('#liq').val());

  if($('#window').val() === 'save'){
    recalculate('#save','#memorice');
  }else{
    recalculate('#update','#memoriceUpdate');
  }

  $('#myModalRow').modal('hide');
}

function recalculate(btn,btn2){

  var s1 = runTable(7);
  var s2 = runTable(8);

  $('#tdebit').html(format(s1));
  $('#tcredit').html(format(s2));

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

function copyJournal(id){

  $.ajax({
    type:"POST",
    data:{id:id, item:$('#item').val()},
    dataType : 'json',
    url:$('#puerto_host').val()+"/index.php?mostrar=accounts&opcion=searchJournal",
    beforeSend: function(){
     $('#loading').modal('show');
    },
    complete:function(){
      $('#loading').modal('hide');
    },
    success:function(r){
     
      if(r.journal != ''){
        clearForm();
        $('#_actual').val('');
        data_journal(r);
        recalculate('#save','#memorice');
        $('#myModalJournal').modal('hide');
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

function data_journal(r){

  if(r.journal['ANULADO'] == 1){
    
    var annul = true;

    $('#_memo').addClass('disabled');
    $('#_memo').attr('disabled','true');

    $('#_documento').addClass('disabled');
    $('#_documento').attr('disabled','true');

    $('#_liq').addClass('disabled');
    $('#_liq').attr('disabled','true');

    $('#open').attr('disabled','true');
    $('#open').addClass('disabled');

    $('#date').attr('disabled','true');
    $('#date').addClass('disabled');

    $("#benef").prop("disabled", true);
    $(".selectpicker[data-id='benef']").addClass("disabled");

  }else{

    var annul = false;

    $('#_memo').removeClass('disabled');
    $('#_memo').removeAttr('disabled','true');

    $('#_documento').removeClass('disabled');
    $('#_documento').removeAttr('disabled','true');

    $('#_liq').removeClass('disabled');
    $('#_liq').removeAttr('disabled','true');

    $('#open').removeAttr('disabled','true');
    $('#open').removeClass('disabled');

    $('#date').removeAttr('disabled','true');
    $('#date').removeClass('disabled');

    $("#benef").prop("disabled", false);
    $(".selectpicker[data-id='benef']").removeClass("disabled");
  }

  $('#annul').val(annul);
  $('#_documento').val(r.journal['DOCUMENTO'].trim());
  $('#_liq').val(r.journal['LIQUIDA_NO'].trim());
  $('#_memo').val(r.journal['DESC_ASI'].trim());
  var date =  new Date(r.journal['FECHA_ASI']);

  var day = date.getDate()+1;
  var month = date.getMonth()+1;
  if(month < 10){
    month = '0'+month;
  }

  if(day < 10){
    day = '0'+day;
  }

  var year = date.getFullYear();
  $('#date').val(month+'/'+day+'/'+year);

  var b = r.journal['CEDRUC'].trim();

  if(b == ''){
    var text = $('select[name=benef] option[value="0"]').text();
  }else{
    var text = $("select[name=benef] option[value='"+b+"']").text();   
  } 

  $('.bootstrap-select .filter-option').text(text);

  var sel = document.getElementById( 'benef' ),
  opts = sel.options;

  for ( var i = 0; i < opts.length; i++ ) {
      
      if(r.journal['CEDRUC'].trim() != ''){ 
        var value = r.journal['CEDRUC'].trim();
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

    insertRow2(account,name,type,codep,ref,memo,typeTrans,debit,credit,documento,liq,r.journal['ANULADO']);
  }
}

$('#cleanFecha').on('click',function(){
  $('#datefilter').val('');
});


function points(where)
{
  var character = document.getElementById(where).value.charAt(document.getElementById(where).value.length-1);
  var decimals = true;
  dec = 2;

  pat = /[\*,.\+,.\(,.\),.\?,.\\,.\$,.\[,.\],.\^]/
  valor = document.getElementById(where).value;
  largo = valor.length;
  crtr = true;
  if(isNaN(character) || pat.test(character) == true)
  { 
    if (pat.test(character)==true) 
    {
      character = "\\" + character;
    }
    carcter = new RegExp(character,"g");
    valor = valor.replace(carcter,"");
    document.getElementById(where).value = valor;
    crtr = false;
  }
  else
  {
    var nums = new Array()
    cont = 0
    for(m=0;m<largo;m++)
    {
      if(valor.charAt(m) == "." || valor.charAt(m) == " " || valor.charAt(m) == ",")
      {
        continue;  
      }
      else{
        nums[cont] = valor.charAt(m)
        cont++
      }
      
    }
  }

  if(decimals == true) {
    ctdd = eval(1 + dec);
    nmrs = 1
  }
  else {
    ctdd = 1; nmrs = 3
  }

  var cad1="",cad2="",cad3="",tres=0
  if(largo > nmrs && crtr == true)
  {
    for (k=nums.length-ctdd;k>=0;k--){
      cad1 = nums[k];
      cad2 = cad1 + cad2;
      tres++
      if((tres%3) == 0){
        if(k!=0){
          cad2 = "," + cad2;
          }
        }
      }
      
    for (dd = dec; dd > 0; dd--)  
    {
      cad3 += nums[nums.length-dd]; 
    }

    if(decimals == true)
    {
      if(cad2!=''){
        cad2 += "." + cad3;
        
      }else{
        cad2 += cad3;
      }
    }
    document.getElementById(where).value = cad2;
  }
} 

function format(val_data)
{
  var character = val_data.charAt(val_data.length-1);
  var decimals = true;
  dec = 2;

  pat = /[\*,.\+,.\(,.\),.\?,.\\,.\$,.\[,.\],.\^]/
  largo = val_data.length;
  crtr = true;
  if(isNaN(character) || pat.test(character) == true)
  { 
    if (pat.test(character)==true) 
    {
      character = "\\" + character;
    }
    carcter = new RegExp(character,"g");
    val_data = val_data.replace(carcter,"");
    //document.getElementById(where).value = val_data;
    crtr = false;
  }
  else
  {
    var nums = new Array()
    cont = 0
    for(m=0;m<largo;m++)
    {
      if(val_data.charAt(m) == "." || val_data.charAt(m) == " " || val_data.charAt(m) == ",")
      {
        continue;  
      }
      else{
        nums[cont] = val_data.charAt(m)
        cont++
      }
      
    }
  }

  if(decimals == true) {
    ctdd = eval(1 + dec);
    nmrs = 1
  }
  else {
    ctdd = 1; nmrs = 3
  }

  var cad1="",cad2="",cad3="",tres=0
  if(largo > nmrs && crtr == true)
  {
    for (k=nums.length-ctdd;k>=0;k--){
      cad1 = nums[k];
      cad2 = cad1 + cad2;
      tres++
      if((tres%3) == 0){
        if(k!=0){
          cad2 = "," + cad2;
          }
        }
      }
      
    for (dd = dec; dd > 0; dd--)  
    {
      cad3 += nums[nums.length-dd]; 
    }

    if(decimals == true)
    {
      if(cad2!=''){
        cad2 += "." + cad3;
        
      }else{
        cad2 += cad3;
      }
    }
    val_data = cad2;
  }
  return val_data;
  //document.getElementById(where).focus();
}
