<?php

	require('fpdf17/fpdf.php');

include ("../../../datos/db/admysql.php");


$pdf = new FPDF('P','mm','A3');

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
//$pdf->Image('logo.png', 29,2,25,18,'PNG');
$pdf->Cell(189  ,10,'',0,1);//end of line

$pdf->Image('../../../inicializador/img/logo.PNG', 229,15,35,14,'PNG');
$pdf->Cell(59	,5,'LSITADO DE EMPRESAS',0,1);//end of line

$pdf->SetFont('Arial','',8);

$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','B',11);
$pdf->Cell(25	,5,'RUC',1,0);
$pdf->Cell(90	,5,'NOMBRE',1,0);
$pdf->Cell(90	,5,'DIRECCION',1,0);
$pdf->Cell(25	,5,'TELEFONO',1,0);
$pdf->Cell(50	,5,'CORREO ELECTRONICO',1,0);
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','',14);

$query = mysqli_query($con,"SELECT p.id_empresa, p.ruc_empresa, p.nom_empresa, p.direcc_empresa, p.telf_empresa, p.mail_empresa
								 FROM c_empresa p");

while($item = mysqli_fetch_array($query)){
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(25	,5,$item['ruc_empresa'],0,0);
	$pdf->Cell(90	,5,$item['nom_empresa'],0,0);
	$pdf->Cell(90	,5,$item['direcc_empresa'],0,0);
	$pdf->Cell(25	,5,$item['telf_empresa'],0,0);
	$pdf->Cell(50	,5,$item['mail_empresa'],0,0);
	
	$pdf->Cell(189	,0,'',0,1);//end of line
	$pdf->Cell(100	,8,' ________________________________________________________________________________________________________________________________________________________________________________',0,1);//end of line
}
$pdf->Output();

?>