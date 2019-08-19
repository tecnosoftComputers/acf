<?php
if (isset($_REQUEST['factura'])) {
	$thefact = $_REQUEST['factura'];
	require('../fpdf17/fpdf.php');

    include ("../../../../datos/db/admysql.php");

    $query = mysqli_query($con,"select * from c_empresa e 
                                            left join c_venta v on v.id_empresa = e.id_empresa
                                            left join c_orden_trabajo o on o.ntrabajo = v.norden
                                            left join c_clientes as c on v.cliente = c.cedula
                                            left join c_facturero f on f.id_facturero = v.nfacturero
                                                where v.id_empresa = 1 and v.nventa= '$thefact'");
            $invoice = mysqli_fetch_array($query);

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Arial','',12);
$pdf->Cell(189  ,10,'',0,1);//end of line
$pdf->Cell(110	,5,'CABRERA MORAN PASTOR HUMBERTO',0,0);$pdf->Image('../../../../inicializador/img/logo.PNG', 139,15,35,14,'PNG');
$pdf->Cell(189  ,10,'',0,1);//end of line
$pdf->SetFont('Arial','B',18); 
$pdf->Cell(130	,5,'TECNICENTRO SAN GABRIEL',0,0);
$pdf->Cell(39	,8,'FACTURA',0,1);//end of line
$pdf->SetFont('Arial','',6);
$pdf->Cell(110	,5,'MANTENIMIENTO Y REPARACION DE VEHICULOS AUTOMOTORES, REPARACION MECANICA',0,0);
$pdf->Cell(59	,3,'',0,1);//end of line
$pdf->Cell(134	,5,'SISTEMAS DE INYECCION Y ELECTRICO, SERVICIOS DE LAVADO, ENGRASADO, PULVERIZADO,',0,0);
$pdf->SetFont('Arial','',16);
$pdf->Cell(110,0,$invoice['nventa'],0,0);
$pdf->SetFont('Arial','',6);
$pdf->Cell(59	,3,'',0,1);//end of line
$pdf->Cell(110	,5,'ENCERADO, CAMBIOS DE ACEITE, ETC. VENTA AL POR MENOR DE PRODUCTOS DE LIMPIEZA',0,0);
$pdf->Cell(59	,3,'',0,1);//end of line
$pdf->Cell(110	,5,'LUBRICANTES Y REFIGERANTES PARA VEHICULOS AUTOMOTORES',0,0);

$pdf->Cell(59	,5,'',0,1);//end of line
$pdf->SetFont('Arial','',12);
$pdf->Cell(100	,5,'R.U.C. '.$invoice['ruc_empresa'],0,0, 'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(59	,5,'',0,1);//end of line
$pdf->Cell(100	,5,$invoice['direcc_empresa'],0,1);//end of line
$pdf->Cell(110	,5,'E-mail: '.$invoice['mail_empresa'],0,0);
$pdf->Cell(59	,5,'',0,1);//end of line
$pdf->Cell(30	,5,'Cel: '.$invoice['telf_empresa'],0,0);$pdf->Cell(70	,5,'* Ecuador - Guayaquil',0,0);
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->Cell(19	,7,'Sr.(es): _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _',0,0);$pdf->Cell(189	,7,$invoice['nombres'],0,0);

$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->Cell(23	,5,'R.U.C / C.I.: _ _ _ _ _ _ _ _ _ _ _',0,0);$pdf->Cell(43	,5,$invoice['cedula'],0,0);$pdf->Cell(30	,5,'Guia de Remision: _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _',0,0);$pdf->Cell(123	,5,$invoice['remision'],0,0);

$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->Cell(19	,5,'Direccion: _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _',0,0);$pdf->Cell(125	,5,$invoice['direccion_cliente'],0,0); 

$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->Cell(19	,5,'Placa:  _ _ _ _ _ _ _ _ _',0,0);$pdf->Cell(25	,5,$invoice['placa_venta'],0,0);$pdf->Cell(19	,5,'Telefono:  _ _ _ _ _ _ _ _ _',0,0);$pdf->Cell(85	,5,$invoice['telefono'],0,0); $pdf->Cell(16	,5,'Celular: _ _ _ _ _ _ _ _ _ _',0,0); $pdf->Cell(10	,5,$invoice['celular'],0,0);

$pdf->Cell(189	,10,'',0,1);//end of line


$pdf->SetFont('Arial','B',9);
$pdf->Cell(25	,5,'CANTIDAD',1,0,'C');
$pdf->Cell(100	,5,'DESCRIPCION',1,0,'C');
$pdf->Cell(32	,5,'PRECIO UNITARIO',1,0,'C');
$pdf->Cell(32	,5,'TOTAL',1,1,'C');//end of line

$pdf->SetFont('Arial','',11);


$query = mysqli_query($con,
	"select
        distinct v.idventa, v.nventa, 
        vd.cantidad,vd.cantidad_litros,vd.codigo,vd.precio,vd.importe as imp_vd,vd.precio_cero,vd.importe_cero lacero,
        v.efectivo,v.cambio,v.descuento,v.total,v.iva,v.forma_pago,v.meses,v.diferido,v.importe,v.importe_cero,v.iva_dolares,v.son,v.sin_iva,v.observacion,
        m.codproducto,m.nombreproducto  
        from c_venta as v 
            INNER JOIN c_venta_detalle AS vd ON vd.nventa = v.nventa
            LEFT JOIN c_mercaderia m ON m.codproducto = vd.codigo 
            WHERE v.nventa = '$thefact'");
    


while($item = mysqli_fetch_array($query)){
    $nn = $item['cantidad'];
    if ($item['precio'] == 0 ) {
        $n_p = $item['precio_cero'];
        $n_imp = $item['lacero'];
    }else if ($item['cantidad_litros'] == 0) {
        $n_p = $item['precio'];
        $n_imp = $item['imp_vd'];
    }
    
    if ($item['nombreproducto'] == "") {
        $nombrepro = $item['codigo'];
    }else{ 
        $nombrepro = $item['nombreproducto'];
    }
    
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(25	,5,$nn,1,0,'C');
    $pdf->Cell(100	,5,$nombrepro,1,0,'C');
	$pdf->Cell(32	,5,bcdiv($n_p,'1',2),1,0,'C');
    $pdf->Cell(32	,5,bcdiv($n_imp,'1',2),1,0,'C');
    

    // El importe total
    $el_importe = 0;
    //$el_importe = ()
	$efecti = number_format($item['efectivo'],2,'.','');
	$cambio = number_format($item['cambio'],2,'.','');
    $import = number_format($item['importe'],2,'.','');
    $imp_cero = bcdiv($item['importe_cero'],'1',2);
    $dd = bcdiv($item['descuento'],'1',2);
    $siva = bcdiv($item['sin_iva'],'1',2);
    


    $total = number_format($item['total'],2,'.','');

    $pdf->Cell(189	,5,'',0,1);//end of line
    
    $iva = number_format($item['iva'],2,'.','');
    $total = number_format($item['total'],2,'.','');
    
    $mes = $item['meses'];
    $dif = $item['diferido'];
    $formp = $item['forma_pago'];
    $ivad = $item['iva_dolares'];
    // Valor del iva
    
    $sum = 0;
    
    $sum = ($import - $dd);
    $newval = $sum * $iva / 100;
    
    $obse = $item['observacion'];
}

$pdf->Cell(189	,5,'',0,1);//end of line
$pdf->Cell(189	,5,'',0,1);//end of line
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55	,5,'FORMA DE PAGO',1,1,'C');                  $pdf->Cell(315	,0,'SUB-TOTAL',0,1,'C');$pdf->Cell(355	,0,$import,0,1,'C');
$pdf->SetFont('Arial','',7);
$pdf->Cell(35	,5,'EFECTIVO',1,0);                           
$pdf->Cell(20	,5,'',1,1,'C');                               $pdf->Cell(315	,0,'I.V.A. 0%',0,1,'C');$pdf->Cell(355	,0,$siva,0,1,'C');
$pdf->Cell(35	,5,'DINERO ELECTRONICO',1,0);             
$pdf->Cell(20	,5,'',1,1,'C');                               $pdf->Cell(315	,0,'I.V.A. 12%',0,1,'C');$pdf->Cell(355	,0,$ivad,0,1,'C');
$pdf->Cell(35	,5,'CUENTA CREDITODEBITO',1,0);
$pdf->Cell(20	,5,'',1,1,'C');                               $pdf->Cell(315	,0,'DESC',0,1,'C');$pdf->Cell(355	,0,$dd,0,1,'C');
$pdf->Cell(35	,5,'OTROS',1,0);
$pdf->Cell(20	,5,'',1,1,'C');                               $pdf->Cell(315	,0,'TOTAL $',0,1,'C');$pdf->Cell(355	,0,$total,0,1,'C');
$pdf->Cell(130	,5,'',0,0);

$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->Cell(8	,5,'SON: __________________________________________________________________________________________________________________________________',0,0);$pdf->Cell(125	,5,strtoupper($invoice['son']),0,0); 

$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->Cell(21	,5,'OBSERVACION: _________________________________________________________________________________________________________________________',0,0);$pdf->Cell(125	,5,strtoupper($obse),0,0);
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->Cell(189	,10,'',0,1);//end of line

$pdf->Cell(20	,5,'',0,0);$pdf->Cell(90	,5,'_____________________________',0,0);$pdf->Cell(80	,5,'____________________________',0,0);
$pdf->Cell(199	,5,'',0,1);//end of line
$pdf->Cell(30	,5,'',0,0);$pdf->Cell(90	,5,'Firma Autorizada',0,0);$pdf->Cell(90	,5,'Recibi Conforme',0,0);
$pdf->Cell(189	,10,'',0,1);//end of line

$pdf->Cell(10	,5,'',0,0);$pdf->Cell(90	,5,'______________________________________________________________________________________________________________________',0,0);
$pdf->Cell(189	,10,'',0,1);//end of line

$pdf->SetFont('Arial','',8);
$pdf->Cell(40	,5,''.'',0,0);
    $pdf->Cell(12	,5,'Del: '.$invoice['numero_desde'],0,0);
    $pdf->Cell(10	,5,'Al: '.$invoice['numero_hasta'],0,0);
    $pdf->Cell(50	,5,'FECHA AUTORIZACION: '.$invoice['fecha_desde'],0,0);
    $pdf->Cell(12	,5,'CADUCIDAD: '.$invoice['fecha_hasta'],0,0);
    $pdf->Cell(59	,3,'',0,1);//end of line
$pdf->Cell(60	,5,''.'',0,0);
    $pdf->Cell(12	,5,'ORIGINAL ADQUIRIENTE * COPIA EMISOR'.'',0,0);

$pdf->Output();

}
?>