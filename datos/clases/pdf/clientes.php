<?php

	require('fpdf17/fpdf.php');

include ("../../../datos/db/admysql.php");


$pdf = new FPDF('P','mm','A3');

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
//$pdf->Image('logo.png', 29,2,25,18,'PNG');
$pdf->Cell(189  ,10,'',0,1);//end of line

$pdf->Image('../../../inicializador/img/logo.PNG', 220,15,35,14,'PNG');
$pdf->Cell(59	,5,'LSITADO DE CLIENTES',0,1);//end of line

$pdf->SetFont('Arial','',10);

$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','B',11);
$pdf->Cell(25	,5,'CEDULA',1,0);
$pdf->Cell(60	,5,'NOMBRES',1,0);
$pdf->Cell(40	,5,'CORREO',1,0);
$pdf->Cell(25	,5,'CELULAR',1,0);
$pdf->Cell(95	,5,'DIRECCION',1,0);
$pdf->Cell(25	,5,'PLACA',1,0);
$pdf->Cell(10	,5,'N',1,0);
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','',14);

$query = mysqli_query($con,"SELECT * FROM c_clientes WHERE estado = 'A' ");

while($item = mysqli_fetch_array($query)){
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(25	,5,$item['cedula'],0,0);
	$pdf->Cell(60	,5,$item['nombres'],0,0);
	$pdf->Cell(40	,5,$item['correo'],0,0);
    $pdf->Cell(25	,5,$item['celular'],0,0);
    $pdf->Cell(95	,5,$item['direccion'],0,0);
    $pdf->Cell(25	,5,strtoupper($item['placa']),0,0);
    $pdf->Cell(10	,5,$item['nveces'],0,0);
    
	
	$pdf->Cell(189	,0,'',0,1);//end of line
	$pdf->Cell(100	,8,' _________________________________________________________________________________________________________________________________________________________________________________',0,1);//end of line
}
$pdf->Output();

?>