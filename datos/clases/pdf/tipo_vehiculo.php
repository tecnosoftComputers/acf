<?php

	require('fpdf17/fpdf.php');

include ("../../../datos/db/admysql.php");


$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
//$pdf->Image('logo.png', 29,2,25,18,'PNG');
$pdf->Cell(189  ,10,'',0,1);//end of line

$pdf->Image('../../../inicializador/img/logo.PNG', 139,15,35,14,'PNG');
$pdf->Cell(59	,5,'LISTADO DE TIPOS DE VEHICULO',0,1);//end of line

$pdf->SetFont('Arial','',12);

$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','B',11);
$pdf->Cell(15	,5,'#',1,0);
$pdf->Cell(60	,5,'NOMBRE',1,0);
$pdf->Cell(60	,5,'OBSERVACION',1,0);
$pdf->Cell(45	,5,'FECHA INGRESO',1,0);
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','',14);

$query = mysqli_query($con,"SELECT p.id_tipo_vehiculo, p.nombrevehiculo, p.observacion, p.fecha_registro 
    FROM c_tipo_vehiculo p where estado='A' ");

while($item = mysqli_fetch_array($query)){
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(15	,5,$item['id_tipo_vehiculo'],0,0);
	$pdf->Cell(60	,5,$item['nombrevehiculo'],0,0);
	$pdf->Cell(60	,5,$item['observacion'],0,0);
	$pdf->Cell(45	,5,$item['fecha_registro'],0,0);

	
	$pdf->Cell(189	,0,'',0,1);//end of line
	$pdf->Cell(100	,8,' __________________________________________________________________________________',0,1);//end of line
}
$pdf->Output();

?>