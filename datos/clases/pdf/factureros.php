<?php

require('fpdf17/fpdf.php');
include ("../../../datos/db/admysql.php");

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
//$pdf->Image('logo.png', 29,2,25,18,'PNG');
$pdf->Cell(189  ,10,'',0,1);//end of line

$pdf->Image('../../../inicializador/img/logo.PNG', 139,15,35,14,'PNG');
$pdf->Cell(59	,5,'LISTADO DE FACTUREROS',0,1);//end of line

$pdf->SetFont('Arial','',8);

$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','B',11);
$pdf->Cell(25	,5,'CANT',1,0);
$pdf->Cell(25	,5,'NUM DESDE',1,0);
$pdf->Cell(25	,5,'NUM HASTA',1,0);
$pdf->Cell(40	,5,'FECHA DESDE',1,0);
$pdf->Cell(40	,5,'FECHA HASTA',1,0);
$pdf->Cell(40	,5,'FECHA REGISTRO',1,0);
$pdf->Cell(189	,10,'',0,1);//end of line 
$pdf->SetFont('Arial','',8);

$query = mysqli_query($con,"SELECT p.numero_facturas, p.numero_desde, p.numero_hasta, p.fecha_desde, p.fecha_hasta, p.fecha_registro
								 FROM c_facturero p");

while($item = mysqli_fetch_array($query)){
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(25	,5,$item['numero_facturas'],0,0);
	$pdf->Cell(25	,5,$item['numero_desde'],0,0);
	$pdf->Cell(25	,5,$item['numero_hasta'],0,0);
	$pdf->Cell(40	,5,$item['fecha_desde'],0,0);
	$pdf->Cell(40	,5,$item['fecha_hasta'],0,0);
	$pdf->Cell(40	,5,$item['fecha_registro'],0,0);
	
	$pdf->Cell(189	,0,'',0,1);//end of line
	$pdf->Cell(100	,8,' _________________________________________________________________________________________________________________________',0,1);//end of line
}
$pdf->Output();

?>