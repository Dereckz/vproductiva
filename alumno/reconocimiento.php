<?php
require('../fpdf/fpdf.php');
include "../panel/func/profile.php";
include "..\dev\conectar.php";

if (!isset($_SESSION)) {
    session_start();
}

$resultado = mysqli_query($conn, "SELECT * FROM usuarios WHERE iIdUsuario=" . $_SESSION["id"]);
$consulta = mysqli_fetch_array($resultado);

$pdf = new FPDF('L','mm','Letter');
$pdf->AddPage();
$pdf->SetFont('Arial','B',70);
$pdf->Image('1.png',0,0,299,213,'PNG');
$pdf->Image('2.png',190,20,85,28,'PNG');
$pdf->Image('3.png',200,160,20,15,'PNG');
$pdf->Image('4.png',60,55,170,15,'PNG');

//$pdf->SetY(50);
//$pdf->SetX(60);
//$pdf->Cell(40,35,utf8_decode('CERTIFICADO'),1);

$pdf->SetFont('Arial','B',16);
$pdf->SetY(80);
$pdf->SetX(98);
$pdf->Cell(50,15,utf8_decode('D E   P A R T I C I P A C I Ó N   P A R A :'),1);

$pdf->SetFont('Arial','B',16);
$pdf->SetY(105);
$pdf->SetX(75);
$pdf->Cell(50,15,utf8_decode( $consulta['cNombre'].' '.$consulta['cApellidoP'].' '.$consulta['cApellidoM']),1);

$pdf->SetFont('Arial','B',16);
$pdf->SetY(130);
$pdf->SetX(50);
$pdf->Cell(50,15,utf8_decode('POR HABER CONCLUIDO EXITOSAMENTE EL CURSO DE'),1);

$pdf->SetFont('Arial','B',16);
$pdf->SetY(150);
$pdf->SetX(75);
$pdf->Cell(50,15,utf8_decode('_________________________________________________'),1);

$pdf->SetFont('Arial','B',10);
$pdf->SetY(170);
$pdf->SetX(75);
$pdf->Cell(50,15,utf8_decode('FECHA'),1);

$pdf->SetFont('Arial','B',10);
$pdf->SetY(170);
$pdf->SetX(190);
$pdf->Cell(50,15,utf8_decode('FIRMA'),1);


$pdf->Output();
?>