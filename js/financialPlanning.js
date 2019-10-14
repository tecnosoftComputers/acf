$(document).ready(function(){
	$('.numberValue,.numbervalue1').on('keypress', function(event){
		var regex = new RegExp("^[0-9.,]+$");
	    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	    if (!regex.test(key)) {
	       event.preventDefault();
	       return false;
	    }
		pointsMultiple($(this),2);
	});

	$('.numberValue').on('blur', function(){
		var parentLineTr = $(this).parent().parent();
		var allInLine = parentLineTr.find('.numberValue');
		var findTotalInput = parentLineTr.find('.resultValue');
		var totalVal = 0;
		$.each(allInLine, function(index, obj){
			if($(obj).val() != "" && $(obj).val() != null){	
				var auxsum = $(obj).val().replace(/\./g, '').replace(/\,/g, '.');
				// var text1 = "eder.eder.eder.eder.eder";
				// console.log(text1.replace(/\\./g, '-'));
				console.log("auxsum: "+ auxsum);
				totalVal += parseFloat(auxsum);
			}
		});
		findTotalInput.val(number_format(totalVal,3,',','.'));
		// sumToMajor(this);
	})

});


$('input').keyup(function(e){
	var keyCodes = {
	  'up':38,
	  'down':40,
	  'left':37,
	  'rigth':39
	};
	if(e.which==keyCodes.rigth)
	  $(this).closest('td').next().find('input').focus();
	else if(e.which==keyCodes.left)
	  $(this).closest('td').prev().find('input').focus();
	else if(e.which==keyCodes.down)
	             $(this).closest('tr').next().find('td:eq('+$(this).closest('td').index()+')').find('input').focus();
	else if(e.which==keyCodes.up)
	$(this).closest('tr').prev().find('td:eq('+$(this).closest('td').index()+')').find('input').focus();
});


function number_format (number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}




function sumToMajor(obj){
	// var parentTr = $(obj).closest('tr');
	// var prevParent = parentTr.prev().find('input');
	// var prevParentLength = prevParent.length;
	// var prevaux = prevParentLength;
	// var prevaux1 = 0;
	
	// while((prevParentLength == 1 || prevParentLength == 13) && prevParentLength <= prevaux){
	// 	if(prevParentLength == 1){
	// 		prevParent.val(parentTrVal);
	// 	}
	// 	parentTr = prevParent.closest('tr');
	// 	prevaux = parentTr.find('input').length;
	// 	prevParent = parentTr.prev().find('input');
	// 	prevParentLength = prevParent.length;
	// }

	var parentTr = $(obj).closest('tr');
	var idTr = parentTr.attr('id');
	var positionDat = idTr.indexOf(".");
	// console.log(positionDat);
	// console.log(idTr.substr(0,(positionDat+1)));
	var extractId = idTr.substr(0,(positionDat+1));
	var allIndexBlurOff = $('tbody').find('tr[id^="'+extractId+'"]');
	// console.log(allIndexBlurOff);
	// $.each(allIndexBlurOff, function(index, obj){
	// 	console.log(obj);
	// });
	var varacum = 0;
	var obtainTr = 0;
	for (var i = allIndexBlurOff.length - 1; i >= 0; i--) {
		var endWith = $(allIndexBlurOff[i]).attr('id').substr(-1,1);
		obtainTr = $(allIndexBlurOff[i]).closest('tr').find('.resultValue');
		console.log(obtainTr.val());
		if(endWith != '.' && obtainTr.val() != ""){
			varacum += parseFloat(obtainTr.val());
		}
		if(endWith == '.'){
			
			obtainTr.val(varacum);
		}
	}

}

if($('#yearFinancial').length){
	// var yearFinancial = "";
	var yearfinancial = $('#yearFinancial').val();
	// console.log(yearFinancial);
	$('#yearFinancial').change(function(){
		if($('#yearfinan').length){
			$('#yearfinan').val($(this).val());
			yearfinancial = $(this).val();
		}
	});

	if($('#searchButton').length){
		$('#searchButton').on('click', function(){
			if($('#searchyearForm').length){
				// console.log(yearfinancial);
				if(!validateyear(yearfinancial)){
					console.log("eder");
				}
				else{
					$('#searchyearForm').submit();
				}
			}
		})
	}
}

function validateyear(year){
	var regex = /[0-9]{4,4}$/;
	if(!regex.test(year) || year < '1901' || year > '2100'){
		return false;
	}
	else{
		return true;
	}
}

$('#accfrom').on('keyup', function(){
	// console.log("eder");
	if($(this).val() == ""){
		hiddeShowTr($(this).val());
	}
	

})


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
      // $('#accto').val(ui.item.value); 
      console.log(ui.item.value);
      hiddeShowTr(ui.item.value);
    },
    open: function() {
      $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
            // console.log("eder");
    },
    close: function() {
      $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
      // console.log("----------------" + ui.item.value);
    }
  });

function hiddeShowTr(id){
	var allTr = $('table').find('tr');
	if(id != ""){
		$.each(allTr, function(index, obj){
			if(obj.hasAttribute('id')){
				if(id != ""){
					var idObj = $(obj).attr('id').replace(/\./g, '').trim();
					// console.log(id + "-----" + idObj);
					if(id != idObj){
						$(obj).css('display', 'none');
					}
					else{
						$(obj).css('display', '');
					}
				}
			}
		});
	}
	else{
		$.each(allTr, function(index, obj){
			$(obj).css('display', '');
		})
	}
}