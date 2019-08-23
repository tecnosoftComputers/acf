$(document).ready(function(){ 

  $('.myDatepicker').datepicker({
      format: 'mm/dd/yyyy',
      autoclose: true
  });
  
  $('#typeseatfrom').change(function(){
  	var value = $(this).val();  	
  	//console.log(value);
    $("#typeseatto").val(value);
  });
});