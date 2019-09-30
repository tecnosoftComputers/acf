<?php
class Modelo_Dpmovimi{

  public static function search(){
	$sql = "SELECT * FROM dpmovimi";
	return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }

  public static function searchCompanyMovimiByAcc($empresa,$detailAcc){
  $sql = "SELECT dpm.ID_EMPRESA,dpm.CODMOV,dpm.TIPO_ASI,dpm.IDCONT FROM dpmovimi dpm WHERE dpm.ID_EMPRESA = $empresa AND TRIM(dpm.CODMOV) = '$detailAcc'";
  return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }

  public static function changeMovimiUpd($empresa,$prevaccount,$newaccount){
    if(empty($empresa) || empty($prevaccount) || empty($newaccount)){return false;}
    $sql = "UPDATE dpmovimi set CODMOV = '$newaccount' WHERE ID_EMPRESA = $empresa AND CODMOV = '$prevaccount'";
    return $GLOBALS['db']->execute($sql);
  }

  public static function searchMinSeat(){
	 $sql = "SELECT MIN(ASIENTO) AS minimo FROM dpmovimi";
	 return $rs = $GLOBALS['db']->auto_array($sql,array(),false);
  }

  public static function searchMovimi($type=false,$id){		
	$sql = "SELECT c.CODMOV, c.REFER, c.GRUPOCON, c.TIPO, FORMAT(c.CR, 2) AS CR,FORMAT(c.DB, 2) AS DB,d.NOMBRE, d.CODIGO_AUX, c.CONCEPTO, c.IMPORTE, c.DOCUMENTO, c.LIQUIDA_NO, FORMAT(ABS(IMPORTE),2) as importe_format FROM dpmovimi c LEFT JOIN dp01a110 d ON c.CODMOV = d.CODIGO WHERE ";		
	if($type != false){
		$id = str_pad($id,8, "0", STR_PAD_LEFT);
		if($id != '00000000'){
			$sql .= "TIPO_ASI = '$type'";
		}else{
			$sql .= "ASIENTO = '$id' AND TIPO_ASI = '$type'";
		}	      	
    }else{
      	$sql .= "IDCONT = '$id'";
    }
    $sql .= ' ORDER BY c.ASIENTO';
	return $rs = $GLOBALS['db']->auto_array($sql,array(),true);
  }

  public static function deleteMovimi($id){
    if(empty($id)){return false;}
    return $GLOBALS['db']->delete('dpmovimi',"IDCONT ='$id'");
  }

  public static function insert($datos){
    if(count($datos)==0){return false;}
    return $result = $GLOBALS['db']->insert('dpmovimi',$datos);
  }

  public static function report($empresa,$datefrom,$dateto,$typeseat='',$seatfrom='',$seatto='',
		                        $accfrom='',$accto='',$orderby=array()){
	if (empty($empresa) || empty($datefrom) || empty($dateto)){ return false; }       
	$sql = "SELECT c.FECHA_ASI, c.DESC_ASI, c.ASIENTO, m.CODMOV, a.NOMBRE, m.IDCONT,
	               m.CONCEPTO, m.IMPORTE, m.TIPO, m.REFER, m.LIQUIDA_NO, m.TIPO_ASI,
	               c.LIQUIDA_NO AS cabliquida	    
			FROM dpmovimi m 
			INNER JOIN dpcabtra c ON m.TIPO_ASI = c.TIPO_ASI AND m.ASIENTO = c.ASIENTO  
			INNER JOIN dp01a110 a ON a.CODIGO = m.CODMOV 
			WHERE c.ID_EMPRESA = ? AND m.ID_EMPRESA = ? AND 
			      (a.CTAINACTIVA IS NULL OR a.CTAINACTIVA = 0) AND 
			      c.FECHA_ASI BETWEEN ? AND ?";
	if (!empty($typeseat)){
	  $sql .= " AND m.TIPO_ASI = '".$typeseat."'";
	}		        
	if (!empty($seatfrom)){
	  $sql .= " AND c.ASIENTO >= '".$seatfrom."'";
	}		  
	if (!empty($seatto)){
	  $sql .= " AND c.ASIENTO <= '".$seatto."'";
	} 
	if (!empty($accfrom)){
	  $sql .= " AND m.CODMOV >= '".$accfrom."'";
	} 
	if (!empty($accto)){
	  $sql .= " AND (m.CODMOV <= '".$accto."' OR m.CODMOV LIKE '".$accto."%')";
	}
	if (!empty($orderby) && count($orderby)>0){
	  $sql .= " ORDER BY ";	
	  foreach($orderby as $order){
	  	$sql .= $order.", "; 	
	  }	  	
	  $sql = substr($sql, 0, -2);	  	
	}    				  
	return $GLOBALS['db']->auto_array($sql,array($empresa,$empresa,$datefrom,$dateto),true);
  }

  public static function reportLedger($empresa,$date,$account){
    if (empty($empresa) || empty($date) || empty($account)){ return false; }	
    $sql = "SELECT CODMOV, SUM(IMPORTE) AS balance FROM dpmovimi 
            WHERE ID_EMPRESA = ? AND FECHA_ASI < ? AND CODMOV = ?";	  
    return $GLOBALS['db']->auto_array($sql,array($empresa,$date,$account));	
  }

  public static function updateAnnul($id){
	return $GLOBALS['db']->execute("UPDATE dpmovimi SET IMPORTE_AN = IMPORTE, IMPORTE=0, DB=0, CR=0 WHERE IDCONT='$id'");
  }	

  public static function reportSummaryS($empresa,$datefrom,$dateto,$accfrom='',$accto=''){
	if (empty($empresa) || empty($datefrom) || empty($dateto)){ return false; }		  
	$sql = "SELECT temp.CODMOV, c.NOMBRE, SUM(temp.debit) AS debit, SUM(temp.credit) AS credit
			FROM dp01a110 c
			INNER JOIN 
				(SELECT CODMOV, TIPO_ASI, 
				        IF(IMPORTE>0,IMPORTE,0) AS debit, 
				        IF(IMPORTE<0,IMPORTE,0) AS credit
				FROM dpmovimi  
				WHERE ID_EMPRESA = '".$empresa."' AND 
				      FECHA_ASI BETWEEN '".$datefrom."' AND '".$dateto."') AS temp
			ON c.CODIGO = temp.CODMOV 
			WHERE (c.CTAINACTIVA IS NULL OR c.CTAINACTIVA = 0)";
    if (!empty($accfrom)){
      $sql .= " AND temp.CODMOV >= '".$accfrom."'";
    }
    if (!empty($accto)){
      $sql .= " AND (temp.CODMOV <= '".$accto."' OR temp.CODMOV LIKE '".$accto."%')";
    }
	$sql .= " GROUP BY temp.CODMOV ORDER BY temp.CODMOV";
	return $GLOBALS['db']->auto_array($sql,array(),true);
  }

  public static function reportSummaryD($empresa,$datefrom,$dateto,$accfrom='',$accto=''){
	if (empty($empresa) || empty($datefrom) || empty($dateto)){ return false; }	
	  $sql = "SELECT temp.CODMOV, c.NOMBRE, temp.TIPO_ASI, t.NOMBRE AS nameseat, 
	                 SUM(temp.debit) AS debit, SUM(temp.credit) AS credit
			  FROM dp01a110 c
			  INNER JOIN 
			   (SELECT CODMOV, TIPO_ASI, 
			           IF(IMPORTE>0,IMPORTE,0) AS debit, 
			           IF(IMPORTE<0,IMPORTE,0) AS credit
				FROM dpmovimi m 
				WHERE ID_EMPRESA = '".$empresa."' AND 
				      FECHA_ASI BETWEEN '".$datefrom."' AND '".$dateto."') AS temp
			  ON c.CODIGO = temp.CODMOV
			  INNER JOIN DPNUMERO t ON t.TIPO_ASI = temp.TIPO_ASI      
			  WHERE (c.CTAINACTIVA IS NULL OR c.CTAINACTIVA = 0) 	      ";
    if (!empty($accfrom)){
      $sql .= " AND temp.CODMOV >= '".$accfrom."'";
    }
    if (!empty($accto)){
      $sql .= " AND (temp.CODMOV <= '".$accto."' OR temp.CODMOV LIKE '".$accto."%')";
    }
	$sql .= " GROUP BY temp.CODMOV, temp.TIPO_ASI ORDER BY temp.CODMOV, temp.TIPO_ASI";
	return $GLOBALS['db']->auto_array($sql,array(),true);
  }

  public static function reportTrialBalance($empresa,$datefrom,$dateto,$accfrom='',$accto=''){
  	if (empty($empresa) || empty($datefrom) || empty($dateto)){ return false; }
  	$sql = "SELECT c.CODIGO, c.NOMBRE, balance.balance, debits.debit, credits.credit
			FROM dp01a110 c
			LEFT JOIN (
			  SELECT CODMOV, SUM(IMPORTE) AS balance
		      FROM dpmovimi 
			  WHERE ID_EMPRESA = '".$empresa."' AND FECHA_ASI < '".$datefrom."'
			  GROUP BY CODMOV) AS balance ON balance.CODMOV = c.CODIGO
			LEFT JOIN (
			  SELECT CODMOV, SUM(IMPORTE) AS debit
			  FROM dpmovimi 
			  WHERE ID_EMPRESA = '".$empresa."' AND IMPORTE > 0 AND 
			        FECHA_ASI BETWEEN '".$datefrom."' AND '".$dateto."'
			  GROUP BY CODMOV) AS debits ON debits.CODMOV = c.CODIGO
			LEFT JOIN (
			  SELECT CODMOV, SUM(IMPORTE) AS credit
			  FROM dpmovimi 
			  WHERE ID_EMPRESA = '".$empresa."' AND IMPORTE < 0 AND 
			        FECHA_ASI BETWEEN '".$datefrom."' AND '".$dateto."'
			  GROUP BY CODMOV) AS credits ON credits.CODMOV = c.CODIGO
			WHERE (c.CTAINACTIVA IS NULL OR c.CTAINACTIVA = 0)";
	if (!empty($accfrom)){
      $sql .= " AND c.CODIGO >= '".$accfrom."'";
    }
    if (!empty($accto)){
      $sql .= " AND (c.CODIGO <= '".$accto."' OR c.CODIGO LIKE '".$accto."%')";
    }
    $results = $GLOBALS['db']->auto_array($sql,array(),true);     
    if (!empty($results)){
      foreach($results as $key=>$value){
      	if (empty($value["balance"]) && empty($value["debit"]) && empty($value["credit"])){
      	  continue;	
      	}
      	else{
      	  $codigoaux = $value["CODIGO"];      	        	  
  	  	  $cod = substr($codigoaux,0,strrpos($codigoaux,"."));   	  	  
  	  	  while (!empty($cod)){   	  	   	  	    	  	  
            $keyparent = array_search($cod.".", array_column($results, 'CODIGO'));          
            $results[$keyparent]["balance"] = $results[$keyparent]["balance"] + $value["balance"];
            $results[$keyparent]["debit"] = $results[$keyparent]["debit"] + $value["debit"]; 
            $results[$keyparent]["credit"] = $results[$keyparent]["credit"] + $value["credit"];
            $cod = substr($cod,0,strrpos($cod,"."));
          }          
          $results[$keyparent]["parent"] = (empty($cod)) ? 1 : 0;          
      	}
      }      
      foreach($results as $key=>$value){
      	if (empty($value["balance"]) && empty($value["debit"]) && empty($value["credit"])){
      	  unset($results[$key]);
      	}
      }
    }
    return $results;
  }

  public static function reportIncomeA($empresa,$datefrom,$dateto,$accingresos=array(),
  	                                   $accegresos=array(),$level,$start=false,$limit=false){
  	if (empty($empresa) || empty($dateto) || empty($accingresos) || 
  		empty($accegresos) || empty($level)){ return false; }
  	$sql = "SELECT c.CODIGO, c.NOMBRE, ingresos.ingreso, egresos.egreso
			FROM dp01a110 c 
			LEFT JOIN 
			  (SELECT CODMOV, ID_EMPRESA, SUM(IMPORTE) AS ingreso
			   FROM dpmovimi 
			   WHERE FECHA_ASI <= '".$dateto."' AND (";
  	foreach($accingresos as $key=>$value){		   
  	  $sql .= " CODMOV LIKE '".$value."%' OR";
  	}
  	$sql = substr($sql,0,-2);
  	$sql .= ") AND ID_EMPRESA = ".$empresa." GROUP BY CODMOV) AS ingresos ON ingresos.CODMOV = c.CODIGO
  			LEFT JOIN
  			  (SELECT CODMOV, ID_EMPRESA, SUM(IMPORTE) AS egreso
  			   FROM dpmovimi 
  			   WHERE FECHA_ASI <='".$dateto."' AND (";
      foreach($accegresos as $key=>$value){
        $sql .= " CODMOV LIKE '".$value."%' OR";
      }
      $sql = substr($sql,0,-2);
  	$sql .= ") AND ID_EMPRESA = ".$empresa." GROUP BY CODMOV) AS egresos ON egresos.CODMOV = c.CODIGO
  			WHERE (c.CTAINACTIVA IS NULL OR c.CTAINACTIVA = 0) AND (";
      foreach($accingresos as $key=>$value){		   
  	  $sql .= " c.CODIGO LIKE '".$value."%' OR";
  	}	
  	foreach($accegresos as $key=>$value){		   
  	  $sql .= " c.CODIGO LIKE '".$value."%' OR";
  	}
  	$sql = substr($sql,0,-2);
    $sql .= ") ORDER BY c.CODIGO, ingresos.ingreso, egresos.egreso";
    $results = $GLOBALS['db']->auto_array($sql,array(),true); 
    /*3 tipos de niveles
    3=> cuentas detalle
    2=> padres de la de detalle}
    1=> padres principales*/
    if (!empty($results)){
      foreach($results as $key=>$value){
      	if (empty($value["ingreso"]) && empty($value["egreso"])){
      	  continue;	
      	}
      	else{
      	  $codigoaux = $value["CODIGO"];
  	  	  $cod = substr($codigoaux,0,strrpos($codigoaux,".")); 
  	  	  $results[$key]["level"] = 3;
  	  	  //$contlevel = 0;
  	  	  while (!empty($cod)){   	  	   	  	  	  	  	  	   
            $keyparent = array_search($cod.".", array_column($results, 'CODIGO')); 
            $results[$keyparent]["level"] = 2;         
            $results[$keyparent]["ingreso"] = $results[$keyparent]["ingreso"] + $value["ingreso"];
            $results[$keyparent]["egreso"] = $results[$keyparent]["egreso"] + $value["egreso"];
            $cod = substr($cod,0,strrpos($cod,"."));            
            $results[$keyparent]["level"] = (empty($cod)) ? 1 : 2;
          }                    
      	}
      }
      //aqui volarselo el level dependiendo de lo que le llegue por parametro
      foreach($results as $key=>$value){
        if ($level == 1 && $value["level"] <> $level){
          unset($results[$key]);
        }
        elseif ($level == 2 && $value["level"] > $level){
          unset($results[$key]);
        }        
      	if (empty($value["ingreso"]) && empty($value["egreso"])){
      	  unset($results[$key]);
      	}

      }

      $arr['leveloneval'] = array();
      foreach ($results as $key => $value) {
        if ($value['level'] == 1){
          array_push($arr['leveloneval'], $results[$key]);
        }
      }
    }
    if(!empty($limit)){
      $reindexarray = array_values($results);
      $auxarr = array();
      foreach ($reindexarray as $key => $remove) {
        if(($key) >= $start && ($key) < ($limit + $start)){
          array_push($auxarr, $reindexarray[$key]);
        }
      }
      $arr['nrorecords'] = count($results);
      $arr['records'] = $auxarr;
      return $arr;
    } 
    else{
      return $results;
    }  
  } 

  public static function reportIncomeM($empresa,$datefrom,$dateto,$accingresos=array(),
                                       $accegresos=array(),$level,$start=false,$limit=false){
    if (empty($empresa) || empty($datefrom) || empty($dateto) || empty($accingresos) || 
      empty($accegresos) || empty($level)){ return false; }
    $sql = "SELECT c.CODIGO, c.NOMBRE, ingresos.ingreso, egresos.egreso
      FROM dp01a110 c 
      LEFT JOIN 
        (SELECT CODMOV, ID_EMPRESA, SUM(IMPORTE) AS ingreso
         FROM dpmovimi 
         WHERE ID_EMPRESA = ".$empresa." AND FECHA_ASI BETWEEN '".$datefrom."' AND '".$dateto."' AND (";
    foreach($accingresos as $key=>$value){       
      $sql .= " CODMOV LIKE '".$value."%' OR";
    }
    $sql = substr($sql,0,-2);
    $sql .= ") GROUP BY CODMOV) AS ingresos ON ingresos.CODMOV = c.CODIGO
        LEFT JOIN
          (SELECT CODMOV, SUM(IMPORTE) AS egreso
           FROM dpmovimi 
           WHERE ID_EMPRESA = ".$empresa." AND FECHA_ASI BETWEEN '".$datefrom."' AND '".$dateto."' AND (";
      foreach($accegresos as $key=>$value){
        $sql .= " CODMOV LIKE '".$value."%' OR";
      }
      $sql = substr($sql,0,-2);
    $sql .= ") GROUP BY CODMOV) AS egresos ON egresos.CODMOV = c.CODIGO
        WHERE (c.CTAINACTIVA IS NULL OR c.CTAINACTIVA = 0) AND (";
      foreach($accingresos as $key=>$value){       
      $sql .= " c.CODIGO LIKE '".$value."%' OR";
    } 
    foreach($accegresos as $key=>$value){      
      $sql .= " c.CODIGO LIKE '".$value."%' OR";
    }
    $sql = substr($sql,0,-2);
    $sql .= ") ORDER BY c.CODIGO, ingresos.ingreso, egresos.egreso";
    $results = $GLOBALS['db']->auto_array($sql,array(),true); 
    /*3 tipos de niveles
    3=> cuentas detalle
    2=> padres de la de detalle}
    1=> padres principales*/
    if (!empty($results)){
      foreach($results as $key=>$value){
        if (empty($value["ingreso"]) && empty($value["egreso"])){
          continue; 
        }
        else{
          $codigoaux = $value["CODIGO"];                    
          $cod = substr($codigoaux,0,strrpos($codigoaux,".")); 
          $results[$key]["level"] = 3;
          //$contlevel = 0;
          while (!empty($cod)){                                    
            $keyparent = array_search($cod.".", array_column($results, 'CODIGO')); 
            $results[$keyparent]["level"] = 2;         
            $results[$keyparent]["ingreso"] = $results[$keyparent]["ingreso"] + $value["ingreso"];
            $results[$keyparent]["egreso"] = $results[$keyparent]["egreso"] + $value["egreso"];
            $cod = substr($cod,0,strrpos($cod,"."));            
            $results[$keyparent]["level"] = (empty($cod)) ? 1 : 2;
          }                    
        }
      }      
      foreach($results as $key=>$value){
        if ($level == 1 && $value["level"] <> $level){
          unset($results[$key]);
        }
        elseif ($level == 2 && $value["level"] > $level){
          unset($results[$key]);
        }  
        if (empty($value["ingreso"]) && empty($value["egreso"])){
          unset($results[$key]);
        }
      }

      $arr['leveloneval'] = array();
      foreach ($results as $key => $value) {
        if ($value['level'] == 1){
          array_push($arr['leveloneval'], $results[$key]);
        }
      }
    }    
    if(!empty($limit)){
      $reindexarray = array_values($results);
        $auxarr = array();
        foreach ($reindexarray as $key => $remove) {
          if(($key) >= $start && ($key) < ($limit + $start)){
            array_push($auxarr, $reindexarray[$key]);
          }
        }
        $arr['nrorecords'] = count($results);
        $arr['records'] = $auxarr;
        return $arr; 
    } 
    else{
      return $results;
    }
  }

  public static function reportBalanceSheet($empresa,$datebalance,$activo=array(),
                                            $pasivo=array(),$capital=array(),
                                            $accacreedora=array(),$accdeudora=array(),
                                            $level=false,$start=false,$limit=false){
    $sql = "SELECT c.CODIGO, c.NOMBRE, activos.activo, pasivos.pasivo, capitales.capital
      FROM dp01a110 c 
      LEFT JOIN 
        (SELECT CODMOV, ID_EMPRESA, SUM(IMPORTE) AS activo
         FROM dpmovimi 
         WHERE FECHA_ASI <= '".$datebalance."' AND (";
         foreach($activo as $key=>$value){
            $sql .= " CODMOV LIKE '".$value."%' OR";
          }
          $sql = substr($sql,0,-2);
         $sql .= ") AND ID_EMPRESA = ".$empresa." GROUP BY CODMOV) AS activos ON activos.CODMOV = c.CODIGO
        LEFT JOIN
          (SELECT CODMOV, ID_EMPRESA, SUM(IMPORTE) AS pasivo
           FROM dpmovimi 
           WHERE FECHA_ASI <= '".$datebalance."' AND ( ";

           foreach($pasivo as $key=>$value){
              $sql .= " CODMOV LIKE '".$value."%' OR";
            }
            $sql =substr($sql,0,-2);
           $sql .= " ) AND ID_EMPRESA = ".$empresa." GROUP BY CODMOV) AS pasivos ON pasivos.CODMOV = c.CODIGO
            LEFT JOIN
            (SELECT CODMOV, ID_EMPRESA, SUM(IMPORTE) AS capital
            FROM dpmovimi 
            WHERE FECHA_ASI <= '".$datebalance."' AND ( ";
           // $sql .= "CODMOV LIKE '3%' ) ";
           foreach($capital as $key=>$value){
              $sql .= " CODMOV LIKE '".$value."%' OR";
            }
            $sql = substr($sql,0,-2);
           $sql .= " ) AND ID_EMPRESA = ".$empresa." GROUP BY CODMOV) AS capitales ON capitales.CODMOV = c.CODIGO
            WHERE (c.CTAINACTIVA IS NULL OR c.CTAINACTIVA = 0) AND ( ";
            foreach ($activo as $key => $value) {
              $sql .= " c.CODIGO LIKE '".$value."%' OR";
            }
            foreach ($pasivo as $key => $value) {
              $sql .= " c.CODIGO LIKE '".$value."%' OR";
            }
            foreach ($capital as $key => $value) {
              $sql .= " c.CODIGO LIKE '".$value."%' OR";
            }
        $sql = substr($sql,0,-2);
        $sql .= " ) ORDER BY c.CODIGO, activos.activo, capitales.capital;";
        $results = $GLOBALS['db']->auto_array($sql,array(),true); 
        if(!empty($results)){
          foreach ($results as $key => $value) {
            if(empty($value["activo"]) && empty($value["pasivo"]) && empty($value["capital"])
              && !in_array($value["CODIGO"],array_column($accdeudora, "CODIGO"))
              && !in_array($value["CODIGO"],array_column($accacreedora, "CODIGO"))){
              continue;
            }
            else{
              $codigoaux = $value["CODIGO"];
              $cod = substr($codigoaux,0,strrpos($codigoaux,".")); 
              $results[$key]["level"] = 3;
              //$contlevel = 0;
              while (!empty($cod)){                                    
                $keyparent = array_search($cod.".", array_column($results, 'CODIGO')); 
                $results[$keyparent]["level"] = 2;         
                $results[$keyparent]["activo"] = $results[$keyparent]["activo"] + $value["activo"];
                $results[$keyparent]["pasivo"] = $results[$keyparent]["pasivo"] + $value["pasivo"];
                $results[$keyparent]["capital"] = $results[$keyparent]["capital"] + $value["capital"];

                $cod = substr($cod,0,strrpos($cod,"."));            
                $results[$keyparent]["level"] = (empty($cod)) ? 1 : 2;
              }                    
            }
          }

          foreach($results as $key=>$value){
            if ($level == 1 && $value["level"] <> $level){
              unset($results[$key]);
            }
            elseif ($level == 2 && $value["level"] > $level){
              unset($results[$key]);
            }  
            if ((empty($value["activo"]) || $value['activo'] == 0)
              && (empty($value["pasivo"]) || $value['pasivo'] == 0)
              && (empty($value["capital"]) || $value['capital'] == 0) 
              && !in_array($value["CODIGO"],array_column($accdeudora, "CODIGO"))
              && !in_array($value["CODIGO"],array_column($accacreedora, "CODIGO"))){
              unset($results[$key]);
            }
          }

          $acumactivo = 0;
          $acumpasivo = 0;
          $acumcapital = 0;

          foreach ($results as $key => $value) {
            if ($value['level'] == 1){
              if($value["activo"] != 0){
                $acumactivo += $acumactivo + $value["activo"];
              }
              if($value["pasivo"] != 0){
                $acumpasivo += $acumpasivo + $value["pasivo"];
              }
              if($value["capital"] != 0){
                $acumcapital += $acumcapital + $value["capital"];
              }
            }
          }
          $total = ($acumactivo * -1) - ($acumpasivo);
          // set value to net income
          foreach ($results as $key => $value) {
            if($total > 0){
              foreach ($accdeudora as $deudora) {
                if($deudora["CODIGO"] == $value["CODIGO"]){
                  $results[$key]["capital"] = abs($total) + abs($acumcapital);
                }
              }
            }
            else{
              foreach ($accacreedora as $acreedora) {
                if($acreedora["CODIGO"] == $value["CODIGO"]){
                  $results[$key]["capital"] = abs($total) + abs($acumcapital);
                }
              }
            }

            foreach ($capital as $value) {
              if($value."." == $results[$key]["CODIGO"] && ($results[$key]["level"] == 2 || $results[$key]["level"] == 1)){
                $results[$key]["capital"] = $total;
              }
            }
          }

        }
        $totalresult = array();
        $labelThis = "TOTAL";
        foreach ($results as $key => $value) {
          if($value["level"] == 1 && ($value["pasivo"] != 0 || $value["capital"] != 0)){
            $labelThis .= $value["NOMBRE"]." + ";
            $valueThis +=  ($value["capital"] * -1) - ($value["pasivo"]); 
          }
        }
        $labelThis = substr($labelThis, 0, -2);
        $totalresult = array("labelthis"=>$labelThis, "valuethis"=>$valueThis);
        $arr["totalresult"] = $totalresult;

        $arr["nrorecords"] = count($results);

        if(!empty($limit)){
          $reindexarray = array_values($results);
          $auxarr = array();
          foreach ($reindexarray as $key => $remove) {
            if(($key) >= $start && ($key) < ($limit + $start)){
              array_push($auxarr, $reindexarray[$key]);
            }
          }
          $results = $auxarr;
        } 
        
        $arr["records"] = $results;
        
        return $arr;
  }

  public static function accountRevision($empresa,$datefrom,$dateto){
    $sql = "SELECT ASIENTO, CONCEPTO, TIPO_ASI, GROUP_CONCAT(TRIM(CODMOV)) as CODMOV, SUM(IMPORTE) AS IMPORTE, ID_EMPRESA FROM dpmovimi WHERE FECHA_ASI BETWEEN '".$datefrom."' AND '".$dateto."' AND ID_EMPRESA = ".$empresa." GROUP BY TIPO_ASI, ASIENTO;";
    $results = $GLOBALS['db']->auto_array($sql,array(),true);
    return $results; 
  }

  public static function allYearMovimi($empresa,$dateto,$accingresos,$accegresos){
    if (empty($empresa) || empty($dateto) || empty($accingresos) || 
      empty($accegresos)){ return false; }
      $sql = "SELECT c.CODIGO, c.NOMBRE, ingresos.ingreso, egresos.egreso, c.PLANMARCA
        FROM dp01a110 c 
        LEFT JOIN 
          (SELECT CODMOV, ID_EMPRESA, SUM(IMPORTE) AS ingreso
           FROM dpmovimi 
           WHERE FECHA_ASI <= '".$dateto."' AND (";
      foreach($accingresos as $key=>$value){       
        $sql .= " CODMOV LIKE '".$value."%' OR";
      }
      $sql = substr($sql,0,-2);
      $sql .= ") AND ID_EMPRESA = ".$empresa." GROUP BY CODMOV) AS ingresos ON ingresos.CODMOV = c.CODIGO
          LEFT JOIN
            (SELECT CODMOV, ID_EMPRESA, SUM(IMPORTE) AS egreso
             FROM dpmovimi 
             WHERE FECHA_ASI <= '".$dateto."' AND (";
        foreach($accegresos as $key=>$value){
          $sql .= " CODMOV LIKE '".$value."%' OR";
        }
        $sql = substr($sql,0,-2);
      $sql .= ") AND ID_EMPRESA = ".$empresa." GROUP BY CODMOV) AS egresos ON egresos.CODMOV = c.CODIGO
          WHERE (c.CTAINACTIVA IS NULL OR c.CTAINACTIVA = 0) AND (";
        foreach($accingresos as $key=>$value){       
        $sql .= " c.CODIGO LIKE '".$value."%' OR";
      } 
      foreach($accegresos as $key=>$value){      
        $sql .= " c.CODIGO LIKE '".$value."%' OR";
      }
      $sql = substr($sql,0,-2);
      $sql .= ") AND c.PLANMARCA = 1 ORDER BY c.CODIGO, ingresos.ingreso, egresos.egreso";
      $results = $GLOBALS['db']->auto_array($sql,array(),true); 

      foreach ($results as $key => $value) {
        if ((empty($value["ingreso"]) || $value["ingreso"] == 0) && (empty($value["egreso"]) || $value["egreso"] == 0)){
          unset($results[$key]);
        }
      }

      foreach ($results as $key => $value) {
        echo "<br>";
        print_r($value);
      }

      return $results;
  }
}  
?>