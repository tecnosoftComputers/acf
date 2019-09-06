
  function soloNumeros(evt){
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
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
 
$('#viewTemplate').on('click',function(){
  var temp = $('#print').val();
  window.open('http://localhost/fernando/acf/templates/'+temp+'.pdf', '_blank');
});
