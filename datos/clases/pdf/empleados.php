<?php

	require('fpdf17/fpdf.php');

include ("../../../datos/db/admysql.php");


$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
//$pdf->Image('logo.png', 29,2,25,18,'PNG');
$pdf->Cell(189  ,10,'',0,1);//end of line

$pdf->Image('../../../inicializador/img/logo.PNG', 139,15,35,14,'PNG');
$pdf->Cell(59	,5,'LSITADO DE EMPLEADOS',0,1);//end of line

$pdf->SetFont('Arial','',12);

$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','B',11);
$pdf->Cell(20	,5,'Cedula',1,0);
$pdf->Cell(40	,5,'Nombres',1,0);
$pdf->Cell(40	,5,'Apellido',1,0);
$pdf->Cell(12	,5,'Edad',1,0);
$pdf->Cell(40	,5,'Correo',1,0);
$pdf->Cell(20	,5,'Fono',1,0);
$pdf->Cell(20	,5,'Celular',1,0);
$pdf->Cell(189	,10,'',0,1);//end of line
$pdf->SetFont('Arial','',14);

$query = mysqli_query($con,"SELECT p.id_empleado, p.cedula, p.nombres, p.apellidos, p.edad, p.correo, p.telefono, p.celular
								 FROM c_empleados p");

while($item = mysqli_fetch_array($query)){
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(20	,5,$item['cedula'],0,0);
	$pdf->Cell(40	,5,$item['nombres'],0,0);
	$pdf->Cell(40	,5,$item['apellidos'],0,0);
	$pdf->Cell(12	,5,$item['edad'],0,0);
	$pdf->Cell(40	,5,$item['correo'],0,0);
    $pdf->Cell(20	,5,$item['telefono'],0,0);
    $pdf->Cell(20	,5,$item['celular'],0,0);
	
	$pdf->Cell(189	,0,'',0,1);//end of line
	$pdf->Cell(100	,8,' ________________________________________________________________________________________________________________________',0,1);//end of line
}
$pdf->Output();

?>