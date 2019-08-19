<?php

    require_once ("../../datos/db/connect.php");
	$paginaActual = $_POST['partida'];
    
    
    $empresa = 1;
    

    /*
        La primera consulta es para contar todos los datos de la tabla y dividirlos, y asi realizar una serie de paginas de paginador
    */
    $nroProductos = DBSTART::abrirDB()->prepare("select * from c_proveedor e inner join c_empresa p on e.id_empresa = p.id_empresa where e.id_empresa = '$empresa' and e.estado = 'A'");
    $nroProductos->execute();
    $ncantidad = $nroProductos->rowCount();
    $nroLotes = 20;
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
  	$registro = DBSTART::abrirDB()->prepare("select * from c_empresa where  est_empresa = 'A' ORDER BY id_empresa DESC  LIMIT $limit, $nroLotes ");
    $registro->execute();
    $all = $registro->fetchAll(PDO::FETCH_ASSOC);
    
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover">
			            <tr>
                          <th>Ruc</th>
                          <th>Nombres</th>
                          <th>Teléfono</th>
                          <th>Correo</th>
                          <th colspan="3">Opciones</th>
			            </tr>';
				
	foreach($all as $registro2){
		$tabla = $tabla.'<tr>
            		      <td>'.$registro2['ruc_empresa'].'</td>
                          <td>'.$registro2['nom_empresa'].'</td>
                          <td>'.$registro2['telf_empresa'].'</td>
                          <td>'.$registro2['mail_empresa'].'</td>
              
		        <td><a onchange="ActDesactCampotipoFiltro();" href="../app/empresa/frm_empresa_act.php?cid='.$registro2['id_empresa'].'" <i class="fa fa-edit"></i></a></td>
                <td><a href="../app/empresa/frm_empresa_eli.php?cid='.$registro2['id_empresa'].'" ><i class="fa fa-trash"></i></a></td>
               <td> <a href="javascript:editarProducto('.$registro2['id_empresa'].');"><i class="fa fa-eye"></i></a></td>
						  </tr>';		
	}        

    $tabla = $tabla.'</table>';

    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
    
  
?>