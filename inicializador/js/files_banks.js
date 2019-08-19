$(document).ready(pagination(1));
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

function param(id){
	$('#formulario');
	var url = '../../../controlador/c_files/param_banks.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				//$('#pro').val('Edicion');
				$('#_accountycode').val(datos[0]);
			return false;
		}
	});
	return false;
}

function param_edit_banks(id){
	$('#formulario');
	var url = '../../../../controlador/c_files/param_banks_edit.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				//$('#pro').val('Edicion');
				$('#_accountycode').val(datos[0]);
			return false;
		}
	});
	return false;
}