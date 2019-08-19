$(document).ready(pagination(1));

$(function(){

	$('#bs-prod').on('keyup',function(){

		var dato = $('#bs-prod').val();

		var url = '../../../controlador/c_company_system_admin/busca_system_admin.php';

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

	var url = '../../../controlador/c_company_users/b_users_show.php';

		$.ajax({

		type:'POST',

		url:url,

		data:'id='+id,

		success: function(valores){

				var datos = eval(valores);

				$('#pro').val('Edicion');

				$('#id-prod').val(id);

                $('#_username').val(datos[0]);

                $('#_password').val(datos[1]);

                $('#_nameusername').val(datos[2]);

                $('#_position').val(datos[3]);

                $('#_phone').val(datos[4]);

                $('#_email').val(datos[5]);

                $('#_initial').val(datos[6]);

                $('#_id_user').val(datos[7]);

			return false;

		}

	});

	return false;

}



function pagination(partida){

	var url = '../../../controlador/c_company_system_admin/paginarSystemAdmin.php';

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