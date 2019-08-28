$(document).ready(function() {
	$("#update").removeClass('disabled');
});

function clean1(campos){

  for (var i = 0; i < campos.length; i++) {
  	if(document.getElementById(campos[i]).type == 'select-one'){
		$('#'+campos[i]+' option:selected').removeAttr('selected');
		document.getElementById(campos[i]).selectedIndex=0;
	}else if(document.getElementById(campos[i]).type == 'checkbox'){
		document.getElementById(campos[i]).value=0;
		document.getElementById(campos[i]).checked = false;
	}else{
		document.getElementById(campos[i]).value = '';
	}
  }
}

if(document.getElementById('clean1')){
  $('#clean1').on('click', function(){

    if(!document.getElementById('create')){
      var campos = ['nombre','currency','int','com','desc','otro','reserved','otro2','ins','wire','clie','type','col','cap','con','table','ttable','factoring','po','abl','mark','lc','part','cm'];
    }else{
      var campos = ['product','nombre','currency','int','com','desc','otro','reserved','otro2','ins','wire','clie','type','col','cap','con','table','ttable','factoring','po','abl','mark','lc','part','cm'];
    }
    clean1(campos);
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