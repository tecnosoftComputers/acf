$(document).ready(function(){ 
  
  $('#loading').modal('hide');    

  $('#register').on('click', function(){
    $('#loading').modal('show');
  });

  $("#formLedAcc").on("submit", function(){
    $('#loading').modal('show');
  })

  $('.myDatepicker').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
  });

  if($("#dateaccount").length){
    var currentDate =  new Date();
    var auxcurrentdate = "";
    if($("#dateaccount").val() != ""){
      auxcurrentdate = $("#dateaccount").val().split("/");
      currentDate = new Date(parseInt(auxcurrentdate[1]),(parseInt(auxcurrentdate[0])-1),1);
    }

    $('#dateaccount').datepicker({
        language: {
          months: ['January','February','March','April','May','June', 'July','August','September','October','November','December'],
          monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          today: 'Today',
          clear: 'Clear',
          dateFormat: 'mm/yyyy',
          // months: ['Enero','Febrero','Marzo','Abril','Mayo','Junio', 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
          // monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sept', 'Oct', 'Nov', 'Dic']
        },
        autoClose : true,
      }).data('datepicker').selectDate(new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDay()));
  }
 
  $('#typeseatfrom').change(function(){
  	var value = $(this).val();  	  	
    $("#typeseatto").val(value);
  });  

  $('#seatfrom').keyup(function (){
    this.value = (this.value + '').replace(/[^0-9]/g, '');
    $('#seatto').val(this.value);
  });

  $('#seatto').keyup(function (){
    this.value = (this.value + '').replace(/[^0-9]/g, '');
  });

  $('#accfrom').keyup(function (){
    this.value = (this.value + '').replace(/[^0-9]/g, '');    
  });

  $('#accto').keyup(function (){
    this.value = (this.value + '').replace(/[^0-9]/g, '');
  });

  $( "#accfrom" ).autocomplete({
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
      //$('#accto').val(ui.item.value);     
    },
    open: function() {
      $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
    },
    close: function() {
      $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
    }
  }); 

  $( "#accto" ).autocomplete({
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

  $('#optrecords').on('change', function(){
    $('#limit').val(this.value);
    $('#frmreport').submit();
  });  

  $('#clearJournal').on('click',function(){
    $('#seatfrom').val('');
    $('#seatto').val('');
    $("#typeseatfrom").prop('selectedIndex', 0);
    $("#typeseatto").prop('selectedIndex', 0);
  });

});