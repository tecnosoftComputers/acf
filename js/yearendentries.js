$(document).ready(function(){
	// viewMessage("Once the exercise closing process has been executed, it is not possible to execute any changes to the movements. To do this you must repeat the process of closing the year.");


  $('.myDatepicker').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
  });

var dateGet = "";
var closingseatdetail = "";
var seatnumber = "";

if($("#closingseatdetail").length){
	closingseatdetail = $("#closingseatdetail");
}

if($("#seatnumber").length){
	seatnumber = $("#seatnumber");
}

if($("#closingdate").length){
	var getYear = "";
	dateGet = $("#closingdate").val();
	if(dateGet != "" && dateGet != null){
		// alert("eder");
		getYear = dateGet.split("/");
		if(closingseatdetail != null && closingseatdetail != ""){
			closingseatdetail.val("Year-end accounting period (" + getYear[2] + ")");
		}
		if(seatnumber != null && seatnumber != ""){
			seatnumber.val("00"+getYear[2]+getYear[0]);
		}
	}

	$("#closingdate").on("change", function(){
		dateGet = $(this).val();
		getYear = dateGet.split("/");
		if(closingseatdetail != null && closingseatdetail != ""){
			closingseatdetail.val("Year-end accounting period (" + getYear[2] + ")");
		}
		if(seatnumber != null && seatnumber != ""){
			seatnumber.val("00"+getYear[2]+getYear[0]);
		}
	});
}

if(closingseatdetail != null && closingseatdetail != ""){
	closingseatdetail.on("keypress",function(event){
		event.preventDefault();
	});

	closingseatdetail.on("keyup",function(){
		// event.preventDefault();
		dateGet = $("#closingdate").val();
		getYear = dateGet.split("/");
		$(this).val("Year-end accounting period " + getYear[2]);
	});
}

if($("#update").length){
	$("#update").on("click", function(){
		var dateForm = $("#closingdate").val();
		$("#update").on("click", function(){
			$.ajax({
	        url: $('#puerto_host').val()+"/index.php?mostrar=procyearendentries&action=getCabtra&date="+dateForm,
	        dataType: "json",
	        type: "GET",
	        success: function( data ) {
	          if(data.returnData == 1){
	          	$("#yearendentriesModal").modal("show");
	          }
	          else{
	          	var formYearendentries = $("#formYearEndEntries");
				formYearendentries.submit();
	          }
	        }
	      });
		})
	})
}

if($("#modalSubmit").length){
	$("#modalSubmit").on("click", function(){
		var formYearendentries = $("#formYearEndEntries");
		formYearendentries.submit();
	});
}

});
