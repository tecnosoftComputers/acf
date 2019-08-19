$(document).ready(pagination(1));
$(function(){
	$('#bs-prod').on('keyup',function(){
		var dato = $('#bs-prod').val();
		var url = '../../../controlador/c_company/busca_company.php';
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

function editarProducto(id){
    
	$('#formulario')[0].reset();
	var url = '../../../controlador/c_company/b_company_show.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#pro').val('Edicion');
				$('#id-prod').val(id);
                $('#_nombres').val(datos[0]);
                $('#_ciudad').val(datos[1]);
                $('#_direccion').val(datos[2]);
                $('#_tel').val(datos[3]);
                $('#_fax').val(datos[4]);
			return false;
		}
	});
	return false;
}

function pagination(partida){
	var url = '../../../controlador/c_company/paginarCompany.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'partida='+partida,
		success:function(data){
			var array = eval(data);
			$('#agrega-registros').html(array[0]);
			$('#pagination').html(array[1]);
		}
	});
	return false;
}