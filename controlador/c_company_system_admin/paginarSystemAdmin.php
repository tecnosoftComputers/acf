<?php
    require_once ("../../datos/db/connect.php");
	$paginaActual = $_POST['partida'];
        
    $empresa = 1;
    
    /*
        La primera consulta es para contar todos los datos de la tabla y dividirlos, y asi realizar una serie de paginas de paginador
    */
    $nroProductos = DBSTART::abrirDB()->prepare("select * from usuarios u 
                                                inner join empresa e on u.id_empresa = e.id_empresa
                                                inner join bitacora_pass b on b.id_user = u.id_usuario
                                                    where u.id_empresa = 1 and u.estado = 'A'");
    $nroProductos->execute();
    $ncantidad = $nroProductos->rowCount();
    $nroLotes = 10;
    $nroPaginas = ceil($ncantidad/$nroLotes);
    $lista = '';
    $tabla = '';

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';
    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}

    /* Esta segunda consulta, muestra los datos segun la primera lista asignada del paginador*/
  	$registro = DBSTART::abrirDB()->prepare("select * from usuarios u 
                                                inner join empresa e on u.id_empresa = e.id_empresa
                                                inner join bitacora_pass b on b.id_user = u.id_usuario
                                                    where u.id_empresa = 1 and u.estado = 'A' LIMIT $limit, $nroLotes ");
    $registro->execute();
    $all = $registro->fetchAll(PDO::FETCH_ASSOC);    
    
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover">
			            <tr>
                          <th>Key</th>
                          <th>User Name</th>
                          <th>Short Name</th>
                          <th colspan="2">Opciones</th>
			            </tr>';
	foreach($all as $registro2){
		$tabla = $tabla.'<tr>
            		      <td>'.$registro2['pss'].'</td>
                          <td>'.$registro2['username'].'</td>
                          <td>'.$registro2['namesurname'].'</td>
               <td data-toggle="modal" data-target="#myModa"> <a href="javascript:editarProducto('.$registro2['id_usuario'].');"><i class="fa fa-edit"> Update</i></a></td>
              <td><a href="../app/company-users/users_delete.php?cid='.$registro2['id_usuario'].'"> <i class="fa fa-trash"> Delete</i></a></td>
						 </tr>';
	}

    $tabla = $tabla.'</table>';

    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>