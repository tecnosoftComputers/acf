$(document).ready(function(){ 

  //clearForm();
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
    console.log(inputs);
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

$("#debit").keyup(function () {
  var credit = parseFloat($("#credit").val());
  var tcredit = parseFloat($('#tcredit').html())-credit;
  $('#tcredit').html(tcredit);
  $("#credit").val('0.00');
});

$("#credit").keyup(function () {
  var debit = parseFloat($("#debit").val());
  var tdebit = parseFloat($('#tdebit').html())-debit;
  $('#tdebit').html(tdebit);
  $("#debit").val('0.00');
});

/*function credit(){

  var debit = parseFloat($("#debit").val());
  var tdebit = parseFloat($('#tdebit').html())-debit;
  $('#tdebit').html(tdebit);
  $("#debit").val('0.00');
}

function debit(){
  var credit = parseFloat($("#credit").val());
  var tcredit = parseFloat($('#tcredit').html())-credit;
  $('#tcredit').html(tcredit);
  $("#credit").val('0.00');
}*/
/*
$("#credit").keyup(function () {

});*/

function autocompleteRow(){

  $( "#_accountycode").autocomplete({
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
      $('#_accountyname').val(ui.item.label.replace(ui.item.value+' - ', ''));
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
      //$('#_actual').val(dato.number);
      $('#number').val(dato.name+' Nº '+dato.number);
      //$('.type').val(sel);     
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
  
  var numRow = parseInt($('#numRow').val(),10);
  console.log(numRow);
  var account = $('#code').val();
  var name = $('#name').val();
  var type = $('#type').val();
  var ref = $('#referencia').val();
  var memo = $('#description').val();
  var typeTrans = $('#trans').val();
  var debit = parseFloat($('#debit').val());
  var credit = parseFloat($('#credit').val());

  var f = numRow+1;

  if(numRow==0){
    $('#num0').closest('tr').remove();
  }

  if((account != '' && name != '' && memo != '' && (debit > parseFloat('0.00') || credit > parseFloat('0.00'))) /*|| (numRow==0)*/){
    var row = '<tr class="odd gradeX" id="num'+f+'">'+'\n';
      row += '<td><input class="control2" autocomplete="off" style="font-size: 12px" type="text" id="_accountycode'+f+'" name="_accountycode[]" value="'+account+'" required disabled /></td>'+'\n';
      row += '<td><input class="control2" type="text" id="_accountyname'+f+'" name="_accountyname[]" value="'+name+'" autocomplete="off" required disabled /></td>'+'\n';
      row += '<td style="display:none"><input class=" control2 type" type="hidden" id="el_type'+f+'" name="el_type[]" value="'+type+'"/>'+'\n';
      row += '<input class="control2" type="hidden" id="_references'+f+'" name="el_ref[]" value="'+ref+'"/>'+'\n';
      row += '<input class="control2 memo" type="hidden"  id="el_memo'+f+'" name="el_memo[]"value="'+memo+'" /></td>'+'\n';
      row += '<td ><input class="control2" type="text" id="el_debit'+f+'" name="el_debit[]" value="'+$('#debit').val()+'" required disabled /></td>'+'\n';
      row += '<td><input class="control2" type="text" id="el_credit'+f+'" name="el_credit[]" value="'+$('#credit').val()+'" required disabled /></td>'+'\n';
      row += '<td colspan="2" style="text-align: center; background-color: #d9f2fa; padding-top:2px;">'+'\n';
      row += '<button title="Update" data-toggle="tooltip" data-placement="bottom" type="button" id="edit" name="reverse" class="btn btn-default btn-small-vertical"><i class="fa fa-edit"></i></button>'+'\n';
      row += '<button title="Reverse" data-toggle="tooltip" data-placement="bottom" type="button" id="reverse" name="reverse" onclick="reverseInput('+f+')" class="btn btn-default btn-small-vertical"><i class="fa fa-refresh"></i></button>'+'\n';
      row += '<button title="Delete" data-toggle="tooltip" data-placement="bottom" type="button" name="register" onclick="deleteRow('+f+')" class="btn btn-default btn-small-vertical"><i class="fa fa-trash"></i></button></td>'+'\n';
    row += '</tr>';
    $('#journal tr:last').after(row);


    $('#numRow').val(f);
    $('#myModalRow').modal('hide');
  }else{
    Swal.fire({      
      html: 'You must fill in the fields, account, name, debit, credit y memo',
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
  var numRow = document.getElementById("journal").rows.length-1;
  if(numRow > 1){
    $('#num'+f).closest('tr').remove();
  }else{
    $('#num'+f).closest('tr').remove();
    var row = '<tr id="num0"><td align="center" colspan="9" style="padding-top: 5px;padding-bottom: 5px;">Empty Journal</td></tr>';
    $('#journal tr:last').after(row);
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

$('#buttonCloseModal').on('click',function(e){
  clearModal();
});

$('#close').on('click',function(e){
  clearModal();
});

$('#open').on('click',function(e){
  clearModal();
  $('#myModalRow').modal('show');
});
/*
function clearForm(){

  $('#el_debit1').val('0.00');
  $('#el_credit1').val('0.00');
  $('#el_memo1').val('');
  $('#_memo').val('');
  //$('#benef option:selected').removeAttr('selected');
  document.getElementById('benef').selectedIndex=0;
}*/

function clearModal(){

  $('#debit').val('0.00');
  $('#credit').val('0.00');
  $('#description').val($('#_memo').val());
  $('#_accountyname').val('');
  $('#_accountycode').val('');
  $('#type').val('');
  $('#referencia').val('');
  $('#trans option:selected').removeAttr('selected');
  document.getElementById('trans').selectedIndex=0;
}

$('#btn_save').on('click',function(){
  insertRow();
});

