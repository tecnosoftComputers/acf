$(document).ready(function(){ 
  
  $('#loading').modal('hide');    

  $('#register').on('click', function(){
    $('#loading').modal('show');
  });

  $('.myDatepicker').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
  });
 
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

});