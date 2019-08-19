<?php

if (isset($_POST['register'])){
    $desde = $_POST['fdesde'];
    $hasta = $_POST['fhasta'];
    
    $adesde = $_POST['adesde'];
    $ahasta = $_POST['ahasta'];
    
    $ndesde = $_POST['ndesde'];
    $nhasta = $_POST['nhasta'];
    
    $ninicio = str_pad($ndesde,8, "0", STR_PAD_LEFT);
    $nfin = str_pad($nhasta,8, "0", STR_PAD_LEFT);
    
require('fpdf17/fpdf.php');
include ("../../../datos/db/admysql.php");

$pdf = new FPDF('P','mm','A3');
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(189  ,10,'',0,1);//end of line

$pdf->Image('../../../inicializador/img/logoinicial.jpg', 239,10,50,26,'JPG');
$pdf->Cell(59	,5,'JOURNAL ENTRIES',0,1);//end of line
$pdf->Cell(189	,10,'',0,1); //end of line
$pdf->SetFont('Arial','',12);
$pdf->Cell(13	,5,'Since:',0,0);$pdf->Cell(28	,5,$desde,0,0);$pdf->Cell(12	,5,'Until:',0,0);$pdf->Cell(158	,5,$hasta,0,0);
$pdf->Cell(22	,5,'Date:',0,0);$pdf->Cell(58	,5,date('y-m-d'),0,0);
$pdf->SetFont('Arial','',10);

$pdf->Cell(189	,10,'',0,1); //end of line
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60	,5,'ACCOUNT',1,0);
$pdf->Cell(80	,5,'NAME ACCOUNT',1,0);
$pdf->Cell(80	,5,'BENEFICIARY',1,0);
$pdf->Cell(30	,5,'DEBIT',1,0);
$pdf->Cell(30	,5,'CREDIT',1,0);
$pdf->Cell(189	,10,'',0,1); //end of line
$pdf->SetFont('Arial','',28);

$querys = mysqli_query($con,"SELECT SUM(DEBITOS) AS sumd, SUM(CREDITOS) AS sumc FROM dpcabtra 
                                WHERE FECHA_ASI BETWEEN '$desde' AND '$hasta' AND TIPO_ASI = '$adesde' AND ASIENTO >= '$ninicio' AND ASIENTO <= '$nfin'");
while($items = mysqli_fetch_array($querys)){
    $suma_d = $items['sumd'];
    $suma_c = $items['sumc'];
}

$query = mysqli_query($con,"SELECT account_aux,account_n_aux, BENEFICIAR, DEBITOS, CREDITOS FROM dpcabtra 
                                WHERE FECHA_ASI BETWEEN '$desde' AND '$hasta' AND TIPO_ASI = '$adesde' AND ASIENTO >= '$ninicio' AND ASIENTO <= '$nfin'");
while($item = mysqli_fetch_array($query)){
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(60	,5,$item['account_aux'],0,0);
	    $pdf->Cell(80	,5,$item['account_n_aux'],0,0);
        $pdf->Cell(80	,5,$item['BENEFICIAR'],0,0);
        $pdf->Cell(30	,5,$item['DEBITOS'],0,0);
        $pdf->Cell(30	,5,$item['CREDITOS'],0,0);    

        $pdf->Cell(189	,5,'',0,1);//end of line
}
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->Cell(208	,5,'',0,0);$pdf->Cell(38	,5,'_____________',0,0);$pdf->Cell(108	,5,'_____________',0,0);

$pdf->Cell(189	,5,'',0,1);//end of line
$pdf->Cell(220	,5,'',0,0);$pdf->Cell(30	,5,$suma_d,0,0); $pdf->Cell(125	,5,$suma_c,0,0);


$pdf->Output();
}
?>