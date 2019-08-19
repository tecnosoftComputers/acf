<?php

/*
    Se busca desde la base del paginador, la misma estructura, encuentra los datos escritos
*/
require_once ("../../datos/db/connect.php");

$dato = $_POST['dato'];
//$empresa = $_SESSION['id_empresa'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = DBSTART::abrirDB()->prepare("select * from usuarios u 
                                                inner join empresa e on u.id_empresa = e.id_empresa
                                                inner join bitacora_pass b on b.id_user = u.id_usuario
                                                    where
                                                        u.namesurname LIKE '%$dato%' AND u.id_empresa = 1 AND u.estado = 'A'
                                                    OR
                                                        u.username LIKE '%$dato%' AND u.id_empresa = 1 AND u.estado = 'A'
                                                    ORDER BY u.id_usuario ASC");
$registro->execute();
$all = $registro->fetchAll(PDO::FETCH_ASSOC);
$cant = $registro->rowCount();
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
                <th>Key</th>
            	<th>Username</th>
                <th>Short Name</th>
                <th colspan="2">Opciones</th>
            </tr>';
if( $cant > 0){
	foreach( (array) $all as $registro2 ){
		echo '<tr>
                    <td>'.$registro2['pss'].'</td>
                    <td>'.$registro2['username'].'</td>
                    <td>'.$registro2['namesurname'].'</td>
               <td data-toggle="modal" data-target="#myModa"> <a href="javascript:editarProducto('.$registro2['id_usuario'].');"><i class="fa fa-edit"> Update</i></a></td>
              <td><a href="../app/company-users/users_delete.php?cid='.$registro2['id_usuario'].'"> <i class="fa fa-trash"> Delete</i></a></td>
						 </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>