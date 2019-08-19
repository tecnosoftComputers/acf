//$(document).ready(pagination(1));
$(function(){

	$('#bs-prod').on('keyup',function(){
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
	});
});

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

function paramTwo(id){
	$('#formulario');
	var url = '../../../controlador/c_files/parameter_show.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#pro').val('Edicion');
				$('#_pasivo').val(datos[0]);
			return false;
		}
	});
	return false;
}

function paramRd(id){
	$('#formulario');
	var url = '../../../controlador/c_files/parameter_show.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#pro').val('Edicion');
				$('#_rd').val(datos[0]);
			return false;
		}
	});
	return false;
}

function param_capital(id){
	$('#formulario');
	var url = '../../../controlador/c_files/parameter_show.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#pro').val('Edicion');
				$('#_capital').val(datos[0]);
			return false;
		}
	});
	return false;
}


function param_ingresos(id){
	$('#formulario');
	var url = '../../../controlador/c_files/parameter_show.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#pro').val('Edicion');
				$('#_ingresos').val(datos[0]);
			return false;
		}
	});
	return false;
}

function param_egresos(id){
	$('#formulario');
	var url = '../../../controlador/c_files/parameter_show.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#pro').val('Edicion');
				$('#_egresos').val(datos[0]);
			return false;
		}
	});
	return false;
}

function param_orden_activo(id){
	$('#formulario');
	var url = '../../../controlador/c_files/parameter_show.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#pro').val('Edicion');
				$('#_orden_activo').val(datos[0]);
			return false;
		}
	});
	return false;
}
function param_orden_pasivo(id){
	$('#formulario');
	var url = '../../../controlador/c_files/parameter_show.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#pro').val('Edicion');
				$('#_orden_pasivo').val(datos[0]);
			return false;
		}
	});
	return false;
}

function param_ra(id){
	$('#formulario');
	var url = '../../../controlador/c_files/parameter_show.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#pro').val('Edicion');
				$('#_ra').val(datos[0]);
			return false;
		}
	});
	return false;
}

function param_ad(id){
	$('#formulario');
	var url = '../../../controlador/c_files/parameter_show.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#pro').val('Edicion');
				$('#_ad').val(datos[0]);
			return false;
		}
	});
	return false;
}

function param_aa(id){
	$('#formulario');
	var url = '../../../controlador/c_files/parameter_show.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#pro').val('Edicion');
				$('#_aa').val(datos[0]);
			return false;
		}
	});
	return false;
}

function param_md(id){
	$('#formulario');
	var url = '../../../controlador/c_files/parameter_show.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#pro').val('Edicion');
				$('#_md').val(datos[0]);
			return false;
		}
	});
	return false;
}

function param_ma(id){
	$('#formulario');
	var url = '../../../controlador/c_files/parameter_show.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#pro').val('Edicion');
				$('#_ma').val(datos[0]);
			return false;
		}
	});
	return false;
}

function param_mp(id){
	$('#formulario');
	var url = '../../../controlador/c_files/parameter_show.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#pro').val('Edicion');
				$('#_mp').val(datos[0]);
			return false;
		}
	});
	return false;
}
