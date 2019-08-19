function loadModal(name_field,permission1,permission2){

	var field_name = '#'+name_field;
	$('#field_name').val(field_name);
	var url = '../../../controlador/c_files/checkAccount.php';
		$.ajax({
		type:'POST',
		url:url,
		success: function(valores){

		 	var datos = JSON.parse(valores);
		 	var html = '';
			for (var clave in datos){

		  		if (datos.hasOwnProperty(clave)) {

		  			var cod = datos[clave].CODIGO;
		  			var name = datos[clave].NOMBRE;
		  			var cod_aux = datos[clave].CODIGO_AUX;

		  			newvar = cod.substring(cod.length - 1, cod.length);

		  			html += '<tr class="odd gradeX" data-toggle="collapse" data-target="#demo'+cod_aux+'" class="accordion-toggle">';

		  			if(newvar == '.'){
		  				html += '<td><strong>'+cod+'</strong></td>';
            			html += '<td><strong>'+name+'</strong></td>';
            		}else{
            			html += '<td style="padding-left:30px;">'+cod+'</td>';
            			html += '<td>'+name+'</td>';
            		}

            		if((newvar == '.' && permission1 && !permission2) || (newvar != '.' && !permission1 && permission2) || (permission1 && permission2)){
            			html += '<td width=40 data-toggle="modal" data-target="#myModal"> <a href="javascript:editarProducto(\''+cod+'\');"><span class="badge" style="background-color:#1e6cb6; width:120px"><i class="fa fa-check"> Select</i></span></a></td>';
            		}else{
						html += '<td width=40><a title="Error, no puede seleccionar una cuenta mayor" class="unselectable" href="#"><span class="badge" style="background-color:#1e6cb6; width:120px"><i class="fa fa-check"> Select</i></span></td>';
            		}
            		
    				html += '</tr>';
		  		}
			}

			$('#contentBody').html(html);
			if ( !$.fn.dataTable.isDataTable( '#accounts' ) ) {
				$('#accounts').DataTable({
			        "paging":         false,
			    });
			}
			 
			if($(field_name).val() != ''){
				var busqueda = $(field_name).val();
			}else{
				var busqueda = '';
			}
			var table = $('#accounts').DataTable();
			table.search($(field_name).val()).draw();
		}
	});

}

function editarProducto(id){

	$('#formulario');
	var url = '../../../controlador/c_files/parameter_show.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){

			var datos = eval(valores);
			var field_name = $('#field_name').val();
			$(field_name).val(datos[0]);
			return false;
		}
	});
	return false;
}

// SEGUNDO SIN CUENTA MAYOR

function loadModalMayor(name_field,permission1,permission2){

	var field_name = '#'+name_field;
	$('#field_name').val(field_name);
	var url = '../../../../controlador/c_files/checkAccount.php';
		$.ajax({
		type:'POST',
		url:url,
		success: function(valores){

		 	var datos = JSON.parse(valores);
		 	var html = '';
			for (var clave in datos){

		  		if (datos.hasOwnProperty(clave)) {

		  			var cod = datos[clave].CODIGO;
		  			var name = datos[clave].NOMBRE;
		  			var cod_aux = datos[clave].CODIGO_AUX;

		  			newvar = cod.substring(cod.length - 1, cod.length);

		  			html += '<tr class="odd gradeX" data-toggle="collapse" data-target="#demo'+cod_aux+'" class="accordion-toggle">';

		  			if(newvar == '.'){
		  				html += '<td><strong>'+cod+'</strong></td>';
            			html += '<td><strong>'+name+'</strong></td>';
            		}else{
            			html += '<td style="padding-left:30px;">'+cod+'</td>';
            			html += '<td>'+name+'</td>';
            		}

            		if((newvar == '.' && permission1 && !permission2) || (newvar != '.' && !permission1 && permission2) || (permission1 && permission2)){
            			html += '<td width=40 data-toggle="modal" data-target="#myModal"> <a href="javascript:sinMayor(\''+cod+'\');"><span class="badge" style="background-color:#1e6cb6; width:120px"><i class="fa fa-check"> Select</i></span></a></td>';
            		}else{
						html += '<td width=40><a title="Error, no puede seleccionar una cuenta mayor" class="unselectable" href="#"><span class="badge" style="background-color:#1e6cb6; width:120px"><i class="fa fa-check"> Select</i></span></td>';
            		}
            		
    				html += '</tr>';
		  		}
			}

			$('#contentBody').html(html);
			if ( !$.fn.dataTable.isDataTable( '#accounts' ) ) {
				$('#accounts').DataTable({
			        "paging":         false,
			    });
			}
			 
			if($(field_name).val() != ''){
				var busqueda = $(field_name).val();
			}else{
				var busqueda = '';
			}
			var table = $('#accounts').DataTable();
			table.search($(field_name).val()).draw();
		}
	});

}

function sinMayor(id){

	$('#formulario');
	var url = '../../../../controlador/c_files/parameter_show.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){

			var datos = eval(valores);
			var field_name = $('#field_name').val();
			$(field_name).val(datos[0]);
			return false;
		}
	});
	return false;
}