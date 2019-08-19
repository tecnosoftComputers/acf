<?php

	require('fpdf17/fpdf.php');

include ("../../../datos/db/admysql.php");


$pdf = new FPDF('P','mm','A3');

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
//$pdf->Image('logo.png', 29,2,25,18,'PNG');
$pdf->Cell(189  ,10,'',0,1);//end of line
$pdf->Image('../../../inicializador/img/logo.PNG', 229,15,35,14,'PNG');
$pdf->Cell(59	,5,'LISTADO DE PROVEEDORES',0,1);//end of line

$pdf->SetFont('Arial','',12);

$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','B',11);
$pdf->Cell(25	,5,'RUC',1,0);
$pdf->Cell(65	,5,'NOMBRE',1,0);
$pdf->Cell(105	,5,'DIRECCION',1,0);
$pdf->Cell(25	,5,'FONO',1,0);
$pdf->Cell(60	,5,'CORREO',1,0);
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','',12);

$query = mysqli_query($con,"SELECT p.id_proveedor, p.ruc, p.nombreproveedor, p.direccion, p.telefono, p.correo
								 FROM c_proveedor p");

while($item = mysqli_fetch_array($query)){
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(25	,5,$item['ruc'],0,0);
	$pdf->Cell(65	,5,$item['nombreproveedor'],0,0);
	$pdf->Cell(105	,5,$item['direccion'],0,0);
	$pdf->Cell(25	,5,$item['telefono'],0,0);
	$pdf->Cell(60	,5,$item['correo'],0,0);
	
	$pdf->Cell(189	,0,'',0,1);//end of line
	$pdf->Cell(100	,8,' ________________________________________________________________________________________________________________________________________________________________________________',0,1);//end of line
}
$pdf->Output();

?>