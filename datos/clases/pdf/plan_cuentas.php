<?php

require('fpdf17/fpdf.php');
include ("../../../datos/db/admysql.php");

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(189  ,10,'',0,1);//end of line

$pdf->Image('../../../inicializador/img/logoinicial.jpg', 139,10,50,26,'JPG');
$pdf->Cell(59	,5,'CHART ACCOUNTS',0,1);//end of line
$pdf->Cell(189	,10,'',0,1); //end of line
$pdf->SetFont('Arial','',12);
$pdf->Cell(12	,5,'Date:',0,0);$pdf->Cell(18	,5,date('y-m-d'),0,0);
$pdf->SetFont('Arial','',10);

$pdf->Cell(189	,10,'',0,1); //end of line
$pdf->SetFont('Arial','B',11);
$pdf->Cell(60	,5,'ACCOUNT',1,0);
$pdf->Cell(100	,5,'NAME ACCOUNT',1,0);
$pdf->Cell(189	,10,'',0,1); //end of line
$pdf->SetFont('Arial','',28);

$query = mysqli_query($con,"SELECT * FROM dp01a110 ");
while($item = mysqli_fetch_array($query)){
    $var = substr($item['CODIGO'], -1);
    if ($var == '.') {
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(60	,5,$item['CODIGO'],0,0);
	    $pdf->Cell(50	,5,$item['NOMBRE'],0,0);    
    }else{
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(60	,5,$item['CODIGO'],0,0);
	    $pdf->Cell(10	,5,' ',0,0); $pdf->Cell(50	,5,$item['NOMBRE'],0,0);
    }
	$pdf->Cell(189	,0,'',0,1);//end of line
    $pdf->Cell(100	,8,'',0,1);//end of line
}
$pdf->Output();
?>