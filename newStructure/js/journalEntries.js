$(document).ready(function(){ 

  clearForm();
  type();

  $('#journalList').DataTable( {
      "paging": false
  } );

  var puerto_host = $('#puerto_host').val();

  $('.myDatepicker').datepicker({
      format: 'mm/dd/yyyy',
      autoclose: true
  });


  /*$('#bs-prod').on('keyup',function(){
    var dato = $('#bs-prod').val();
    var url = '../../../controlador/c_clientes/busca_clientes.php';
    $.ajax({
      type:'POST',
      url:url,
      data:'dato='+dato,
      success: function(datos){
        $('#agrega-registros').html(datos);
      }
    });
    return false;
  });*/

  $('#busca_journal').blur(function(){

    var puerto_host = $('#puerto_host').val();
    $.ajax({
      type:"POST",
      data:"idpro=" + $('#busca_journal').val(),
      url:puerto_host+"/index.php?mostrar=accounts&opcion=searchJournal",
      success:function(r){
        var dato = JSON.parse(r);
        $('#_references').val(dato.tipo_asi);
        $('#_memo').val(dato.concepto);
      }
    });
  });

  $('#_seleccion').change(function(){
    type();
  });

  $("#_memo").keyup(function () {
    var value = $(this).val();
    $(".memo").val(value);
  });

});

function runTable(numInput){

  var sum = 0;
  var tableReg = document.getElementById('journal');
  var myBodyElements = tableReg.getElementsByTagName("tr");
  for (i = 1; i < myBodyElements.length; i++) {
    var inputs = myBodyElements[i].getElementsByTagName("input");
    sum = sum + parseFloat(inputs[numInput].value);
  }

  return sum;
}

function updateBalance(s1,s2){

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
    $('#save').removeClass('disabled');
    $('#save').removeAttr('disabled');
  }else{
    $('#save').addClass('disabled');
    $('#save').attr('disabled');
  }
}

function credit(f){

  var debit = parseFloat($("#el_debit"+f).val());
  var tdebit = parseFloat($('#tdebit').html())-debit;
  $('#tdebit').html(tdebit);

  var v = runTable(6);
  $('#tcredit').html(v);

  var s1 = parseFloat($('#tdebit').html());
  var s2 = parseFloat($('#tcredit').html());

  updateBalance(s1,s2);
  $("#el_debit"+f).val('0.00');
}

function debit(f){

  var credit = parseFloat($("#el_credit"+f).val());
  var tcredit = parseFloat($('#tcredit').html())-credit;
  $('#tcredit').html(tcredit);

  var v = runTable(5);
  $('#tdebit').html(v);

  var s1 = parseFloat($('#tdebit').html());
  var s2 = parseFloat($('#tcredit').html());

  updateBalance(s1,s2);
  $("#el_credit"+f).val('0.00');
}

function autocompleteRow(f){

  $( "#_accountycode"+f ).autocomplete({
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
      $('#_accountyname'+f).val(ui.item.label.replace(ui.item.value+' - ', ''));
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

function type(){
  var puerto_host = $('#puerto_host').val();
  var sel = $('#_seleccion').val();
  $.ajax({
    type:"POST",
    data:{type:sel},
    url:puerto_host+"/index.php?mostrar=accounts&opcion=searchType",
    success:function(r){
      var dato = JSON.parse(r);
      $('#_actual').val(dato.number);
      $('.type').val(sel);     
    }
  });
}

function reverseInput(id){

  var temp = $('#el_debit'+id).val();
  $('#el_debit'+id).val($('#el_credit'+id).val());
  $('#el_credit'+id).val(temp);

  var s1 = runTable(5);
  var s2 = runTable(6);

  $('#tdebit').html(s1);
  $('#tcredit').html(s2);

  updateBalance(s1,s2);
}

function insertRow(){
  
  var sel = $('#_seleccion').val();
  var _memo = $('#_memo').val();

  var numRow = parseInt($('#numRow').val(),10);
  var account = $('#_accountycode'+numRow).val();
  var name = $('#_accountyname'+numRow).val();
  var type = $('#el_type'+numRow).val();
  var memo = $('#el_memo'+numRow).val();

  var debit = parseFloat($('#el_debit'+numRow).val());
  var credit = parseFloat($('#el_credit'+numRow).val());

  var f = numRow+1;

  if(account != '' && name != '' && type != '' && memo != '' && (debit > parseFloat('0.00') || credit > parseFloat('0.00'))){
    var row = '<tr class="odd gradeX" id="num'+f+'">'+'\n';
      row += '<td>'+'\n';
          row += '<div class="input-group">'+'\n'; 
              row += '<input class="form-control control2" autocomplete="off" style="width: 140px; font-size: 12px" type="text" id="_accountycode'+f+'" name="_accountycode[]" onkeyup="autocompleteRow('+f+')" required />'+'\n';
              row += '<span class="input-group-btn">'+'\n'; 
                  row += '<button class="btn btn-default"  type="button" data-toggle="modal" data-target="#myModal" onclick="loadModal(\''+'_accountycode'+f+'\',\''+'_accountyname'+f+'\',false,true,true)" style="padding-bottom: 4px; padding-top: 5px;"><span style="padding-top: 1px; padding-bottom: 1px" class="glyphicon glyphicon-search"></span></button>'+'\n'; 
              row += '</span>'+'\n';
          row += '</div>'+'\n';
      row += '</td>'+'\n';
      row += '<td><input class="form-control control2" type="text" id="_accountyname'+f+'" name="_accountyname[]" autocomplete="off" required /></td>'+'\n';
      row += '<td><input class="form-control control2 type" type="text" id="el_type'+f+'" name="el_type[]" value="'+sel+'"/></td>'+'\n';
      row += '<td><input class="form-control control2" type="text" id="_references'+f+'" name="el_ref[]" /> </td>'+'\n';
      row += '<td><input class="form-control control2 memo" type="text"  id="el_memo'+f+'" name="el_memo[]"value="'+_memo+'" required /></td>'+'\n';
      row += '<td ><input class="form-control control2" type="text" id="el_debit'+f+'" name="el_debit[]" value="0.00" onkeyup="debit('+f+')" required/></td>'+'\n';
      row += '<td><input class="form-control control2" type="text" id="el_credit'+f+'" name="el_credit[]" value="0.00" onkeyup="credit('+f+')" required/></td>'+'\n';
      row += '<td colspan="2">'+'\n';
      row += '<button title="Reverse" data-toggle="tooltip" data-placement="bottom" type="button" id="reverse" name="reverse" onclick="reverseInput('+f+')" class="btn btn-default"><i class="fa fa-refresh"></i></button>'+'\n';
      row += '<button title="Delete" data-toggle="tooltip" data-placement="bottom" type="button" name="register" onclick="deleteRow('+f+')" class="btn btn-default"><i class="fa fa-trash"></i></button></td>'+'\n';
    row += '</tr>';
    $('#journal tr:last').after(row);
    $('#numRow').val(f);
  }else{
    Swal.fire({      
      html: 'You must fill in the fields',
      imageUrl: $('#puerto_host').val()+'/imagenes/wrong-04.png',
      imageWidth: 75,
      confirmButtonText: 'OK',
      animation: true
    }); 
  }
}

function deleteRow(f){

  var account = $('#_accountycode'+f).val();
  var name = $('#_accountyname'+f).val();
  var type = $('#el_type'+f).val();
  var memo = $('#el_memo'+f).val();
  var debit = $('#el_debit'+f).val();
  var credit = $('#el_credit'+f).val();
  var numRow = $('#numRow').val();

  if(numRow > 1){
    $('#num'+f).closest('tr').remove();
  }else{
    $('#_accountycode'+f).val('');
    $('#_accountyname'+f).val('');
    $('#_references'+f).val('');
    $('#el_memo'+f).val('');
    $('#el_debit'+f).val('0.00');
    $('#el_credit'+f).val('0.00')
  }
}


function validateHead(){

  if($('#_memo').val() != '' && $('#benef').val() != ''){
    return true;
  }else{
    return false;
  }
}

function validateRows(){

  var tableReg = document.getElementById('journal');
  var empty = false;
  var myBodyElements = tableReg.getElementsByTagName("tr");
  for (i = 1; i < myBodyElements.length; i++) {
    var inputs = myBodyElements[i].getElementsByTagName("input");
    for (var f = 0; f < inputs.length; f++) {
      if(f != 3){
        if(inputs[f].value == ''){
          empty = true;
          break;
        }
      }
    }
  }

  if(empty){
    return false;
  }else{
    return true;
  }
}

$('#save').on('click',function(e){

  if(!validateHead() && !validateRows()){
    Swal.fire({      
      html: 'fill in all required fields',
      imageUrl: $('#puerto_host').val()+'/imagenes/wrong-04.png',
      imageWidth: 75,
      confirmButtonText: 'OK',
      animation: true
    }); 
    e.preventDefault();
  }
});

function clearForm(){

  $('#el_debit1').val('0.00');
  $('#el_credit1').val('0.00');
  $('#el_memo1').val('');
  $('#_memo').val('');
  $('#benef option:selected').removeAttr('selected');
    //document.getElementById('benef').selectedIndex=0;
}